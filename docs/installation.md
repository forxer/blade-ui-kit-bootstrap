---
title: Installation
order: 1
---

Installation
============

Requirements
------------

- PHP 8.4 or higher
- Laravel 12
- [Bootstrap](https://getbootstrap.com/) 4 or 5

Install the package by using Composer:

```bash
composer require forxer/blade-ui-kit-bootstrap
```

Blade Stacks
------------

Some components require additional styles and/or additional HTML and/or additional Javascript. For this we have chosen to use a basic feature of Laravel: [Blade stacks](https://laravel.com/docs/blade#stacks).

So you must add 3 Blade stacks in your templates/views, typically in a layout view :

- `@stack('blade-ui-kit-bs-styles')`
- `@stack('blade-ui-kit-bs-html')`
- `@stack('blade-ui-kit-bs-scripts')`

Place the `@stack('blade-ui-kit-bs-styles')` stack call right before your closing </head> tag and after styles from libraries like Livewire.

Place the `@stack('blade-ui-kit-bs-html')` stack call right before your scripts tags and other libraries like Livewire.

Place the `@stack('blade-ui-kit-bs-scripts')` stack call right before your closing </body> tag and after scripts from libraries like Livewire.

For example like this:

```blade
<!DOCTYPE html>
<html>
<head>
    <!-- ... ->
    <link href="{{ mix('assets/css/app.css') }}" rel="preload" as="style" media='all'>
    @livewireStyles
    @stack('blade-ui-kit-bs-styles')
</head>
<body>
    <main>
        @yield ('content')
    </main>

    @stack('blade-ui-kit-bs-html')

    @livewireScripts
    <script src="{{ mix('assets/js/app.js') }}"></script>
    @stack('blade-ui-kit-bs-scripts')
</body>
</html>
```

### Views delivered as AJAX fragments

The stacks above are rendered by your layout, so they only contain what the initial page render pushed. When a view using components is fetched through AJAX and injected into the page (a modal body loaded on demand, for example), its pushed scripts never reach the layout stack: end the fragment view with the stack call so the scripts travel with the injected HTML.

```blade
{{-- resources/views/some/fragment.blade.php --}}
<div>
    <x-btn-copy :string="$value" />
</div>
@stack('blade-ui-kit-bs-scripts')
```

Most libraries used to inject HTML (jQuery's `html()`, for example) execute the embedded `<script>` tags. The package scripts are written to be idempotent, so loading the same fragment several times does not register duplicate listeners.

Locales
-------

Use the locales publisher of [Laravel Lang](https://laravel-lang.com/) to add/update/reset or remove translations:

- If you have never used [Laravel Lang](https://laravel-lang.com/): [add locales](https://laravel-lang.com/usage-add-locales.html)
- If you are already using [Laravel Lang](https://laravel-lang.com/): just [update the locales](https://laravel-lang.com/usage-update-locales.html)


Publish files
-------------

You don't have to, but you can publish: the configuration file, the views and the translation files.

Publish the configuration file with this command:

```bash
php artisan vendor:publish --tag="blade-ui-kit-bootstrap-config"
```

Publish views with this command:

```bash
php artisan vendor:publish --tag="blade-ui-kit-bootstrap-views"
```

Note that it is not necessary to publish all views in your application. It is even recommended that you only keep published views that you have modified in your application.

Publish translation files with this command:

```bash
php artisan vendor:publish --tag="blade-ui-kit-bootstrap-translations"
```
