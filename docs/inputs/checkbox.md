# Checkbox

The Checkbox component provides a styled checkbox input with automatic label association, validation error handling, and old value persistence.

## Basic Usage

```blade
<x-checkbox name="agree" label="I agree to the terms" />
```

## Attributes

### Required Attributes

- **name** (string): The input name attribute
- **label** (string): The checkbox label text (supports HTML)

### Optional Attributes

- **value** (string): The checkbox value (default: `'1'`)
- **checked** (bool|null): Whether the checkbox should be checked by default (default: `null`)
- **id** (string|null): The input ID attribute (default: uses `name`)
- **errorBag** (string|null): The error bag to use for validation errors (default: `null`)

## Examples

### Basic Checkbox

```blade
<x-checkbox name="newsletter" label="Subscribe to newsletter" />
```

### Checked by Default

```blade
<x-checkbox name="terms" label="I agree to the terms and conditions" :checked="true" />
```

### Custom Value

```blade
<x-checkbox name="status" label="Active" value="active" />
```

### With Custom ID

```blade
<x-checkbox name="remember" label="Remember me" id="remember-checkbox" />
```

### With HTML Label

```blade
<x-checkbox
    name="privacy"
    label="I accept the <a href='/privacy'>privacy policy</a>"
/>
```

### With Validation Errors

When validation errors exist for the checkbox, it will automatically display with Bootstrap's invalid state:

```blade
<x-checkbox name="agree" label="I agree to the terms" />
<x-error name="agree" />
```

### In a Form

```blade
<x-form action="/register" method="POST">
    <x-text name="email" label="Email" />

    <x-checkbox name="newsletter" label="Subscribe to newsletter" />

    <x-checkbox name="terms" label="I agree to the terms" />

    <x-btn type="submit">Register</x-btn>
</x-form>
```

### Multiple Checkboxes

```blade
<div class="mb-3">
    <label class="form-label">Select your interests:</label>
    <x-checkbox name="interests[]" value="coding" label="Coding" />
    <x-checkbox name="interests[]" value="design" label="Design" />
    <x-checkbox name="interests[]" value="marketing" label="Marketing" />
</div>
```

### With Old Value Persistence

The checkbox automatically restores its checked state from `old()` after validation fails:

```php
// Controller
public function store(Request $request)
{
    $request->validate([
        'terms' => 'required|accepted',
    ]);

    // If validation fails, the checkbox state is preserved
}
```

```blade
<x-checkbox name="terms" label="I agree" />
{{-- Will be checked if old('terms') === '1' --}}
```

### Custom Error Bag

```blade
<x-checkbox name="consent" label="I consent" errorBag="customBag" />
```

## Additional Attributes

Any additional attributes passed to the component will be applied to the wrapper `<div>` element:

```blade
<x-checkbox
    name="featured"
    label="Featured"
    class="mb-4"
    data-category="settings"
/>
```

## Checked State Logic

The component determines the checked state in this order:

1. **Old value** (from previous form submission): If `old('name')` exists and equals the checkbox value
2. **Explicit checked parameter**: If provided via the `:checked` attribute
3. **Default**: Unchecked

This ensures proper behavior with Laravel's validation and form repopulation.

## Bootstrap Differences

### Bootstrap 5

Uses the `form-check` structure:

```html
<div class="form-check">
    <input class="form-check-input" type="checkbox" id="..." name="..." />
    <label class="form-check-label" for="...">...</label>
</div>
```

### Bootstrap 4

Uses the `custom-control custom-checkbox` structure:

```html
<div class="custom-control custom-checkbox">
    <input class="custom-control-input" type="checkbox" id="..." name="..." />
    <label class="custom-control-label" for="...">...</label>
</div>
```

The component automatically uses the correct structure based on your configured Bootstrap version.

## Accessibility

- The checkbox is automatically associated with its label via the `for` and `id` attributes
- When validation errors exist, `aria-describedby` is added to link to the error message
- The label parameter is required to ensure all checkboxes have descriptive labels

## Validation

The component integrates with Laravel's validation system:

- Automatically applies `is-invalid` class when validation errors exist
- Preserves checked state via `old()` after validation failure
- Works with the `<x-error>` component to display validation messages

```blade
<x-checkbox name="agree" label="I agree to the terms" />
<x-error name="agree" />
```
