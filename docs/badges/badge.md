Badge
=====

Badge components are small count and labeling components used to add contextual information to elements.

Basic usage
-----------

```blade
<x-badge variant="primary">New</x-badge>
```

This will output the following HTML (Bootstrap 5):

```html
<span class="badge text-bg-primary">
    New
</span>
```

> **Note for Bootstrap 4:** The classes are `badge badge-primary` instead of `text-bg-primary`.

Badge attributes
----------------

### Variant

The `variant` attribute defines the color of the badge. All Bootstrap badge variants are supported.

**Available variants:**
- `primary` (default)
- `secondary`
- `success`
- `danger`
- `warning`
- `info`
- `light`
- `dark`

```blade
<x-badge variant="success">Active</x-badge>
<x-badge variant="danger">Urgent</x-badge>
<x-badge variant="warning">Pending</x-badge>
```

### Pill

Use the `pill` attribute to make badges more rounded.

```blade
<x-badge variant="primary" pill>14</x-badge>
```

This will output (Bootstrap 5):

```html
<span class="badge text-bg-primary rounded-pill">
    14
</span>
```

> **Note for Bootstrap 4:** The pill class is `badge-pill` instead of `rounded-pill`.

### Show or hide

Control badge visibility with `show` or `hide` attributes.

```blade
{{-- Only show if condition is true --}}
<x-badge variant="danger" :show="$user->hasNotifications()">
    {{ $user->notificationCount() }}
</x-badge>

{{-- Hide if condition is true --}}
<x-badge variant="success" :hide="$task->isCompleted()">
    In Progress
</x-badge>
```

Examples
--------

### Counter badges

```blade
<button class="btn btn-primary">
    Notifications <x-badge variant="light">4</x-badge>
</button>

<button class="btn btn-secondary">
    Messages <x-badge variant="danger" pill>99+</x-badge>
</button>
```

### Status indicators

```blade
<h5>
    Order #12345
    <x-badge variant="success">Paid</x-badge>
</h5>

<h5>
    Order #12346
    <x-badge variant="warning">Pending</x-badge>
</h5>

<h5>
    Order #12347
    <x-badge variant="danger">Cancelled</x-badge>
</h5>
```

### Tags and labels

```blade
<div class="d-flex gap-2">
    <x-badge variant="info" pill>Laravel</x-badge>
    <x-badge variant="info" pill>PHP</x-badge>
    <x-badge variant="info" pill>Bootstrap</x-badge>
</div>
```

### In navigation

```blade
<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Inbox
        <x-badge variant="primary" pill>14</x-badge>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Drafts
        <x-badge variant="secondary" pill>2</x-badge>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Sent
        <x-badge variant="success" pill>128</x-badge>
    </li>
</ul>
```

### With icons

```blade
{{-- With Bootstrap Icons --}}
<x-badge variant="success">
    <i class="bi bi-check-circle"></i> Verified
</x-badge>

<x-badge variant="danger" pill>
    <i class="bi bi-exclamation-triangle"></i> Alert
</x-badge>
```

### As links

You can wrap badges in links by passing custom attributes:

```blade
<a href="/notifications" class="text-decoration-none">
    <x-badge variant="danger">5 new</x-badge>
</a>
```

Or add the link directly to the badge:

```blade
<x-badge variant="primary" class="text-decoration-none" onclick="location.href='/profile'">
    View Profile
</x-badge>
```

### Contextual usage

```blade
{{-- User status --}}
<span class="d-flex align-items-center gap-2">
    <img src="avatar.jpg" class="rounded-circle" width="40">
    John Doe
    <x-badge variant="success" pill>Online</x-badge>
</span>

{{-- Product stock --}}
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            Product Name
            @if ($product->inStock())
                <x-badge variant="success">In Stock</x-badge>
            @else
                <x-badge variant="danger">Out of Stock</x-badge>
            @endif
        </h5>
    </div>
</div>

{{-- Task priority --}}
<div class="task">
    <span class="task-title">Complete documentation</span>
    <x-badge variant="danger">High Priority</x-badge>
</div>
```

### All variants showcase

```blade
<div class="d-flex gap-2">
    <x-badge variant="primary">Primary</x-badge>
    <x-badge variant="secondary">Secondary</x-badge>
    <x-badge variant="success">Success</x-badge>
    <x-badge variant="danger">Danger</x-badge>
    <x-badge variant="warning">Warning</x-badge>
    <x-badge variant="info">Info</x-badge>
    <x-badge variant="light">Light</x-badge>
    <x-badge variant="dark">Dark</x-badge>
</div>
```

### Pill badges showcase

```blade
<div class="d-flex gap-2">
    <x-badge variant="primary" pill>Primary</x-badge>
    <x-badge variant="secondary" pill>Secondary</x-badge>
    <x-badge variant="success" pill>Success</x-badge>
    <x-badge variant="danger" pill>Danger</x-badge>
    <x-badge variant="warning" pill>Warning</x-badge>
    <x-badge variant="info" pill>Info</x-badge>
    <x-badge variant="light" pill>Light</x-badge>
    <x-badge variant="dark" pill>Dark</x-badge>
</div>
```

Additional styling
------------------

All attributes set on the component are piped through to the `<span>` element. You can add custom classes or attributes:

```blade
<x-badge variant="info" class="fs-6 me-2" data-custom="value">
    Custom styled badge
</x-badge>
```

This will merge the custom class with the default badge classes:

```html
<span class="badge text-bg-info fs-6 me-2" data-custom="value">
    Custom styled badge
</span>
```

Bootstrap differences
---------------------

### Bootstrap 5

- Uses `text-bg-{variant}` classes for automatic text color contrast
- Pill badges use `rounded-pill` class
- Better contrast and accessibility

### Bootstrap 4

- Uses `badge-{variant}` classes
- Pill badges use `badge-pill` class
- Manual text color may be needed for some variants

The component automatically uses the correct classes based on your configured Bootstrap version.
