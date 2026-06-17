---
title: Extending Components
order: 10
---

Extending Components
====================

Blade UI Kit Bootstrap provides a convenient Artisan command to quickly generate custom component classes that extend the default components. This allows you to customize component behavior while maintaining all the base functionality.

The Make Component Command
--------------------------

### Basic Usage

```bash
php artisan make:blade-ui-kit-bs-component YourComponentName --extends=component-alias
```

### Options

- `name` (required): The name of your custom component class (e.g., `PrimaryButton`, `CustomModal`)
- `--extends` (required): The component to extend. Can be either:
  - A component alias (e.g., `btn`, `form-button`, `modal`)
  - A full class name (e.g., `BladeUIKitBootstrap\Components\Buttons\SimpleButton`)
- `--force`: Overwrite the component if it already exists

### Available Components

The command will show you a list of all available components if you forget to specify the `--extends` option or if the component doesn't exist.

#### Buttons
- `btn` - Simple button
- `form-button` - Form button (with form wrapper)
- `link-button` - Link styled as button
- `help-info` - Help/info button

#### Action Buttons
- `btn-back`, `btn-back-list`, `btn-back-home` - Navigation buttons
- `btn-archive`, `btn-archives` - Archive buttons
- `btn-cancel` - Cancel button
- `btn-copy` - Copy button
- `btn-create` - Create/Add button
- `btn-delete`, `btn-destroy` - Delete buttons
- `btn-disable`, `btn-disabled` - Disable status buttons
- `btn-edit` - Edit button
- `btn-email` - Email button
- `btn-enable`, `btn-enabled` - Enable status buttons
- `btn-logout` - Logout button
- `btn-confirm-modal-yes`, `btn-confirm-modal-no` - Modal confirmation buttons
- `btn-move-down`, `btn-move-up` - Move buttons
- `btn-phone` - Phone button
- `btn-preview` - Preview button
- `btn-recycle-bin` - Recycle bin button
- `btn-restore` - Restore button
- `btn-save` - Save button
- `btn-show` - Show/View button
- `btn-website` - Website link button

#### Forms
- `form` - Form wrapper
- `label` - Form label
- `error` - Error display

#### Inputs
- `input` - Generic input
- `text` - Text input
- `textarea` - Textarea
- `select` - Select dropdown
- `password` - Password input
- `email` - Email input
- `date` - Date input
- `time` - Time input
- `hidden` - Hidden input

#### Modals
- `modal` - Basic modal
- `confirm-modal` - Confirmation modal
- `form-modal` - Form modal

Directory Structure Preservation
--------------------------------

**Important:** The command automatically preserves the directory structure of the parent component you're extending.

For example:
- When extending `btn-save` (which is `BladeUIKitBootstrap\Components\Buttons\Actions\Save`)
  - Your component will be created in: `app/View/Components/Buttons/Actions/YourComponent.php`
  - With namespace: `App\View\Components\Buttons\Actions`

- When extending `modal` (which is `BladeUIKitBootstrap\Components\Modals\Modal`)
  - Your component will be created in: `app/View/Components/Modals/YourComponent.php`
  - With namespace: `App\View\Components\Modals`

- When extending `text` (which is `BladeUIKitBootstrap\Components\Forms\Inputs\Text`)
  - Your component will be created in: `app/View/Components/Forms/Inputs/YourComponent.php`
  - With namespace: `App\View\Components\Forms\Inputs`

This keeps your components organized in the same logical structure as the package, making it easier to maintain and understand your customizations.

If you create a view file, it will also follow the same structure:
- Button action views: `resources/views/components/buttons/actions/your-component.blade.php`
- Modal views: `resources/views/components/modals/your-component.blade.php`
- Input views: `resources/views/components/forms/inputs/your-component.blade.php`

Examples
--------

### Example 1: Custom Save Button

Create a custom save button that always uses the success variant:

```bash
php artisan make:blade-ui-kit-bs-component CustomSaveButton --extends=btn-save
```

This creates `app/View/Components/Buttons/Actions/CustomSaveButton.php`:

**Note:** The command automatically preserves the directory structure of the parent component. Since `btn-save` extends `BladeUIKitBootstrap\Components\Buttons\Actions\Save`, your custom component will be created in `app/View/Components/Buttons/Actions/`.

