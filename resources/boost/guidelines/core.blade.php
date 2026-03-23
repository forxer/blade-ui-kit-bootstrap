# blade-ui-kit-bootstrap

- Blade components styled with Bootstrap 4/5. Auto-handles CSRF, method spoofing, validation (`is-invalid`), old values.
- **Forms**: `form`, `label`, `error` — **Inputs**: `input`, `text`, `textarea`, `select`, `password`, `email`, `date`, `time`, `hidden`, `checkbox`, `radio`
- **Buttons**: `btn`, `form-button`, `link-button`, `help-info` — **Action buttons** (pre-configured): `btn-save`, `btn-create`, `btn-edit`, `btn-delete`, `btn-cancel`, `btn-back`, `btn-show`, `btn-logout`, `btn-restore`, etc.
- **Modals**: `modal`, `form-modal`, `confirm-modal` — **Other**: `alert`, `badge`
- Extend components via `php artisan make:blade-ui-kit-bs-component MyButton --extends=btn-save`, register in `config/blade-ui-kit-bootstrap.php` using `merge()`, `replace()`, `replaceAlias()`, or `except()`.
- IMPORTANT: Activate `blade-ui-kit-bootstrap` skill for detailed usage patterns, extension hooks, config keys, and layout stacks.
