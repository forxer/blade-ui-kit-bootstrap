Upgrade
=======

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
