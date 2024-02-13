
Buttons
=======

A set of button components. There are basic components and components that extend them.

- [Simple button](#simple-button)
- [Button specific attributes](#button-specific-attributes)
- [Form button](./form-button.md)
- [Link button](./link-button.md)
- [Action Buttons](./action-buttons.md)

Simple button
-------------

```blade
<x-btn>
    Do something
</x-btn>
```

This will output the following HTML:

```html
<button type="button" class="btn btn-primary">
    Do something
</button>
```

Example using button specific attributes (see below):

```blade
<x-btn type="reset"
    :text="trans('action.cancel')"
    title="Reset this form"
    variant="secondary" />
```

This will output the following HTML:

```html
<button type="reset" class="btn btn-secondary" title="Reset this form" data-bs-toggle="tooltip">
    Cancel
</button>
```

Button specific attributes
--------------------------

### Text

You can write the content of the button in two different ways: either using the "text" attribute or in the "slot".

```blade
<x-btn :text="trans('my_button_text')" />
```

Or in plain text:

```blade
<x-btn text="Do something" />
```

**Warning:** it's up to YOU to escape the value if you pass untrusted data:

```blade
<x-btn :text="e($data)" />
```

For more customization you can use the slot:

```blade
<x-btn>
    <span>Do something</span>
</x-btn>
```

### Variant

Buttons have a default Bootstrap variant (`primary`), but you can change it with the `variant` attribute.

Possible values are the variants provided by Bootstrap: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`, `link`.

```blade
<x-btn variant="success" />
```

```html
<button type="button" class="btn btn-success">
    ...
</button>
```

### Title

You can add a `title` which will appear in a tooltip.

```blade
<x-btn :title="trans('my_button_title')" />
```

Or alternatively for a plain text string:

```blade
<x-btn title="My button title" />
```

**Warning:** it's up to YOU to escape the value if you pass untrusted data:

```blade
<x-btn :title="e($data)" />
```

## Disabled

You can disable a button by passing a boolean value to the `disabled` attribute.

```blade
<x-btn :disabled="$booleanCondition" />
```

### Confirm

You can add the `confirm` attribute with the message you want to display in the confirmation modal.

```blade
<x-btn :confirm="trans('confirmation_message')" />
```

Or alternatively for a plain text string:

```blade
<x-btn confirm="Are you sure you want to do this?" />
```

**Warning:** it's up to YOU to escape the value if you pass untrusted data:

```blade
<x-btn :confirm="e($data)" />
```

*Note that this is not available on the "Simple button" component but for the others: [Form button](./form-button.md), [Link button](./link-button.md) and [Action Buttons](./action-buttons.md).*