```php
<?php

declare(strict_types=1);

namespace App\View\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\Actions\Save;

class CustomSaveButton extends Save
{
    protected function onAttributesSet(): void
    {
        // Override default variant
        $this->variant ??= 'success';
        $this->text ??= 'Save Changes';
    }
}
```

Then register it in `config/blade-ui-kit-bootstrap.php`:

**Option 1 - Add as a new component:**

```php
use App\View\Components\Buttons\Actions\CustomSaveButton;
use BladeUIKitBootstrap\ServiceProvider;

return [
    'components' => ServiceProvider::defaultComponents()
        ->merge([
            'buttons.actions.custom-save-button' => CustomSaveButton::class,
        ])
        ->components(),
    // ...
];
```

**Option 2 - Replace the existing btn-save component:**

```php
use App\View\Components\Buttons\Actions\CustomSaveButton;
use BladeUIKitBootstrap\ServiceProvider;

return [
    'components' => ServiceProvider::defaultComponents()
        ->replace([
            'btn-save' => CustomSaveButton::class,
        ])
        ->components(),
    // ...
];
```

Use it in your views:

```blade
{{-- If you merged as new component --}}
<x-buttons.actions.custom-save-button url="/save" />

{{-- If you replaced btn-save --}}
<x-btn-save url="/save" />
```

### Example 2: Custom Modal with Default Settings

```bash
php artisan make:blade-ui-kit-bs-component DangerModal --extends=modal
```

This creates `app/View/Components/Modals/DangerModal.php`:

```php
<?php

declare(strict_types=1);

namespace App\View\Components\Modals;

use BladeUIKitBootstrap\Components\Modals\Modal;

class DangerModal extends Modal
{
    protected function onAttributesSet(): void
    {
        // Make non-dismissable by default
        $this->dismissable ??= false;
    }
}
```

Register in `config/blade-ui-kit-bootstrap.php`:

```php
'components' => ServiceProvider::defaultComponents()
    ->merge([
        'modals.danger-modal' => \App\View\Components\Modals\DangerModal::class,
    ])
    ->components(),
```

Usage:

```blade
<x-modals.danger-modal id="danger-modal" title="Warning">
    This is a danger modal!
</x-modals.danger-modal>
```

### Example 3: Custom Input with Validation

```bash
php artisan make:blade-ui-kit-bs-component PhoneInput --extends=text
```

This creates `app/View/Components/Forms/Inputs/PhoneInput.php`:

```php
<?php

declare(strict_types=1);

namespace App\View\Components\Forms\Inputs;

use BladeUIKitBootstrap\Components\Forms\Inputs\Text;

class PhoneInput extends Text
{
    protected function onAttributesSet(): void
    {
        // Add phone-specific attributes
        $this->type = 'tel';

        // Set default placeholder for phone inputs
        $this->placeholder ??= '+1 (555) 123-4567';
    }
}
```

Register in `config/blade-ui-kit-bootstrap.php`:

```php
'components' => ServiceProvider::defaultComponents()
    ->merge([
        'forms.inputs.phone-input' => \App\View\Components\Forms\Inputs\PhoneInput::class,
    ])
    ->components(),
```

Usage:

```blade
<x-forms.inputs.phone-input name="phone" />
```

Customization Hooks
-------------------

When extending components, you have access to two key methods:

### `onAttributesSet()` **(The application extension hook)**

**This is the hook to use when extending components in your application.**

Called after all public class properties have been hydrated from the Blade attribute bag. Use this to set defaults or add post-hydration logic. No `parent::onAttributesSet()` call needed — the package's internal `initAttributes()` runs automatically after your hook.

```php
protected function onAttributesSet(): void
{
    $this->variant ??= 'danger';
    $this->text ??= 'Custom Text';
}
```

### `viewName()`

Controls which view is rendered. Return `null` to hide the component, or a view name to render it.

```php
public function viewName(): ?string
{
    // Option 1: Use parent's view
    return parent::viewName();

    // Option 2: Use custom view
    // return 'components.your-custom-view';
}
```

Adding Custom Properties
------------------------

You can add typed properties to an extended component without redeclaring the parent constructor. Declare your property as a public class property and use `onAttributesSet()` for post-hydration logic.

### Example

```php
namespace App\View\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\Actions\Archives as Base;

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
<x-btn-archives :url="route('admin.archives')" :items-in-archives="$count" />
```

The `items-in-archives` attribute is automatically converted to `itemsInArchives` (kebab-case to camelCase), cast to `int`, and assigned to the property. It does **not** appear in the rendered HTML output.

