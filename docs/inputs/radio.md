# Radio

The Radio component provides a styled radio button input with automatic label association, validation error handling, and old value persistence.

**Important:** The component renders only the `<input>` and `<label>` elements. You must wrap it in the appropriate Bootstrap structure (`form-check` for Bootstrap 5, or `custom-control custom-radio` for Bootstrap 4) for proper styling.

## Basic Usage

**Bootstrap 5:**
```blade
<div class="form-check">
    <x-radio name="size" value="small" label="Small" />
</div>
<div class="form-check">
    <x-radio name="size" value="medium" label="Medium" />
</div>
<div class="form-check">
    <x-radio name="size" value="large" label="Large" />
</div>
```

**Bootstrap 4:**
```blade
<div class="custom-control custom-radio">
    <x-radio name="size" value="small" label="Small" />
</div>
<div class="custom-control custom-radio">
    <x-radio name="size" value="medium" label="Medium" />
</div>
<div class="custom-control custom-radio">
    <x-radio name="size" value="large" label="Large" />
</div>
```

## Attributes

### Required Attributes

- **name** (string): The input name attribute (same for all radios in a group)
- **value** (string): The radio button value (unique for each option)
- **label** (string): The radio button label text (supports HTML)

### Optional Attributes

- **checked** (mixed): The value that should be checked, or `true` to check this radio (default: `null`)
- **id** (string|null): The input ID attribute (default: auto-generated as `{name}-{value}`)
- **errorBag** (string|null): The error bag to use for validation errors (default: `null`)

## Examples

### Basic Radio Group

```blade
<div class="mb-3">
    <label class="form-label">Choose your size:</label>

    <div class="form-check">
        <x-radio name="size" value="small" label="Small" />
    </div>

    <div class="form-check">
        <x-radio name="size" value="medium" label="Medium" />
    </div>

    <div class="form-check">
        <x-radio name="size" value="large" label="Large" />
    </div>
</div>
```

### Pre-selected Option

```blade
<div class="form-check">
    <x-radio name="size" value="small" label="Small" />
</div>

<div class="form-check">
    <x-radio name="size" value="medium" label="Medium" checked="medium" />
</div>

<div class="form-check">
    <x-radio name="size" value="large" label="Large" />
</div>
```

Or using boolean for a single radio:

```blade
<div class="form-check">
    <x-radio name="size" value="medium" label="Medium" :checked="true" />
</div>
```

### With Custom IDs

```blade
<div class="form-check">
    <x-radio name="color" value="red" label="Red" id="color-red" />
</div>

<div class="form-check">
    <x-radio name="color" value="blue" label="Blue" id="color-blue" />
</div>
```

### With HTML Labels

```blade
<div class="form-check">
    <x-radio
        name="terms"
        value="accept"
        label="I accept the <a href='/terms'>terms and conditions</a>"
    />
</div>

<div class="form-check">
    <x-radio
        name="terms"
        value="decline"
        label="I <strong>decline</strong> the terms"
    />
</div>
```

### With Validation Errors

When validation errors exist for the radio group, all radios will display with Bootstrap's invalid state. **Important:** The error component must be placed after the radio group:

```blade
<div class="mb-3">
    <label class="form-label">Select your gender:</label>

    <div class="form-check">
        <x-radio name="gender" value="male" label="Male" />
    </div>

    <div class="form-check">
        <x-radio name="gender" value="female" label="Female" />
    </div>

    <div class="form-check">
        <x-radio name="gender" value="other" label="Other" />
    </div>

    <x-error field="gender" />
</div>
```

### In a Form

```blade
<x-form action="/profile/update" method="POST">
    <div class="mb-3">
        <x-label for="name">Name</x-label>
        <x-text name="name" id="name" />
        <x-error field="name" />
    </div>

    <div class="mb-3">
        <label class="form-label">Gender</label>

        <div class="form-check">
            <x-radio name="gender" value="male" label="Male" />
        </div>

        <div class="form-check">
            <x-radio name="gender" value="female" label="Female" />
        </div>

        <div class="form-check">
            <x-radio name="gender" value="other" label="Other" />
        </div>

        <x-error field="gender" />
    </div>

    <div class="mb-3">
        <label class="form-label">Notification Preference</label>

        <div class="form-check">
            <x-radio name="notifications" value="email" label="Email only" />
        </div>

        <div class="form-check">
            <x-radio name="notifications" value="sms" label="SMS only" />
        </div>

        <div class="form-check">
            <x-radio name="notifications" value="both" label="Both Email and SMS" />
        </div>

        <x-error field="notifications" />
    </div>

    <x-btn type="submit">Save Profile</x-btn>
</x-form>
```

### Inline Radio Buttons

```blade
<div class="mb-3">
    <label class="form-label">Rate this product:</label>
    <div class="d-flex gap-3">
        <div class="form-check">
            <x-radio name="rating" value="1" label="1 star" />
        </div>

        <div class="form-check">
            <x-radio name="rating" value="2" label="2 stars" />
        </div>

        <div class="form-check">
            <x-radio name="rating" value="3" label="3 stars" />
        </div>

        <div class="form-check">
            <x-radio name="rating" value="4" label="4 stars" />
        </div>

        <div class="form-check">
            <x-radio name="rating" value="5" label="5 stars" />
        </div>
    </div>
</div>
```

