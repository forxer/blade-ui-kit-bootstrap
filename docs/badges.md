Badges
======

Badge components are small count and labeling components used to add contextual information to elements. They are perfect for notification counts, status indicators, and tags.

## Available Components

### [Badge](./badges/badge.md)

The main badge component for displaying small labels, counts, and status indicators.

**Features:**
- All Bootstrap variants (primary, secondary, success, danger, warning, info, light, dark)
- Pill style for rounded badges
- Conditional rendering (show/hide)
- Custom attributes and styling support

**Basic usage:**

```blade
<x-badge variant="primary">New</x-badge>

<x-badge variant="danger" pill>99+</x-badge>
```

## Common use cases

### Notification counts

```blade
<button class="btn btn-primary">
    Notifications <x-badge variant="light">4</x-badge>
</button>

<a href="/inbox" class="text-decoration-none">
    Messages <x-badge variant="danger" pill>12</x-badge>
</a>
```

### Status indicators

```blade
<h5>
    Order #12345
    <x-badge variant="success">Paid</x-badge>
</h5>

<div class="user-info">
    John Doe
    <x-badge variant="success" pill>Online</x-badge>
</div>
```

### Tags and labels

```blade
<div class="d-flex gap-2">
    <x-badge variant="info" pill>Laravel</x-badge>
    <x-badge variant="info" pill>PHP</x-badge>
    <x-badge variant="info" pill>Bootstrap</x-badge>
</div>
```

### Navigation with counters

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
</ul>
```

## Bootstrap Differences

### Bootstrap 5

Uses `text-bg-{variant}` classes for automatic text color contrast and `rounded-pill` class for pill badges.

### Bootstrap 4

Uses `badge-{variant}` classes and `badge-pill` class for pill badges.

The component automatically uses the correct classes based on your configured Bootstrap version.

See the [Badge component documentation](./badges/badge.md) for detailed usage and examples.
