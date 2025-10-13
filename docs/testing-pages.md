Testing Pages
==============

This package includes interactive testing pages that showcase all available components with live demonstrations and copy-to-clipboard functionality.

## Accessing Test Pages

The test pages are accessible via the following URL pattern:

```
http://your-app.test/blade-ui-kit-bs/tests
```

Replace `your-app.test` with your actual application domain.

## Available Pages

### Main Index
- **URL**: `/blade-ui-kit-bs/tests`
- **Description**: Landing page with overview and links to all component categories

### Button Components
- **URL**: `/blade-ui-kit-bs/tests/buttons-components`
- **Components**: Simple Button, Form Button, Link Button, Help Info
- **Description**: Core button components with variants, sizes, icons, and states

### Action Buttons
- **URL**: `/blade-ui-kit-bs/tests/buttons-actions`
- **Components**: 23+ pre-configured action buttons
- **Categories**: Navigation, CRUD, Archive, Status, Order, Contact, Modal, and customization examples

### Alerts
- **URL**: `/blade-ui-kit-bs/tests/alerts`
- **Description**: Alert variants, dismissible alerts, alerts with icons, titles, and show/hide controls

### Badges
- **URL**: `/blade-ui-kit-bs/tests/badges`
- **Description**: Badge variants, pill badges, contextual usage, sizes, and common use cases

### Form Basics
- **URL**: `/blade-ui-kit-bs/tests/forms-basics`
- **Description**: Basic forms, HTTP method spoofing (PUT, PATCH, DELETE), file uploads, browser validation

### Form Components
- **URL**: `/blade-ui-kit-bs/tests/forms-components`
- **Description**: Label component, Error component, complete form examples with validation

### Text Inputs
- **URL**: `/blade-ui-kit-bs/tests/inputs-text`
- **Description**: Generic input, text, email, password, and hidden inputs

### Advanced Inputs
- **URL**: `/blade-ui-kit-bs/tests/inputs-advanced`
- **Description**: Date, time, textarea, select, checkbox, validation states, complete form examples

### Modal Types
- **URL**: `/blade-ui-kit-bs/tests/modals-types`
- **Description**: Basic modal, non-dismissible modal, custom footer, form modal, confirm modal

### Modal Variations
- **URL**: `/blade-ui-kit-bs/tests/modals-variations`
- **Description**: Modal sizes, scrollable modals, centered modals, list content examples

## Features

### Interactive Demonstrations
Each component is displayed with a live visual demonstration showing how it renders with Bootstrap 5 styling.

### Syntax Highlighting
Code examples use **Shiki** syntax highlighting with full **Blade** support:
- Blade directives (`@if`, `@foreach`, etc.) are properly highlighted
- Blade components (`<x-...>`) are color-coded
- Theme: **github-dark** for optimal readability

### Copy to Clipboard
Every code example includes a **"Copy"** button:
1. Click **"View Code"** to expand the code block
2. Click **"Copy"** to copy the code to your clipboard
3. Visual feedback: button changes to "Copied!" with a checkmark icon
4. The button automatically resets after 2 seconds

### Table of Contents
Pages with multiple sections include a collapsible table of contents for easy navigation.

### Back to Top
A **"Back to Top"** button appears when scrolling down, allowing quick return to the page header.

## Organization

Test pages are organized by component category:

```
resources/views/tests/
├── layout.blade.php          # Shared layout with navigation
├── index.blade.php            # Main landing page
├── alerts.blade.php           # Alert components
├── badges.blade.php           # Badge components
├── buttons/
│   ├── components.blade.php   # Core button components
│   └── actions.blade.php      # Pre-configured action buttons
├── forms/
│   ├── basics.blade.php       # Form fundamentals
│   └── components.blade.php   # Form helper components
├── inputs/
│   ├── text.blade.php         # Text-based inputs
│   └── advanced.blade.php     # Advanced input types
└── modals/
    ├── types.blade.php        # Modal component types
    └── variations.blade.php   # Modal variations and options
```

## Bootstrap Version

Test pages are configured to use **Bootstrap 5** exclusively. The package itself supports both Bootstrap 4 and 5 for production use (configured via `config/blade-ui-kit-bootstrap.php`).

## Navigation

The test pages include a responsive navigation bar with dropdown menus for easy access to all component categories. The active page is highlighted in the navigation.

## Use Cases

These test pages are useful for:

1. **Component Discovery**: Browse all available components and their options
2. **Visual Reference**: See exactly how components look with Bootstrap styling
3. **Quick Prototyping**: Copy code examples directly into your application
4. **Learning**: Understand component usage through practical examples
5. **Testing**: Verify component behavior during package development

## Development

The test pages use reusable Blade components located in `resources/views/components/tests/`:

- **`demo-with-code.blade.php`**: Displays a demo with collapsible, highlighted code
- **`table-of-contents.blade.php`**: Generates navigation for page sections

## Routes

Test page routes are defined in `routes/web.php` with the prefix `blade-ui-kit-bs/tests` and use the `TestController` located in `src/Http/Controllers/TestController.php`.

## Customization

You can customize the test pages by:

1. Publishing the views: `php artisan vendor:publish --tag="blade-ui-kit-bootstrap-views"`
2. Modifying the published files in your `resources/views/vendor/blade-ui-kit-bootstrap/tests/` directory
3. Adjusting the layout, styling, or examples to match your needs

**Note**: Test pages are intended for development/demonstration purposes and are typically not deployed to production environments.
