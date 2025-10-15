# Checkbox

The Checkbox component provides a styled checkbox input with automatic label association, validation error handling, and old value persistence.

**Important:** The component renders only the `<input>` and `<label>` elements. You must wrap it in the appropriate Bootstrap structure (`form-check` for Bootstrap 5, or `custom-control custom-checkbox` for Bootstrap 4) for proper styling.

## Basic Usage

**Bootstrap 5:**
```blade
<div class="form-check">
    <x-checkbox name="agree" label="I agree to the terms" />
</div>
```

**Bootstrap 4:**
```blade
<div class="custom-control custom-checkbox">
    <x-checkbox name="agree" label="I agree to the terms" />
</div>
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
<div class="form-check">
    <x-checkbox name="newsletter" label="Subscribe to newsletter" />
</div>
```

### Checked by Default

```blade
<div class="form-check">
    <x-checkbox name="terms" label="I agree to the terms and conditions" :checked="true" />
</div>
```

### Custom Value

```blade
<div class="form-check">
    <x-checkbox name="status" label="Active" value="active" />
</div>
```

### With Custom ID

```blade
<div class="form-check">
    <x-checkbox name="remember" label="Remember me" id="remember-checkbox" />
</div>
```

### With HTML Label

```blade
<div class="form-check">
    <x-checkbox
        name="privacy"
        label="I accept the <a href='/privacy'>privacy policy</a>"
    />
</div>
```

### With Validation Errors

When validation errors exist for the checkbox, it will automatically display with Bootstrap's invalid state. **Important:** The error component must be placed inside the same wrapper div for proper styling:

```blade
<div class="form-check">
    <x-checkbox name="agree" label="I agree to the terms" />
    <x-error field="agree" />
</div>
```

### In a Form

```blade
<x-form action="/register" method="POST">
    <div class="mb-3">
        <x-label for="email">Email</x-label>
        <x-email name="email" id="email" />
        <x-error field="email" />
    </div>

    <div class="form-check mb-3">
        <x-checkbox name="newsletter" label="Subscribe to newsletter" />
    </div>

    <div class="form-check mb-3">
        <x-checkbox name="terms" label="I agree to the terms" />
        <x-error field="terms" />
    </div>

    <x-btn type="submit">Register</x-btn>
</x-form>
```

### Multiple Checkboxes

```blade
<div class="mb-3">
    <label class="form-label">Select your interests:</label>

    <div class="form-check">
        <x-checkbox name="interests[]" value="coding" label="Coding" />
    </div>

    <div class="form-check">
        <x-checkbox name="interests[]" value="design" label="Design" />
    </div>

    <div class="form-check">
        <x-checkbox name="interests[]" value="marketing" label="Marketing" />
    </div>
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
<div class="form-check">
    <x-checkbox name="terms" label="I agree" />
    {{-- Will be checked if old('terms') === '1' --}}
</div>
```

### Custom Error Bag

```blade
<div class="form-check">
    <x-checkbox name="consent" label="I consent" errorBag="customBag" />
</div>
```

## Additional Attributes

All additional attributes are applied to the `<input>` element. You can add classes, data attributes, and any other HTML attributes:

### Example with Required Checkbox

```blade
<div class="form-check">
    <x-checkbox
        name="terms"
        label="I agree to the terms and conditions <em>(required)</em>"
        required
    />
</div>
```

Renders:
```html
<div class="form-check">
    <input
        name="terms"
        type="checkbox"
        id="terms"
        value="1"
        required
        class="form-check-input"
    />
    <label class="form-check-label" for="terms">
        I agree to the terms and conditions <em>(required)</em>
    </label>
</div>
```

### Example with Data Attributes

```blade
<div class="form-check">
    <x-checkbox
        name="featured"
        label="Featured"
        data-category="settings"
        data-toggle="tooltip"
        disabled
    />
</div>
```

Renders:
```html
<div class="form-check">
    <input
        name="featured"
        type="checkbox"
        id="featured"
        value="1"
        disabled
        data-category="settings"
        data-toggle="tooltip"
        class="form-check-input"
    />
    <label class="form-check-label" for="featured">Featured</label>
</div>
```

### Adding Custom Classes to the Wrapper

Since the component doesn't generate the wrapper, you have full control over the wrapper styling:

```blade
<div class="form-check mb-4 custom-class">
    <x-checkbox
        name="option"
        label="My Option"
    />
</div>
```

## Checked State Logic

The component determines the checked state in this order:

1. **Old value** (from previous form submission): If `old('name')` exists and equals the checkbox value
2. **Explicit checked parameter**: If provided via the `:checked` attribute
3. **Default**: Unchecked

This ensures proper behavior with Laravel's validation and form repopulation.

## Bootstrap Differences

The component automatically applies the correct CSS classes to the `<input>` and `<label>` elements based on your configured Bootstrap version. However, **you must provide the wrapper structure yourself**.

### Bootstrap 5

You need to wrap the component in a `form-check` div:

```blade
<div class="form-check">
    <x-checkbox name="example" label="Example" />
</div>
```

Renders:
```html
<div class="form-check">
    <input class="form-check-input" type="checkbox" id="example" name="example" value="1" />
    <label class="form-check-label" for="example">Example</label>
</div>
```

### Bootstrap 4

You need to wrap the component in a `custom-control custom-checkbox` div:

```blade
<div class="custom-control custom-checkbox">
    <x-checkbox name="example" label="Example" />
</div>
```

Renders:
```html
<div class="custom-control custom-checkbox">
    <input class="custom-control-input" type="checkbox" id="example" name="example" value="1" />
    <label class="custom-control-label" for="example">Example</label>
</div>
```

## Accessibility

- The checkbox is automatically associated with its label via the `for` and `id` attributes
- When validation errors exist, `aria-describedby` is added to link to the error message
- The label parameter is required to ensure all checkboxes have descriptive labels

## Validation

The component integrates with Laravel's validation system:

- Automatically applies `is-invalid` class when validation errors exist
- Preserves checked state via `old()` after validation failure
- Works with the `<x-error>` component to display validation messages

**Important:** Place the `<x-error>` component inside the same wrapper div for proper Bootstrap styling:

```blade
<div class="form-check">
    <x-checkbox name="agree" label="I agree to the terms" />
    <x-error field="agree" />
</div>
```

*For more information about HTML checkbox input attributes and behavior, see the reference below.*

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/checkbox)
