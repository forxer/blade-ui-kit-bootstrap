# blade-ui-kit-bootstrap

- Blade components styled with Bootstrap 4/5. Auto-handles CSRF, method spoofing, validation (`is-invalid`), old values.
- **Forms**: `form`, `label`, `error` — **Inputs**: `input`, `text`, `textarea`, `select`, `password`, `email`, `date`, `time`, `hidden`, `checkbox`, `radio`
- **Buttons**: `btn`, `form-button`, `link-button`, `help-info` — **Action buttons** (pre-configured): `btn-save`, `btn-create`, `btn-edit`, `btn-duplicate`, `btn-delete`, `btn-cancel`, `btn-back`, `btn-show`, `btn-logout`, `btn-restore`, etc.
- **Modals**: `modal`, `form-modal`, `confirm-modal` — **Other**: `alert`, `badge`
- Content attributes (`title`, `text`, `confirm`, `startContent`, `endContent`, `content`) are rendered raw to allow HTML — escape untrusted data yourself with `e()` (e.g. `:title="trans('edit', ['name' => e($model->name)])"`); the component does NOT auto-escape them.
- Extend components via `php artisan make:blade-ui-kit-bs-component MyButton --extends=btn-save`, register in `config/blade-ui-kit-bootstrap.php` using `merge()`, `replace()`, `replaceAlias()`, or `except()`.
- Constrained attribute values (variants, sizes, button types, HTTP methods, modal sizes) come from referential enums in `BladeUIKitBootstrap\Enums` — they are validated at render time (invalid value throws `InvalidArgumentException`) and documented via PHPDoc `@var`/`@param` for IDE hover and value autocompletion.
- IMPORTANT: Activate `blade-ui-kit-bootstrap` skill for detailed usage patterns, extension hooks, config keys, and layout stacks.
