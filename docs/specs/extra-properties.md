# Spec : propriétés custom sur les composants étendus

## Problème

Quand une application étend un composant du package pour ajouter une **propriété custom** (ex : `itemsInArchives` sur `btn-archives`), elle doit **redéclarer l'intégralité du constructeur** (22+ paramètres) juste pour ajouter un seul paramètre promu.

C'est verbeux, fragile (si le parent ajoute un paramètre, les extensions cassent), et décourage l'extension.

### Exemple concret (Savane)

```php
class Archives extends Base
{
    public function __construct(
        public ?int $itemsInArchives = null, // ← seul ajout
        ?string $url = null,                 // ← 22 paramètres recopiés
        ?string $text = null,
        bool $hideText = false,
        // ... tout le reste identique au parent
    ) {
        parent::__construct(/* ... tout re-passé */);
    }
}
```

### Contrainte technique

Blade résout les props par **reflection sur les paramètres nommés du constructeur** (`ComponentTagCompiler::partitionDataAndAttributes()`). Un attribut dont le nom ne correspond pas à un paramètre du constructeur tombe dans `$attributes` (ComponentAttributeBag), pas comme propriété typée.

## Piste 1 : hydratation automatique via `withAttributes()`

### Principe

Le flow Blade compilé est :

1. `new Component(...$constructorParams)` → appelle `onConstructing()` puis `initAttributes()`
2. `$component->withAttributes([...])` → injecte les attributs **après** la construction

On exploite l'étape 2 : override de `withAttributes()` dans `BladeComponent` pour détecter les propriétés publiques déclarées hors constructeur, les hydrater depuis l'AttributeBag avec coercion de type, appeler un hook `onAttributesSet()`, puis rafraîchir les données du composant dans le view factory.

### Problème de timing du lifecycle Blade

Le template compilé par Blade appelle `data()` **avant** `withAttributes()` :

```php
$__env->startComponent($component->resolveView(), $component->data());  // snapshot des propriétés
$component->withAttributes([...]);  // hydratation APRÈS le snapshot
```

`data()` retourne un tableau (copie par valeur). Les modifications faites dans `onAttributesSet()` (ex : modifier `endContent`) seraient invisibles par la vue.

**Solution** : après hydratation et appel du hook, `refreshComponentData()` met à jour le snapshot stocké dans le view factory via reflection sur `ManagesComponents::$componentData`. Cela permet à `renderComponent()` de lire les données fraîches.

### Implémentation dans `BladeComponent`

L'implémentation finale comprend cinq méthodes ajoutées à `BladeComponent`, un cache statique, et un override de `flushCache()`. Voir `src/Components/BladeComponent.php` pour le code complet.

**Résumé de l'architecture :**

```php
// Override de withAttributes() — point d'entrée
public function withAttributes(array $attributes)
{
    parent::withAttributes($attributes);

    if ($this->resolveExtraProperties() === []) {
        return $this;  // Aucun overhead pour les composants sans extra properties
    }

    $this->hydrateExtraProperties();  // Hydratation + coercion de type
    $this->onAttributesSet();         // Hook pour la logique métier
    $this->refreshComponentData();    // Fix du timing Blade (voir ci-dessus)

    return $this;
}

// Hook pour les classes enfants
protected function onAttributesSet(): void {}

// Hydratation : extrait les attributs correspondant aux extra properties,
// applique la coercion de type, et retire les clés du bag
private function hydrateExtraProperties(): void { /* ... */ }

// Cache de reflection : résout et cache la liste des propriétés publiques
// hors constructeur et hors namespace du package
private function resolveExtraProperties(): array { /* ... */ }

// Fix Blade : met à jour le snapshot stale dans ManagesComponents::$componentData
// via reflection (avec catch silencieux si les internals changent)
private function refreshComponentData(): void { /* ... */ }

// Nettoyage du cache de reflection
public static function flushCache(): void
{
    parent::flushCache();
    self::$extraPropertiesCache = [];
}
```

**Filtrage des propriétés :** seules les propriétés publiques non-statiques, hors constructeur, déclarées en dehors du namespace `BladeUIKitBootstrap\` et de `Illuminate\View\Component` sont hydratées.

### Usage côté application

```php
class Archives extends Base
{
    public ?int $itemsInArchives = null;

