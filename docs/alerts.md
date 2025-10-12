Alerts
======

Alert components provide contextual feedback messages for typical user actions. They are flexible, dismissible, and support all Bootstrap color variants.

## Available Components

### [Alert](./alerts/alert.md)

The main alert component for displaying informational messages with various styles and options.

**Features:**
- All Bootstrap variants (primary, secondary, success, danger, warning, info, light, dark)
- Dismissible alerts with close button
- Outline style support
- Conditional rendering (show/hide)
- Global configuration for outline style

**Basic usage:**

```blade
<x-alert variant="success">
    Operation completed successfully!
</x-alert>

<x-alert variant="danger" dismissible>
    An error occurred. Please try again.
</x-alert>
```

## Common use cases

### Flash messages

```blade
@if (session('success'))
    <x-alert variant="success" dismissible>
        {{ session('success') }}
    </x-alert>
@endif

@if (session('error'))
    <x-alert variant="danger" dismissible>
        {{ session('error') }}
    </x-alert>
@endif
```

### Validation errors

```blade
@if ($errors->any())
    <x-alert variant="danger">
        <h4 class="alert-heading">Please fix the following errors:</h4>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-alert>
@endif
```

### Information boxes

```blade
<x-alert variant="info">
    <strong>Heads up!</strong> This alert provides additional context for your users.
</x-alert>
```

## Configuration

You can configure the default behavior of alerts in `config/blade-ui-kit-bootstrap.php`:

```php
return [
    // Make all alerts use outline style by default
    'all_alerts_outline' => false,
];
```

See the [Alert component documentation](./alerts/alert.md) for detailed usage and examples.
