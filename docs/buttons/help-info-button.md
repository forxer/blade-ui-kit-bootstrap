Help info button
================

This button is designed to display help information in a Bootstrap popover. It's commonly used to provide contextual help or additional information without cluttering the interface.

Basic usage
-----------

```blade
<x-help-info content="This is helpful information for the user."/>
```

This will output the following HTML:

```html
<button class="btn btn-link" type="button"
    data-bs-trigger="focus"
    data-bs-placement="auto"
    data-bs-html="true"
    data-bs-toggle="popover"
    data-bs-content="This is helpful information for the user.">
    <span class="btn-text">
        Info
    </span>
</button>
```

> **Note:** The default text is translated using `trans('status.info')`. Make sure you have this translation key defined in your language files, or use the `text` attribute to provide custom text.

Help info button attributes
----------------------------

All attributes set on the component are piped through on the button element.

### Content (required)

The `content` attribute defines the text displayed in the popover body. HTML is supported.

```blade
<x-help-info content="<strong>Important:</strong> This field is required."/>
```

### Title (optional)

The `title` attribute adds a title to the popover header.

```blade
<x-help-info
    title="Field Help"
    content="Enter your full name as it appears on official documents."/>
```

This will output:

```html
<button class="btn btn-link" type="button"
    data-bs-trigger="focus"
    data-bs-placement="auto"
    data-bs-html="true"
    data-bs-toggle="popover"
    data-bs-title="Field Help"
    data-bs-content="Enter your full name as it appears on official documents.">
    <span class="btn-text">
        Info
    </span>
</button>
```

Common button attributes
------------------------

This component accepts these [common button attributes](./buttons.md#common-button-attributes):
- [Text](./buttons.md#text) - Customize the button text (default: `trans('status.info')`)
- [Hide text](./buttons.md#hide-text) - Hide the text visually but keep it for screen readers
- [Show or hide](./buttons.md#show-or-hide) - Conditionally render the button
- [Icons](./buttons.md#icons) - Add an icon (supports `icon` and `start-icon`, but not `end-icon`)
- [Variant](./buttons.md#variant) - Button color variant (default: `link`)
- [Outline and no-outline](./buttons.md#outline-and-no-outline) - Outline style
- [Sizes](./buttons.md#sizes) - Button size (`sm`, `lg`)

Examples
--------

### With custom text and icon

```blade
<x-help-info
    text="Help"
    start-icon="<i class='bi bi-question-circle'></i>"
    content="Click here for assistance."/>
```

### With hidden text (icon only)

```blade
<x-help-info
    hide-text
    start-icon="<i class='bi bi-info-circle'></i>"
    content="This is a tooltip with helpful information."/>
```

### With different variant and size

```blade
<x-help-info
    variant="primary"
    size="sm"
    content="Small primary help button."/>
```

### With title and HTML content

```blade
<x-help-info
    title="Password Requirements"
    content="<ul><li>At least 8 characters</li><li>Include uppercase and lowercase</li><li>Include numbers</li></ul>"/>
```

Bootstrap popover configuration
--------------------------------

This component uses Bootstrap's popover component with these default settings:
- `data-bs-trigger="focus"` - The popover shows on focus and hides when clicking outside
- `data-bs-placement="auto"` - Bootstrap automatically determines the best placement
- `data-bs-html="true"` - HTML content is allowed in the popover

You can override these by passing attributes directly:

```blade
<x-help-info
    content="Hover over me!"
    data-bs-trigger="hover"
    data-bs-placement="top"/>
```

> **Important:** Remember to initialize Bootstrap popovers in your JavaScript:
> ```javascript
> const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
> const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
> ```