    protected function onAttributesSet(): void
    {
        if ($this->itemsInArchives !== null) {
            $badge = '<span class="badge text-bg-light">'.$this->itemsInArchives.'</span>';
            $this->endContent = $this->endContent !== null
                ? $this->endContent.' '.$badge
                : $badge;
        }
    }
}
```

Template Blade :

```blade
<x-btn-archives :url="route('archives')" :items-in-archives="$count" />
```

### Avantages

- Zéro constructeur redéclaré
- Coercion de type automatique (`int`, `float`, `bool`, `string`)
- Conversion kebab-case → camelCase transparente (comme Blade le fait pour les props constructeur)
- Rétrocompatible : les composants existants n'ont pas de propriétés extra, `hydrateExtraProperties()` ne fait rien
- Hook `onAttributesSet()` opt-in pour la logique métier post-hydratation
- Les propriétés extra sont accessibles dans la vue (propriétés publiques)
- Les propriétés extra sont retirées de l'AttributeBag (pas de pollution du HTML rendu)

### Rétrocompatibilité

**Cette piste est 100 % rétrocompatible → release mineure (1.x).**

Des propriétés publiques hors constructeur existent déjà dans le package (ex : `$id`, `$value` sur les inputs, `$titleLabel` sur les modales, `$errorField`/`$hasErrors` sur `CanHaveErrors`). Elles ne posent pas de problème grâce au filtre sur le namespace : `hydrateExtraProperties()` **ignore toute propriété déclarée dans le namespace `BladeUIKitBootstrap`** et ne cible que celles ajoutées par l'application.

```php
$declaringClass = $property->getDeclaringClass()->getName();
if (str_starts_with($declaringClass, 'BladeUIKitBootstrap\\')) {
    continue;
}
```

Résultat :
- **Composants existants** : `hydrateExtraProperties()` ne fait rien (aucune propriété hors package)
- **`onAttributesSet()`** : body vide par défaut, opt-in
- **`withAttributes()`** : appelle `parent::withAttributes()` en premier, comportement Laravel préservé
- **Aucun changement de signature** publique ou protégée existante

### Points de vigilance

| Question | Réponse |
|----------|---------|
| Types nullable ? | Supportés : valeur `null` si attribut absent, la propriété garde sa valeur par défaut |
| Performance ? | ✅ Implémenté — cache de reflection via `resolveExtraProperties()` et `$extraPropertiesCache` ; early return si aucune extra property |
| Conflit de noms ? | Si une propriété extra a le même nom qu'un attribut HTML légitime, elle le « capture ». Documenté dans `docs/extra-properties.md` |
| Ordre des hooks ? | `onConstructing()` → `initAttributes()` → validation → `data()` (snapshot) → `withAttributes()` → `hydrateExtraProperties()` → `onAttributesSet()` → `refreshComponentData()` |
| Visibilité vue ? | ✅ Résolu — `refreshComponentData()` met à jour le snapshot stale via reflection sur `ManagesComponents::$componentData` |

## Piste 2 : constructeurs allégés + hydratation unifiée (breaking change → 2.0)

### Constat

La piste 1 résout le problème pour les **applications qui étendent**, mais le problème de fond reste : les constructeurs de `LinkButton` (22 params) et `FormButton` (26 params) sont massifs. Ce sont eux qui imposent la redéclaration complète.

Sans contrainte de rétrocompatibilité, on peut **sortir la majorité des paramètres du constructeur** et les déclarer comme propriétés de classe. Le mécanisme d'hydratation de la piste 1 (via `withAttributes()`) s'applique alors à **toutes** les propriétés, pas seulement aux extras applicatifs.

### Principe

Les constructeurs ne gardent que les paramètres **véritablement requis** (c'est-à-dire sans valeur par défaut sensée). Tout le reste devient une propriété publique de classe, hydratée automatiquement depuis l'AttributeBag.

**Point clé :** côté template Blade, rien ne change. `<x-btn-save variant="success" size="sm">` fonctionne toujours — Blade met `variant` et `size` dans `$attributes` au lieu d'en faire des params constructeur, puis `hydrateExtraProperties()` les assigne aux propriétés typées.

### Lifecycle simplifié

**Actuel (1.x) :**

```
Constructor(22+ params) → onConstructing() → initAttributes() → validation → withAttributes()
```

**Proposé (2.0) :**

```
Constructor(0-1 param) → withAttributes() → hydrateProperties() → onAttributesSet() → validation
```

Un seul hook d'extension (`onAttributesSet()`) remplace `onConstructing()` + `initAttributes()`.

### Exemple : `LinkButton` actuel vs proposé

**Actuel (22 paramètres constructeur) :**

```php
class LinkButton extends BladeComponent
{
    public function __construct(
        public ?string $url = null,
        public ?string $text = null,
        public bool $hideText = false,
        public bool $show = true,
        public bool $hide = false,
        public ?string $title = null,
        public ?string $variant = null,
        public bool $outline = false,
        public bool $noOutline = false,
        public ?string $size = null,
        public bool $lg = false,
        public bool $sm = false,
        public bool $disabled = false,
        public ?string $confirm = null,
        public ?string $confirmId = null,
        public ?string $confirmTitle = null,
        public ?string $confirmVariant = null,
        public ?string $startContent = null,
        public ?string $endContent = null,
        public ?string $icon = null,
        public ?string $startIcon = null,
        public ?string $endIcon = null,
    ) {
        $this->onConstructing();
        $this->initAttributes();
        // ... validation
    }
}
```

**Proposé (0 paramètre constructeur) :**

```php
class LinkButton extends BladeComponent
{
    use BtnIcons, BtnSize, BtnVariant;

