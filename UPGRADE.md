Upgrade
=======

From 1.x to 2.0.0
------------------

### Slim constructors

All button base classes now have slim constructors. Constructor parameters have been drastically reduced:

| Component | v1 params | v2 params |
|-----------|-----------|-----------|
| SimpleButton | 23 | 2 (`$show`, `$hide`) |
| LinkButton | 22 | 2 (`$show`, `$hide`) |
| FormButton | 26 | 3 (`$url`, `$show`, `$hide`) |
| HelpInfo | 14 | 2 (`$show`, `$hide`) |
| Alert | 6 | 0 |
| Badge | 4 | 0 |
| Modal | 6 | 2 (`$id`, `$title`) |
| Confirm | 3 | 1 (`$id`) |
| Form Modal | 10 | 3 (`$id`, `$title`, `$action`) |

All optional properties are now class properties, automatically hydrated from the Blade attribute bag.

**Blade templates require no changes** — all attributes work the same way as before.

**If you extended a component and called `parent::__construct()` with named parameters**, you must migrate:

```php
// v1 — BREAKS in v2
parent::__construct(variant: 'primary', text: 'Save');

// v2 — use onAttributesSet() instead
protected function onAttributesSet(): void
{
    $this->variant ??= 'primary';
    $this->text ??= 'Save';
}
```

### `initAttributes()` removed

Replace with `onAttributesSet()`. No `parent::onAttributesSet()` call needed.

```php
// v1
protected function initAttributes(): void
{
    $this->variant ??= 'success';
}

// v2
protected function onAttributesSet(): void
{
    $this->variant ??= 'success';
}
```

### `onConstructing()` removed

Replace with `onAttributesSet()`. The timing is different (runs after attribute hydration instead of during construction), but the `??=` pattern ensures user-passed values take precedence.

```php
// v1
protected function onConstructing(): void
{
    $this->variant ??= 'danger';
}

// v2
protected function onAttributesSet(): void
{
    $this->variant ??= 'danger';
}
```

### Extra constructor parameters no longer needed

Components that redeclared the parent constructor to add custom parameters can now use class properties instead. The `onAttributesSet()` hook handles post-hydration logic.

```php
// v1 — 25 parameters just to add $target and $string
public function __construct(
    public ?string $target = null,
    public ?string $string = null,
    public ?string $text = null,
    // ... 22 more parameters ...
) {
    parent::__construct($text, ...);
}

// v2 — just class properties + hook
public ?string $target = null;
public ?string $string = null;

protected function onAttributesSet(): void
{
    // Use $this->target, $this->string here
}
```

### Modal optional parameters

Modal, Confirm, and Form Modal constructors now only accept required parameters. Optional parameters (`dismissable`, `size`, `centered`, `scrollable`) are class properties hydrated from attributes.

If you extend Modal and call `parent::__construct()`:

```php
// v1
parent::__construct($id, $title, $dismissable, $size, $centered, $scrollable);

// v2
parent::__construct($id, $title);
// Other properties are set via attributes or in onAttributesSet()
```

### Alert and Badge constructors removed

Alert and Badge no longer have constructors. All parameters are class properties.

### Quick migration checklist

- Replace `initAttributes()` → `onAttributesSet()` (no parent call needed)
- Replace `onConstructing()` → `onAttributesSet()` (no parent call needed)
- Remove custom constructors that only existed to add extra parameters
- Update `parent::__construct()` calls to only pass required parameters
- Blade templates: **no changes needed**


From 0.26.x to 1.0.0
--------------------

### Requirements updated

**PHP 8.4 is now required**

The minimum PHP version has been upgraded from 8.2 to 8.4. You must upgrade your PHP installation before updating to version 1.0.0.

**Laravel 12 is now required**

Only Laravel 12 is now supported. Laravel 10 and 11 are no longer supported. You must upgrade to Laravel 12 before updating to version 1.0.0.

### Configuration key renamed

The configuration key `boostrap_version` has been corrected to `bootstrap_version`

**If you have NOT published the configuration file:** No action required. The package will automatically use the corrected key.

**If you HAVE published the configuration file** (`config/blade-ui-kit-bootstrap.php`):

You need to rename the configuration key in your published file:

```php
// OLD (incorrect)
'boostrap_version' => BootstrapVersion::V5,

// NEW (correct)
'bootstrap_version' => BootstrapVersion::V5,
```

**If you are accessing this configuration programmatically in your code:**

Update any references from `config('blade-ui-kit-bootstrap.boostrap_version')` to `config('blade-ui-kit-bootstrap.bootstrap_version')`.

