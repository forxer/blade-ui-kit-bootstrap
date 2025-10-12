# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel package that provides Blade components styled with Bootstrap (4 and/or 5). It offers pre-built UI components like forms, inputs, buttons, and modals with Bootstrap styling. The package was originally inspired by Blade UI Kit but has been decoupled to simplify the codebase.

**Package name:** `forxer/blade-ui-kit-bootstrap`
**PHP version:** ^8.4
**Laravel version:** ^12.0
**Main namespace:** `BladeUIKitBootstrap`

## Development Commands

### Code Quality

```bash
# Format code using Laravel Pint
vendor/bin/pint

# Run Rector for automated refactoring
vendor/bin/rector process
```

### Component Generation

```bash
# Generate a custom component that extends a default component
php artisan make:blade-ui-kit-bs-component ComponentName --extends=component-alias

# Examples:
php artisan make:blade-ui-kit-bs-component CustomSaveButton --extends=btn-save
php artisan make:blade-ui-kit-bs-component DangerModal --extends=modal
php artisan make:blade-ui-kit-bs-component PhoneInput --extends=text

# Force overwrite existing component
php artisan make:blade-ui-kit-bs-component ComponentName --extends=component-alias --force

# The command will:
# 1. Create app/View/Components/[ParentStructure]/ComponentName.php
#    (respects parent component directory structure)
# 2. Optionally create resources/views/components/[parent-structure]/component-name.blade.php (asks user, defaults to no)
# 3. Show instructions for registering the component in config/blade-ui-kit-bootstrap.php
#    with both merge() and replace() options

# Directory Structure Examples:
# - Extending btn-save creates: app/View/Components/Buttons/Actions/ComponentName.php
# - Extending modal creates: app/View/Components/Modals/ComponentName.php
# - Extending text creates: app/View/Components/Forms/Inputs/ComponentName.php

# Registration is done in config/blade-ui-kit-bootstrap.php using:
# - merge() to add as a new component alongside the default
# - replace() to override the default component completely
```

### Publishing Assets (for testing)

```bash
# Publish configuration
php artisan vendor:publish --tag="blade-ui-kit-bootstrap-config"

# Publish views
php artisan vendor:publish --tag="blade-ui-kit-bootstrap-views"

# Publish translations
php artisan vendor:publish --tag="blade-ui-kit-bootstrap-translations"
```

## Architecture

### Component System

The package uses a dual-view approach to support both Bootstrap 4 and 5:

- **View directories:** `resources/views/bootstrap-4/` and `resources/views/bootstrap-5/`
- **Version selection:** Configured via `config/blade-ui-kit-bootstrap.php` using `BootstrapVersion` enum
- **Base component:** All components extend `BladeUIKitBootstrap\Components\BladeComponent`

The `BladeComponent` base class automatically resolves the correct view path based on the configured Bootstrap version. The `viewPath()` method prepends the Bootstrap version directory to all component views.

### Component Registration

Components are registered through the `DefaultComponents` class (src/DefaultComponents.php) which provides a fluent API for:
- Disabling components with `except()`
- Replacing component classes with `replace()`
- Replacing component aliases with `replaceAlias()`
- Merging custom components with `merge()`

The `ServiceProvider` loads components from the configuration array during boot.

**Custom component registration**: Instead of registering components in a ServiceProvider using `Blade::component()`, use the package configuration file (`config/blade-ui-kit-bootstrap.php`) with the fluent API:

```php
'components' => ServiceProvider::defaultComponents()
    ->merge([
        'custom-alias' => \App\View\Components\CustomComponent::class,
    ])
    ->replace([
        'btn-save' => \App\View\Components\Buttons\Actions\CustomSave::class,
    ])
    ->components(),
```

### Key Traits

Located in `src/Concerns/`:

- **BtnType:** Validates button types (button, submit, reset)
- **BtnVariant:** Handles Bootstrap button color variants (primary, secondary, success, etc.)
- **BtnSize:** Manages button sizes (sm, lg)
- **BtnIcons:** Manages icon formatting for buttons (start/end icons)
- **CanHaveErrors:** Integrates with Laravel's validation error bags
- **FormMethod:** Handles HTTP method spoofing for forms (PUT, PATCH, DELETE)
- **ModalVariant:** Manages modal color variants

### Artisan Commands

The package provides Artisan commands registered in `src/Commands/`:

- **MakeComponent** (`make:blade-ui-kit-bs-component`): Generates custom component classes that extend default components
  - Uses stubs from `stubs/component.stub` and `stubs/component.view.stub`
  - Registered in `ServiceProvider::configureCommands()`
  - Provides interactive component selection with full list of available components
  - Generates both PHP class and optional Blade view file
  - **Automatically preserves parent component directory structure**: extracts the path after `BladeUIKitBootstrap\Components\` from parent class and recreates it in `App\View\Components\`
  - Example: extending `BladeUIKitBootstrap\Components\Buttons\Actions\Save` creates `App\View\Components\Buttons\Actions\CustomSaveButton.php`

### Component Categories

1. **Buttons** (`src/Components/Buttons/`)
   - Simple, form, and link buttons
   - Pre-configured action buttons (Save, Delete, Edit, Create, Cancel, etc.)
   - Help/info buttons

2. **Forms** (`src/Components/Forms/`)
   - Form wrapper with CSRF protection and method spoofing
   - Label with automatic translation support
   - Error display with validation integration

3. **Inputs** (`src/Components/Forms/Inputs/`)
   - Text, email, password, date, time, textarea, select, hidden
   - Automatic validation state (`is-invalid` class)
   - Old value persistence

4. **Modals** (`src/Components/Modals/`)
   - Classic modal
   - Form modal (with CSRF and method spoofing)
   - Confirm modal (yes/no actions)

### Configuration

The config file (`config/blade-ui-kit-bootstrap.php`) supports:

- Component registration customization
- Bootstrap version selection (V4 or V5)
- Component prefix (to avoid naming conflicts)
- Global form behavior (`all_forms_with_novalidate`)
- Global button styling (`all_buttons_outline`)
- Global modal styling (`all_modal_outline`)
- Button icon formats (for Bootstrap Icons, FontAwesome, etc.)

### Bootstrap Version Switching

- **Default:** Bootstrap 5 (set in config)
- **Per-route switching:** Use the `BladeUiKitBootstrap4` middleware to switch to Bootstrap 4 for specific routes
- **Implementation:** The middleware sets the config value dynamically per request

### Blade Stacks

Components use Laravel's Blade stacks for additional assets:
- `blade-ui-kit-bs-styles` - Additional CSS
- `blade-ui-kit-bs-html` - Additional HTML (e.g., modal markup)
- `blade-ui-kit-bs-scripts` - JavaScript

## Code Style

### Rector Configuration

The project uses Rector (rector.php) with:
- PHP 8.2 target
- Laravel-specific refactoring rules
- Strict type declarations enabled
- Code quality and early return patterns
- FirstClassCallableRector is disabled (preserves `array_map('intval', ...)` syntax)

### Pint Configuration

Uses Laravel preset (pint.json) with custom rules:
- Native function invocation for compiler optimized functions
- Blank lines before control structures
- Named class braces required, anonymous class braces disabled

## Localization

- Translation files in `lang/en/` and `lang/fr/`
- Currently only modal translations provided
- Integrates with `forxer/generic-term-translations-for-laravel` for generic terms
- Uses Laravel Lang Publisher for managing translations

## Important Patterns

### Adding New Components

1. Create PHP class in appropriate `src/Components/` subdirectory
2. Extend `BladeComponent` and implement `viewName()` method
3. Create matching views in both `resources/views/bootstrap-4/` and `resources/views/bootstrap-5/`
4. Register component alias in `DefaultComponents::__construct()`
5. Add documentation in `docs/` directory

### Component View Resolution

Components should implement `viewName()` to return just the component name (e.g., `'components.buttons.simple-button'`). The base class automatically prepends the Bootstrap version prefix via `viewPath()`.

### Error Handling

Components that display form inputs should use the `CanHaveErrors` trait to integrate with Laravel's validation. This trait:
- Accesses the shared ViewErrorBag
- Supports custom error bags
- Provides `hasErrors()` and `messages()` methods
- Automatically applies Bootstrap's `is-invalid` class

### Button Icon Configuration

To support different icon libraries (Bootstrap Icons, FontAwesome), use sprintf-compatible format strings in config:
- `btn_start_icon_format`: Icon before button text
- `btn_end_icon_format`: Icon after button text

Example: `'<i class="bi bi-%s"></i>'` for Bootstrap Icons

## Known Issues and Corrections

### Configuration Key Name (CORRECTED)

**Important:** The configuration key for Bootstrap version is `bootstrap_version` (with two 'o's), not `boostrap_version`.

This typo was present throughout the codebase and has been corrected in:
- `config/blade-ui-kit-bootstrap.php` - Configuration file
- `src/Http/Middleware/BladeUiKitBootstrap4.php` - Middleware for version switching
- `src/Components/BladeComponent.php` - Base component view resolution
- `src/Concerns/BtnVariant.php` - Button variant validation

When accessing this configuration, always use:
```php
$this->config('bootstrap_version')  // CORRECT
```

Not:
```php
$this->config('boostrap_version')   // INCORRECT (typo)
```

### Common Pitfalls to Avoid

1. **Typos in "Bootstrap":** The word "Bootstrap" has two 'o's and two 't's. Watch for common typos like "boostrap" or "botstrap".

2. **Unused Imports:** The package is decoupled from `blade-ui-kit/blade-ui-kit` and should not import classes from the `BladeUIKit` namespace. All component classes should extend `BladeUIKitBootstrap\Components\BladeComponent`.

3. **Documentation Typos:** Common words like "middleware" should be spelled correctly in documentation files.

4. **Bootstrap Version Configuration:** When adding features that differ between Bootstrap 4 and 5, always check the version using `$this->config('bootstrap_version')` and ensure both versions are supported.
