---
title: Blade UI Kit Bootstrap
order: 0
---

Blade UI Kit Bootstrap
======================

This package provides several Blade components prepared for use with Bootstrap (4 and/or 5).

Features
--------

- **Many pre-built components** ready to use with Bootstrap 4 and 5
- **Automatic validation error handling** with Bootstrap's `is-invalid` class
- **Old value persistence** for form inputs after validation
- **Dual Bootstrap support** - Switch between Bootstrap 4 and 5 with a single configuration
- **Extensible** - Easy to create custom components extending the defaults
- **Interactive test pages** - Browse all components with live examples and code snippets
- **Translation support** - Works seamlessly with Laravel's localization
- **Action buttons** - Pre-configured buttons for common CRUD operations

Requirements
------------

- PHP 8.4+
- Laravel 12+

Quick start
-----------

```bash
composer require forxer/blade-ui-kit-bootstrap
```

```blade
<x-form action="http://example.com">
    <div class="mb-3">
        <x-label for="title" />
        <x-input name="title" />
        <x-error field="title" />
    </div>
    <x-btn-save />
</x-form>
```

Documentation
-------------

- [Installation](./installation.md)
- [Configuration](./configuration.md)
- [Bootstrap version](./bootstrap-version.md)
- [Extending Components](./extending-components.md)
- [Testing Pages](./testing-pages.md)
- [Forms](./forms.md)
- [Alerts](./alerts.md)
- [Badges](./badges.md)
- [Buttons](./buttons/)
- [Inputs](./inputs/)
- [Modals](./modals.md)