### Supported Types

| Declared Type | Coercion |
|---------------|----------|
| `int` | `(int)` cast |
| `float` | `(float)` cast |
| `bool` | `filter_var($value, FILTER_VALIDATE_BOOLEAN)` |
| `string` | `(string)` cast |
| `array`, objects | No coercion, value passed as-is |
| No type declared | No coercion, value passed as-is |
| Nullable (`?int`) | `null` if attribute absent, coerced if present |

### Lifecycle

The complete hook execution order is:

1. Constructor — required parameters (`$url`, `$id`, `$show`, `$hide`) **and content properties** (`$title`, `$text`, `$confirm`, `$startContent`, `$endContent`, …). Content properties are constructor parameters so Blade does not apply `sanitizeComponentAttribute()` (`e()`) to them: they are rendered raw (`{!! !!}`) and escaping untrusted data is the caller's responsibility.
2. `data()` — Blade captures a snapshot of public properties *(before attributes are set)*
3. `withAttributes()` — Blade assigns non-constructor attributes
4. `hydrateExtraProperties()` — automatic property hydration with type coercion
5. `onAttributesSet()` — application hook for defaults and post-hydration logic (no parent call needed)
6. `initAttributes()` — package defaults and validation (runs automatically)
7. `refreshComponentData()` — updates the stale snapshot so the view sees fresh values

### Important Notes

- Only **public** properties are hydrated. Private or protected properties are ignored.
- Properties with `private(set)` or `protected(set)` asymmetric visibility are skipped.
- Properties that are **constructor parameters** are handled by Blade normally and skipped by the hydration mechanism.
- If an extra property name conflicts with an HTML attribute you need, the property will capture the attribute (it will be hydrated into the property instead of being rendered on the element). Choose distinctive property names to avoid this.
- Content properties (`title`, `text`, `confirm`, `startContent`, `endContent`, …) are constructor parameters, not extra properties, so they bypass this hydration mechanism and Blade does not escape them — pass already-escaped or trusted HTML.
- Bound syntax (`:items-in-archives="$count"`) passes the PHP value directly. Unbound syntax (`items-in-archives="42"`) passes a string that gets coerced.
- You can modify **any component property** in `onAttributesSet()` (e.g., `$this->endContent`) and the view will see the updated value.

Custom Views
------------

The command will ask if you want to create a corresponding view file (defaults to "no"). If you choose yes, it creates a basic view template at `resources/views/components/your-component-name.blade.php`.

You can then customize this view and reference it in your component's `viewName()` method:

```php
public function viewName(): ?string
{
    return 'components.custom-save-button';
}
```

Tips
----

1. **Directory structure is preserved**: The command automatically creates your component in the same directory structure as the parent component. This keeps your customizations organized and easy to find.

2. **Use `??=` operator**: Always use the null coalescing assignment operator (`??=`) in `onAttributesSet()` so that values passed to the component take precedence over defaults.

3. **No `parent::onAttributesSet()` needed**: The package's internal `initAttributes()` runs automatically after your `onAttributesSet()` hook — you do not need to call `parent::onAttributesSet()`. Simply set your defaults and return.

4. **Component registration**: Register your custom components in `config/blade-ui-kit-bootstrap.php` using either:
   - `merge()` - to add a new component with a new alias
   - `replace()` - to override an existing component with your custom version

   The command will show you the exact registration code to use for both options.

5. **Naming conventions**:
   - Use PascalCase for class names (e.g., `CustomSaveButton`)
   - Use kebab-case with dots for component aliases (e.g., `buttons.actions.custom-save-button`)
   - The alias structure mirrors the namespace structure

6. **Choose merge or replace wisely**:
   - Use `merge()` when you want to keep the original component and add your custom variant alongside it
   - Use `replace()` when you want your custom component to completely replace the default one throughout your application

7. **Configuration example with multiple components**:

```php
// In config/blade-ui-kit-bootstrap.php
use BladeUIKitBootstrap\ServiceProvider;

return [
    'components' => ServiceProvider::defaultComponents()
        ->merge([
            'buttons.actions.custom-save' => \App\View\Components\Buttons\Actions\CustomSave::class,
            'modals.danger-modal' => \App\View\Components\Modals\DangerModal::class,
        ])
        ->replace([
            'btn-save' => \App\View\Components\Buttons\Actions\CustomSave::class,
        ])
        ->components(),
    // ...
];
```
