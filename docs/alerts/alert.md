Alert
=====

The alert component provides contextual feedback messages for typical user actions with a handful of available and flexible alert messages.

Basic usage
-----------

```blade
<x-alert variant="success">
    This is a success alert—check it out!
</x-alert>
```

This will output the following HTML:

```html
<div class="alert alert-success" role="alert">
    This is a success alert—check it out!
</div>
```

Alert attributes
----------------

### Variant

The `variant` attribute defines the color and style of the alert. All Bootstrap alert variants are supported.

**Available variants:**
- `primary`
- `secondary`
- `success`
- `danger`
- `warning`
- `info`
- `light`
- `dark`

```blade
<x-alert variant="danger">
    A simple danger alert—check it out!
</x-alert>
```

### Dismissible

Set the `dismissible` attribute to `true` to allow users to close the alert.

```blade
<x-alert variant="warning" dismissible>
    This alert can be closed by clicking the X button.
</x-alert>
```

This will output:

```html
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    This alert can be closed by clicking the X button.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
```

> **Note for Bootstrap 4:** The close button uses `<button class="close"><span>&times;</span></button>` instead of `btn-close`.

### Title

Add a title to your alert using the `title` attribute. The title will be displayed as an `<h4 class="alert-heading">`.

```blade
<x-alert variant="success" title="Well done!">
    You successfully completed the task.
</x-alert>
```

This will output:

```html
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    You successfully completed the task.
</div>
```

### Icon

Add an icon to your alert using the `icon` attribute. You must first configure the icon format in your configuration file.

```php
// config/blade-ui-kit-bootstrap.php
'alert_icon_format' => '<i class="bi bi-%s me-2"></i>',
```

Then use the `icon` attribute:

```blade
<x-alert variant="warning" icon="exclamation-triangle" title="Warning">
    Please verify your email address.
</x-alert>
```

This will output:

```html
<div class="alert alert-warning" role="alert">
    <div class="alert-icon">
        <i class="bi bi-exclamation-triangle me-2"></i>
    </div>
    <h4 class="alert-heading">Warning</h4>
    Please verify your email address.
</div>
```

> **Note:** If you try to use the `icon` attribute without configuring `alert_icon_format`, a `LogicException` will be thrown.

### Outline

Use the `outline` attribute to apply an outline style to the alert (lighter background with colored border).

```blade
<x-alert variant="primary" outline>
    This is an outline primary alert.
</x-alert>
```

This will output:

```html
<div class="alert alert-outline-primary" role="alert">
    This is an outline primary alert.
</div>
```

### No outline

If you have enabled `all_alerts_outline` in the configuration, you can disable it for a specific alert using `no-outline`.

```blade
<x-alert variant="info" no-outline>
    This alert will NOT be outlined even if globally configured.
</x-alert>
```

### Show or hide

Control alert visibility with `show` or `hide` attributes.

```blade
{{-- Only show if condition is true --}}
<x-alert variant="success" :show="$order->isPaid()">
    Payment received!
</x-alert>

{{-- Hide if condition is true --}}
<x-alert variant="danger" :hide="$errors->isEmpty()">
    Please fix the errors below.
</x-alert>
```

Examples
--------

### Success message

```blade
<x-alert variant="success" dismissible>
    <strong>Well done!</strong> Your account has been successfully created.
</x-alert>
```

### Error message

```blade
<x-alert variant="danger">
    <h4 class="alert-heading">Error!</h4>
    <p>An error occurred while processing your request.</p>
    <hr>
    <p class="mb-0">Please try again or contact support if the problem persists.</p>
</x-alert>
```

### Information with link

```blade
<x-alert variant="info">
    New features are available! <a href="/changelog" class="alert-link">Read the changelog</a>.
</x-alert>
```

### Outline alerts

```blade
<x-alert variant="success" outline>
    This is a success outline alert.
</x-alert>

<x-alert variant="warning" outline dismissible>
    This is a dismissible warning outline alert.
</x-alert>
```

### Alert with title

```blade
<x-alert variant="info" title="Did you know?">
    You can customize your dashboard layout from the settings page.
</x-alert>
```

### Alert with icon

```blade
{{-- Requires alert_icon_format configuration --}}
<x-alert variant="warning" icon="exclamation-triangle">
    Your session will expire in 5 minutes.
</x-alert>
```

### Alert with title and icon

```blade
<x-alert variant="success"
    title="Payment Successful"
    icon="check-circle"
    dismissible>
    Your payment of $49.99 has been processed successfully.
</x-alert>

<x-alert variant="danger"
    title="Error Occurred"
    icon="x-circle">
    Unable to connect to the server. Please check your internet connection.
</x-alert>
```

### Conditional alerts

```blade
@if (session('status'))
    <x-alert variant="success" dismissible>
        {{ session('status') }}
    </x-alert>
@endif

@if ($errors->any())
    <x-alert variant="danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-alert>
@endif
```

### All variants showcase

```blade
<x-alert variant="primary">A primary alert</x-alert>
<x-alert variant="secondary">A secondary alert</x-alert>
<x-alert variant="success">A success alert</x-alert>
<x-alert variant="danger">A danger alert</x-alert>
<x-alert variant="warning">A warning alert</x-alert>
<x-alert variant="info">An info alert</x-alert>
<x-alert variant="light">A light alert</x-alert>
<x-alert variant="dark">A dark alert</x-alert>
```

Global configuration
--------------------

### Outline style

You can configure all alerts to use the outline style by default in your configuration file:

```php
// config/blade-ui-kit-bootstrap.php
return [
    'all_alerts_outline' => true,
];
```

When this is enabled, all alerts will automatically have the outline style unless you explicitly use `no-outline`.

### Icon format

To use icons in alerts, you must configure the icon format:

```php
// config/blade-ui-kit-bootstrap.php
return [
    // For Bootstrap Icons
    'alert_icon_format' => '<i class="bi bi-%s me-2"></i>',

    // Or for FontAwesome
    'alert_icon_format' => '<i class="fa-solid fa-%s me-2"></i>',
];
```

The `%s` placeholder will be replaced with the icon name you provide to the `icon` attribute.

Additional styling
------------------

All attributes set on the component are piped through to the `<div>` element. You can add custom classes or attributes:

```blade
<x-alert variant="info" class="my-4 shadow-sm" data-custom="value">
    Alert with custom classes and attributes.
</x-alert>
```

This will merge the custom class with the default alert classes:

```html
<div class="alert alert-info my-4 shadow-sm" role="alert" data-custom="value">
    Alert with custom classes and attributes.
</div>
```

Bootstrap JavaScript
--------------------

For dismissible alerts to work, you need to include Bootstrap's JavaScript. The alert component requires the `Alert` plugin.

Make sure you have initialized Bootstrap in your application:

```html
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
```

Or if using npm:

```javascript
import 'bootstrap';
```

The alert will automatically be dismissed when the close button is clicked, thanks to Bootstrap's `data-bs-dismiss="alert"` attribute.