    public ?string $url = null;
    public ?string $text = null;
    public bool $hideText = false;
    public bool $show = true;
    public bool $hide = false;
    public ?string $title = null;
    public ?string $variant = null;
    public bool $outline = false;
    public bool $noOutline = false;
    public ?string $size = null;
    public bool $lg = false;
    public bool $sm = false;
    public bool $disabled = false;
    public ?string $confirm = null;
    public ?string $confirmId = null;
    public ?string $confirmTitle = null;
    public ?string $confirmVariant = null;
    public ?string $startContent = null;
    public ?string $endContent = null;
    public ?string $icon = null;
    public ?string $startIcon = null;
    public ?string $endIcon = null;

    protected function onAttributesSet(): void
    {
        if (! $this->show || $this->hide) {
            return;
        }

        if ($this->confirm !== null) {
            $this->confirmId = 'link-button-'.($this->confirmId ?? Str::random(32));
        }

        $this->validBtnVariant();
        $this->validBtnSize();
        $this->validBtnStartIcon();
        $this->validBtnEndIcon();
    }
}
```

### Exemple : `FormButton` proposé

Seul `FormButton` garde un paramètre constructeur (`$url` requis) :

```php
class FormButton extends BladeComponent
{
    use BtnIcons, BtnSize, BtnType, BtnVariant, FormMethod;

    public ?string $text = null;
    public bool $hideText = false;
    // ... toutes les autres propriétés comme LinkButton ...
    public ?string $formId = null;
    public ?string $method = null;
    public ?string $type = 'submit';
    public bool $novalidate = true;

    public function __construct(
        public string $url,
    ) {}

    protected function onAttributesSet(): void
    {
        if (! $this->show || $this->hide) {
            return;
        }

        $this->formId ??= 'form-button-'.Str::random(32);

        if ($this->confirm !== null) {
            $this->confirmId ??= $this->formId;
        }

        $this->validFormMethod();
        $this->validBtnType(self::DEFAULT_FORM_BUTTON_TYPE);
        $this->validBtnVariant();
        $this->validBtnSize();
        $this->validBtnStartIcon();
        $this->validBtnEndIcon();
    }
}
```

### Exemple : boutons d'action

Les boutons d'action deviennent encore plus simples — `onAttributesSet()` remplace `initAttributes()` :

```php
class Save extends SimpleButton
{
    protected function onAttributesSet(): void
    {
        $this->type ??= 'submit';
        $this->variant ??= 'success';
        $this->text ??= Str::ucfirst(trans('action.save'));

        if ($this->confirm !== null) {
            $this->confirmVariant ??= 'success';
            $this->confirmId = 'save-'.($this->confirmId ?? Str::random(32));
        }

        parent::onAttributesSet(); // ← validation du parent
    }
}
```

### Exemple : extension applicative (le cas Savane)

Le cas qui motivait toute cette réflexion — **zéro boilerplate** :

```php
class Archives extends Base
{
    public ?int $itemsInArchives = null;