### New features

**Component generation command**

A new Artisan command `make:blade-ui-kit-bs-component` is available to generate custom components that extend default components. See the [Extending Components](./docs/extending-components.md) documentation for details.

**Component registration via configuration**

Custom components should now be registered in the configuration file (`config/blade-ui-kit-bootstrap.php`) using the `merge()` or `replace()` methods instead of registering them in a ServiceProvider. See the [Configuration](./docs/configuration.md#extending-components) documentation for details.


From 0.19.x to 0.24.x
---------------------

With the addition of the `DefaultComponents` class, if you have published the configuration file and want to use it, you need to adjust this file.


From 0.18.x to 0.19.x
---------------------

### Confirm modal

The component tag has been renamed from `<x-confirm-modal />` to `<x-confirm-modal />`. You need to find and replace it.

With the addition of `confirmTitle` property on the button components, the class constructor signature of these components has changed. If you have extended these classes you must modify them accordingly.


From 0.17.x to 0.18.x
---------------------

### Confirm modal

The "confirm modal" attributes have been renamed:

- from `data-bs-confirm` to `data-buk-confirm`
- from `data-bs-confirm-modal` to `data-buk-confirm-modal`
- from `data-confirm-trigger` to `data-buk-confirm-trigger`


From 0.16.x to 0.17.x
---------------------

With the addition of the `Help info button` component, if you have published the configuration file and want to use it, you need to add it to this file.

```php
    'components' => [
        // Buttons ...
        'help-info' => Buttons\HelpInfo::class,
    ]
```


From 0.15.x to 0.16.x
---------------------

The `action` FormButton attribute have been renamed to `url`.

So you need to replace `:action="` with `:url="` for :

- `<x-form-button />`
- `<x-btn-create />`
- `<x-btn-edit />`
- `<x-btn-archive />`
- `<x-btn-delete />`
- `<x-btn-restore />`
- `<x-btn-destroy />`
- `<x-btn-show />`
- `<x-btn-preview />`
- `<x-btn-move-up />`
- `<x-btn-move-down />`
- `<x-btn-enable />`
- `<x-btn-disable />`
- `<x-btn-enabled />`
- `<x-btn-disabled />`
- `<x-btn-back />`
- `<x-btn-back-list />`
- `<x-btn-back-home />`
- `<x-btn-logout />`
- `<x-btn-archives />`
- `<x-btn-recycle-bin />`


From 0.14.x to 0.15.x
---------------------

With the addition of `icon`, `startIcon` and `endIcon` properties on the button components, the class constructor signature of these components has changed. If you have extended these classes you must modify them accordingly.


From 0.13.x to 0.14.x
---------------------

With the addition of `startContent` and `endContent` properties on the button components, the class constructor signature of these components has changed. If you have extended these classes you must modify them accordingly.


From 0.11.x to 0.12.x
---------------------

### New `BootstrapVersion` enum

With the addition of the `BootstrapVersion` enum you should use it.

You will probably only need to modify the configuration file by replacing:
- `'bootstrap-4'` by `BootstrapVersion::V4`
- `'bootstrap-5'` by `BootstrapVersion::V5`

If you used character strings outside the configuration file you must replace:
- `'bootstrap-4'` by `BootstrapVersion::V4->value`
- `'bootstrap-5'` by `BootstrapVersion::V5->value`

### Renamed "button" views

If you published the views, you need to rename the file `button.blade.php` with `simple-button.blade.php`.

### Constructor signature of buttons

**All** the class constructor signature of buttons components has changed. If you have extended these classes you must modify them accordingly.


From 0.10.x to 0.11.x
---------------------

With the addition of different properties: `outline`, `no-outline`, `type`, `confirm`, `confirmId` and `formId` on the different components of the button, the class constructor signature of these components has changed. If you have extended these classes you must modify them accordingly.


From 0.9.x to 0.10.x
--------------------

### New `text` and `variant` properties

With the addition of the `text` and `variant` properties to the `FormButton` and `LinkButton` components, the class constructor signature of these two components has changed. If you have extended these classes you must modify them accordingly.

### Logout

The "logout" button becomes an "Action button", this changes its name in blade templates.

So you need to replace `<x-logout />` with `<x-btn-logout />`.

### Confirm modal

The "confirm modal" attributes have been renamed:

- from `data-confirm` to `data-bs-confirm`
- from `data-confirm-modal` to `data-bs-confirm-modal`


From 0.8.x to 0.9.x
-------------------

Confirm modals now require an id and this id should be referenced by the actionable element with the `data-confirm-modal` attribute.
