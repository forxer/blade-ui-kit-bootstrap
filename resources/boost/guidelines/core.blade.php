## blade-ui-kit-bootstrap

Blade components styled with Bootstrap 4/5. Auto-handles CSRF, method spoofing, validation (`is-invalid`), old values.

### Component families

- **Forms**: `form`, `label`, `error`
- **Inputs**: `input`, `text`, `textarea`, `select`, `password`, `email`, `date`, `time`, `hidden`, `checkbox`, `radio`
- **Buttons**: `btn`, `form-button`, `link-button`, `help-info`
- **Action buttons** (CRUD, pre-configured): `btn-save`, `btn-create`, `btn-edit`, `btn-delete`, `btn-cancel`, `btn-back`, `btn-show`, `btn-logout`, `btn-restore`, ... (see skill for full list)
- **Modals**: `modal`, `form-modal`, `confirm-modal`
- **Other**: `alert`, `badge`

### Extending

```bash
php artisan make:blade-ui-kit-bs-component MyButton --extends=btn-save
```

Register via `config/blade-ui-kit-bootstrap.php` using `merge()`, `replace()`, or `except()`.

- IMPORTANT: Activate `blade-ui-kit-bootstrap` skill for detailed usage patterns, extension hooks, config keys, and layout stacks.