    protected function onAttributesSet(): void
    {
        parent::onAttributesSet();

        if ($this->itemsInArchives !== null) {
            $badge = '<span class="badge text-bg-light">'.$this->itemsInArchives.'</span>';
            $this->endContent = $this->endContent !== null
                ? $this->endContent.' '.$badge
                : $badge;
        }
    }
}
```

Strictement identique à la piste 1, car le pattern d'extension est le même. La différence est que le **package lui-même** utilise le même mécanisme.

### Ce qui change côté `BladeComponent`

```php
abstract class BladeComponent extends IlluminateComponent
{
    public function withAttributes(array $attributes)
    {
        parent::withAttributes($attributes);

        $this->hydrateExtraProperties();
        $this->onAttributesSet();

        return $this;
    }

    protected function onAttributesSet(): void {}

    // hydrateExtraProperties() identique à la piste 1,
    // SAUF : pas de filtre sur le namespace BladeUIKitBootstrap
    // (on hydrate TOUTES les propriétés publiques hors constructeur)
}
```

### Breaking changes

| Changement | Impact |
|------------|--------|
| Constructeurs allégés | Les apps qui appellent `parent::__construct(variant: 'primary', ...)` cassent |
| `initAttributes()` supprimé | Remplacé par `onAttributesSet()` — même rôle, même position dans le lifecycle |
| `onConstructing()` supprimé | Remplacé par `onAttributesSet()` — un seul hook au lieu de deux |
| Propriétés hors constructeur | Les propriétés ne sont plus des paramètres promus — même effet côté PHP, mais la déclaration change |

### Avantages par rapport à la piste 1

| Critère | Piste 1 (1.x) | Piste 2 (2.0) |
|---------|---------------|---------------|
| Rétrocompatibilité | ✅ Totale | ❌ Breaking |
| Constructeurs du package | Inchangés (22+ params) | Allégés (0-1 param) |
| Hooks d'extension | 3 (`onConstructing`, `initAttributes`, `onAttributesSet`) | 1 (`onAttributesSet`) |
| Cohérence | Deux mécanismes (constructeur + hydratation) | Un seul mécanisme unifié |
| Extension applicative | Identique | Identique |
| Maintenance du package | Props dupliquées (constructeur + héritage) | Propriétés déclarées une seule fois |
| Templates Blade | Aucun changement | Aucun changement |

### Points de vigilance

| Question | Réponse |
|----------|---------|
| Performance | Plus de propriétés à hydrater par reflection — le cache est impératif |
| `$url` requis sur FormButton | Reste un paramètre constructeur — Blade lève une erreur si absent, comportement attendu |
| Ordre `parent::onAttributesSet()` | À documenter clairement : l'enfant set les défauts **avant** d'appeler parent (qui valide) |
| Migration 1.x → 2.0 | Guide de migration nécessaire pour les apps qui override les constructeurs |

## Comparaison des pistes

| | Piste 1 | Piste 2 |
|---|---------|---------|
| **Résumé** | Ajout du mécanisme d'hydratation, constructeurs inchangés | Refonte complète, constructeurs allégés |
| **Complexité d'implémentation** | Faible — un override de `withAttributes()` | Moyenne — réécriture de tous les composants |
| **Rétrocompatibilité** | ✅ Release mineure | ❌ Release majeure (2.0) |
| **Résout le problème d'extension** | ✅ Oui | ✅ Oui |
| **Simplifie le package lui-même** | ❌ Non | ✅ Oui |
| **Un seul modèle mental** | ❌ Deux mécanismes coexistent | ✅ Un seul mécanisme unifié |

### Recommandation

Les deux pistes ne sont pas exclusives. La stratégie la plus pragmatique serait :

1. **Court terme** : implémenter la piste 1 en release mineure — les applications bénéficient immédiatement du pattern d'extension sans breaking change
2. **Moyen terme** : planifier la piste 2 pour une version 2.0 — le même mécanisme (`withAttributes()` + `hydrateExtraProperties()` + `onAttributesSet()`) est conservé, seuls les constructeurs du package sont refondus
