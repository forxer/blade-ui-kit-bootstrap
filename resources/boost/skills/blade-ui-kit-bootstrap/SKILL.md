---
name: blade-ui-kit-bootstrap
description: Usage patterns for blade-ui-kit-bootstrap components. Activate when using or extending form, input, button, modal, or alert components from this package.
allowed-tools: Read, Glob
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

- Hook à utiliser : `onConstructing()` — jamais `initAttributes()` (réservé au package)
- Toujours `??=` pour que les props passées en template priment sur les defaults

```php
protected function onConstructing(): void
{
    $this->variant ??= 'danger';
    $this->text ??= 'Mon libellé';
}
```

Enregistrement dans `config/blade-ui-kit-bootstrap.php` :

```php
'components' => ServiceProvider::defaultComponents()
    ->merge(['mon-bouton' => MonBouton::class])   // ajouter à côté du défaut
    ->replace(['btn-save' => MonBouton::class])   // remplacer le défaut
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
| `btn_start_icon_format` | `''` | Format `sprintf` pour icône avant le texte |
| `btn_end_icon_format` | `''` | Format `sprintf` pour icône après le texte |

## Liste complète des action buttons

`btn-save`, `btn-create`, `btn-edit`, `btn-delete`, `btn-destroy`, `btn-cancel`,
`btn-back`, `btn-back-list`, `btn-back-home`, `btn-show`, `btn-copy`, `btn-preview`,
`btn-logout`, `btn-email`, `btn-phone`, `btn-website`, `btn-archive`, `btn-archives`,
`btn-restore`, `btn-recycle-bin`, `btn-enable`, `btn-enabled`, `btn-disable`, `btn-disabled`,
`btn-move-up`, `btn-move-down`, `btn-confirm-modal-yes`, `btn-confirm-modal-no`

## Règles

- ❌ `initAttributes()` dans les extensions app — réservé aux composants du package
- ❌ Hardcoder `is-invalid` — géré automatiquement par le package
- ❌ `Blade::component()` dans un ServiceProvider — utiliser le fichier de config
- ✅ `onConstructing()` + `??=` pour toute extension
- ✅ Enregistrer via `config/blade-ui-kit-bootstrap.php`

## Références internes

- `docs/forms.md` — form, label, error
- `docs/inputs/` — tous les inputs
- `docs/buttons/` — boutons et action buttons
- `docs/modals.md` — modal, form-modal, confirm-modal
- `docs/extending-components.md` — guide complet d'extension
- `docs/configuration.md` — toutes les options de config