### With Old Value Persistence

The radio automatically restores its checked state from `old()` after validation fails:

```php
// Controller
public function update(Request $request)
{
    $request->validate([
        'gender' => 'required|in:male,female,other',
    ]);

    // If validation fails, the selected radio is preserved
}
```

```blade
<div class="form-check">
    <x-radio name="gender" value="male" label="Male" />
</div>
<div class="form-check">
    <x-radio name="gender" value="female" label="Female" />
</div>
{{-- Will be checked if old('gender') === 'female' --}}
```

### Custom Error Bag

```blade
<div class="form-check">
    <x-radio name="status" value="active" label="Active" errorBag="customBag" />
</div>
<div class="form-check">
    <x-radio name="status" value="inactive" label="Inactive" errorBag="customBag" />
</div>
```

## Additional Attributes

All additional attributes are applied to the `<input>` element. You can add classes, data attributes, and any other HTML attributes:

### Example with Required Radio

```blade
<div class="form-check">
    <x-radio
        name="terms"
        value="accept"
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
        type="radio"
        id="terms-accept"
        value="accept"
        required
        class="form-check-input"
    />
    <label class="form-check-label" for="terms-accept">
        I agree to the terms and conditions <em>(required)</em>
    </label>
</div>
```

### Example with Data Attributes

```blade
<div class="form-check">
    <x-radio
        name="category"
        value="tech"
        label="Technology"
        data-category="tech"
        data-toggle="tooltip"
        title="Technology related items"
        disabled
    />
</div>
```

Renders:
```html
<div class="form-check">
    <input
        name="category"
        type="radio"
        id="category-tech"
        value="tech"
        disabled
        data-category="tech"
        data-toggle="tooltip"
        title="Technology related items"
        class="form-check-input"
    />
    <label class="form-check-label" for="category-tech">Technology</label>
</div>
```

### Adding Custom Classes to the Wrapper

Since the component doesn't generate the wrapper, you have full control over the wrapper styling:

```blade
<div class="form-check mb-3 border p-2">
    <x-radio
        name="plan"
        value="premium"
        label="Premium Plan - $99/month"
    />
</div>
```

## Checked State Logic

The component determines the checked state in this order:

1. **Old value** (from previous form submission): If `old('name')` exists and equals the radio value
2. **Explicit checked parameter**: If provided via the `:checked` attribute
   - If boolean `true`, the radio is checked
   - If it matches the radio's value, the radio is checked
3. **Default**: Unchecked

This ensures proper behavior with Laravel's validation and form repopulation.

## Bootstrap Differences

The component automatically applies the correct CSS classes to the `<input>` and `<label>` elements based on your configured Bootstrap version. However, **you must provide the wrapper structure yourself**.

### Bootstrap 5

You need to wrap each radio in a `form-check` div:

```blade
<div class="form-check">
    <x-radio name="option" value="yes" label="Yes" />
</div>
```

Renders:
```html
<div class="form-check">
    <input class="form-check-input" type="radio" id="option-yes" name="option" value="yes" />
    <label class="form-check-label" for="option-yes">Yes</label>
</div>
```

### Bootstrap 4

You need to wrap each radio in a `custom-control custom-radio` div:

```blade
<div class="custom-control custom-radio">
    <x-radio name="option" value="yes" label="Yes" />
</div>
```

Renders:
```html
<div class="custom-control custom-radio">
    <input class="custom-control-input" type="radio" id="option-yes" name="option" value="yes" />
    <label class="custom-control-label" for="option-yes">Yes</label>
</div>
```

## Accessibility

- The radio is automatically associated with its label via the `for` and `id` attributes
- When validation errors exist, `aria-describedby` is added to link to the error message
- The label parameter is required to ensure all radio buttons have descriptive labels
- Each radio in a group automatically gets a unique ID (based on `name-value`)

## Validation

The component integrates with Laravel's validation system:

- Automatically applies `is-invalid` class to all radios in a group when validation errors exist
- Preserves checked state via `old()` after validation failure
- Works with the `<x-error>` component to display validation messages

**Important:** Place the `<x-error>` component after the entire radio group:

```blade
<div class="mb-3">
    <label class="form-label">Select an option:</label>

    <div class="form-check">
        <x-radio name="option" value="a" label="Option A" />
    </div>

    <div class="form-check">
        <x-radio name="option" value="b" label="Option B" />
    </div>

    <x-error field="option" />
</div>
```

## Key Differences from Checkbox

- **Type:** `radio` instead of `checkbox`
- **Group behavior:** Multiple radios share the same `name` but have different `value` attributes
- **Selection:** Only one radio can be selected per group
- **ID generation:** Automatically generates unique IDs as `{name}-{value}` to avoid conflicts
- **Checked logic:** Compares the `value` attribute against the checked parameter or old value

*For more information about HTML radio input attributes and behavior, see the reference below.*

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/radio)
