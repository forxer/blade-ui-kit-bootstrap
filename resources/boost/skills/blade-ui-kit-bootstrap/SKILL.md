---
name: blade-ui-kit-bootstrap
description: "Usage patterns for blade-ui-kit-bootstrap components. Activate when working with form, input, button, modal, alert, or badge components from this package, or when extending/customizing components via config or artisan command."
license: MIT
metadata:
  author: forxer
---

# blade-ui-kit-bootstrap — Patterns détaillés

## Patterns d'usage Blade

```blade
{{-- Form avec validation --}}
<x-form :action="route('posts.store')">
    <x-label for="title" />
    <x-input name="title" />
    <x-error field="title" />
    <x-btn-save />
</x-form>

{{-- PUT/PATCH --}}
<x-form :action="route('posts.update', $post)" method="PUT">...</x-form>

{{-- Upload de fichier --}}
<x-form :action="route('posts.store')" has-files>...</x-form>

{{-- Bouton de suppression avec confirmation --}}
<x-btn-delete
    :url="route('posts.destroy', $post)"
    confirm="Supprimer cet élément ?"
    :confirm-id="'confirm-delete-'.$post->id"
/>
<x-confirm-modal :id="'confirm-delete-'.$post->id" />

{{-- Modal classique --}}
<x-btn data-bs-toggle="modal" data-bs-target="#my-modal">Ouvrir</x-btn>
<x-modal id="my-modal" title="Titre">
    Contenu
    <x-slot:footer><x-btn-cancel data-bs-dismiss="modal" /></x-slot>
</x-modal>

{{-- Modal avec formulaire --}}
<x-form-modal id="edit-modal" title="Modifier" :action="route('posts.update', $post)" method="PUT">
    ...
</x-form-modal>
```

## Extension de composants

```bash
php artisan make:blade-ui-kit-bs-component MonBouton --extends=btn-save
```

- Hook `onAttributesSet()` : personnaliser les valeurs par défaut et ajouter de la logique post-hydratation
- Toujours `??=` pour que les props passées en template priment sur les defaults
- Pas de `parent::onAttributesSet()` — le package appelle `initAttributes()` automatiquement après

```php
protected function onAttributesSet(): void
{
    $this->variant ??= 'danger';
    $this->text ??= 'Mon libellé';
}
```

### Propriétés custom (extra properties)

Pour ajouter une propriété typée sans redéclarer le constructeur parent :

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

```blade
<x-btn-archives :url="route('archives')" :items-in-archives="$count" />
```

- Coercion de type automatique (`int`, `float`, `bool`, `string`)
- Conversion kebab-case → camelCase transparente
- Voir `docs/extending-components.md` section "Adding Custom Properties" pour le détail complet

Enregistrement dans `config/blade-ui-kit-bootstrap.php` :

```php
'components' => ServiceProvider::defaultComponents()
    ->merge(['mon-bouton' => MonBouton::class])   // ajouter à côté du défaut
    ->replace(['btn-save' => MonBouton::class])   // remplacer le défaut
    ->replaceAlias(['btn-save' => 'save'])          // renommer un alias
    ->except(['date', 'time'])                    // désactiver
    ->components(),
```

## Stacks layout

À inclure dans le layout de l'application :

```blade
@stack('blade-ui-kit-bs-styles')    {{-- dans <head> --}}
@stack('blade-ui-kit-bs-html')      {{-- avant </body> --}}
@stack('blade-ui-kit-bs-scripts')   {{-- avant </body> --}}
```

## Config keys

| Clé | Valeur par défaut | Description |
|-----|-------------------|-------------|
| `bootstrap_version` | `BootstrapVersion::V5` | Version Bootstrap (V4 ou V5) |
| `prefix` | `''` | Préfixe composants (ex: `'bs'` → `<x-bs-input>`) |
| `all_forms_with_novalidate` | `true` | Attribut `novalidate` sur tous les formulaires |
| `all_buttons_outline` | `false` | Tous les boutons en style outline |
| `alert_icon_format` | `null` | Format `sprintf` pour icône dans les alertes |
| `btn_start_icon_format` | `null` | Format `sprintf` pour icône avant le texte |
| `btn_end_icon_format` | `null` | Format `sprintf` pour icône après le texte |
| `enable_test_routes` | `APP_DEBUG` | Active les routes de test/démo des composants |

## Liste complète des action buttons

`btn-save`, `btn-create`, `btn-edit`, `btn-duplicate`, `btn-delete`, `btn-destroy`, `btn-cancel`,
`btn-back`, `btn-back-list`, `btn-back-home`, `btn-show`, `btn-copy`, `btn-preview`,
`btn-logout`, `btn-email`, `btn-phone`, `btn-website`, `btn-archive`, `btn-archives`,
`btn-restore`, `btn-recycle-bin`, `btn-enable`, `btn-enabled`, `btn-disable`, `btn-disabled`,
`btn-move-up`, `btn-move-down`, `btn-confirm-modal-yes`, `btn-confirm-modal-no`

## Règles

- ❌ `initAttributes()` — supprimé en v2, utiliser `onAttributesSet()`
- ❌ `onConstructing()` — supprimé en v2, utiliser `onAttributesSet()`
- ❌ Hardcoder `is-invalid` — géré automatiquement par le package
- ❌ `Blade::component()` dans un ServiceProvider — utiliser le fichier de config
- ✅ `onAttributesSet()` + `??=` pour toute extension (pas de `parent::` nécessaire)
- ✅ Enregistrer via `config/blade-ui-kit-bootstrap.php`
- ✅ Échapper soi-même les données non sûres passées aux attributs de contenu (`title`, `text`, `confirm`, `startContent`, `endContent`, `content`) avec `e()` — rendus en brut (HTML autorisé), le composant ne les auto-échappe pas

## Références internes

- `docs/forms.md` — form, label, error
- `docs/inputs/` — tous les inputs
- `docs/buttons/` — boutons et action buttons
- `docs/modals.md` — modal, form-modal, confirm-modal
- `docs/extending-components.md` — guide complet d'extension
- `docs/configuration.md` — toutes les options de config
