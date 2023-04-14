Blade UI kit Bootstrap
======================

The primary purpose of this package is to provide Bootstrap styling for [Blade UI Kit](https://blade-ui-kit.com/) form components.

Currently the Bootstrap classes used are those of version 5.

For example a typical form field with Bootstrap:

```blade
<div class="mb-3">
    <x-label for="title" />
    <x-input name="title" :errors="$errors" />
    <x-error field="title" :errors="$errors" />
</div>
```

Will render the following HTML:

```html
<div class="mb-3">
    <label for="title" class="form-label">
        Title
    </label>
    <input name="title" type="text" id="title" class="form-control"/>
</div>
```

And with a validation error:

```html
<div class="mb-3">
    <label for="title" class="form-label">
        Title
    </label>
    <input name="title" type="text" id="title" class="form-control is-invalid"
        aria-describedby="validation-title-feedback" />
    <div id="validation-title-feedback" class="invalid-feedback">
        The title field is mandatory.
    </div>
</div>
```

Index
-----

- [Installation](#installation)
    - [Manually](#manually)
    - [Automatically](#automatically)
- [Usage](#usage)
    - [Input](#input)
    - [Email](#email)
    - [Password](#password)
    - [Label](#label)
    - [Error](#error)
    - [Form](#form)


Installation
------------

**You should familiarize yourself with the [Blade UI Kit](https://blade-ui-kit.com/docs) package at first before using this one.**

Install the package by using Composer:

```
composer require forxer/blade-ui-kit-bootstrap
```

### Manually

Publish the *Blade UI Kit* configuration file:

```
php artisan vendor:publish --tag=blade-ui-kit-config
```

This will publish a file `/config/blade-ui-kit.php`

You will then need for each of the components to replace the classes of the base package in its configuration file with those of this package.

### Automatically

In the usage examples below you are asked to override PHP classes in the Blade UI Kit configuration file for each of the components. It is possible to achieve this automatically via the following command:

```
php artisan blade-ui-kit-bootstrap:install
```

This will publish the two configuration files and override the PHP classes.

Usage
-----

### Input

Take for example the input form field.

In the file `/config/blade-ui-kit.php` replace the "input" component class:

```php
    'components' => [
        //...
        'input' => Components\Forms\Inputs\Input::class,
        //...
    ],
```

By the class from this package:

```php
    'components' => [
        //...
        'input' => BladeUIKitBootstrap\Components\Forms\Inputs\Input::class,
        //...
    ],
```

This allows to load the component from this package instead of *Blade UI Kit*.

You can then use the component as you would from [Blade UI Kit Input Component](https://blade-ui-kit.com/docs/input) but it will directly have the CSS classes from Bootstrap.

The *only difference* is that if you want to apply [Bootstrap's validation CSS classes](https://getbootstrap.com/docs/5.2/forms/validation/#server-side), **you must** pass errors to the component:

```blade
    <x-input name="search :errors="$errors" />
```

[Back to index ^](#index)

### Email

In the file `/config/blade-ui-kit.php` you must replace:

```php
    'email' => Components\Forms\Inputs\Email::class,
```

By:

```php
    'email' => BladeUIKitBootstrap\Components\Forms\Inputs\Email::class,
```

You can then use the component as you would from [Blade UI Kit Email component](https://blade-ui-kit.com/docs/email) without forgetting to pass the possible errors in more:

```blade
    <x-email :errors="$errors" />
```

[Back to index ^](#index)

### Password

In the file `/config/blade-ui-kit.php` you must replace:

```php
    'password' => Components\Forms\Inputs\Password::class,
```

By:

```php
    'password' => BladeUIKitBootstrap\Components\Forms\Inputs\Password::class,
```

You can then use the component as you would from [Blade UI Kit Password component](https://blade-ui-kit.com/docs/password) without forgetting to pass the possible errors in more:

```blade
    <x-password :errors="$errors" />
```

[Back to index ^](#index)

### Textarea

In the file `/config/blade-ui-kit.php` you must replace:

```php
    'textarea' => Components\Forms\Inputs\Textarea::class,
```

By:

```php
    'textarea' => BladeUIKitBootstrap\Components\Forms\Inputs\Textarea::class,
```

You can then use the component as you would from [Blade UI Kit Textarea component](https://blade-ui-kit.com/docs/textarea) without forgetting to pass the possible errors in more:

```blade
    <x-textarea name="about" :errors="$errors" />
```

[Back to index ^](#index)

### Label

In the file `/config/blade-ui-kit.php` you must replace:

```php
    'input' => Components\Forms\Error::class,
```

By:

```php
    'error' => BladeUIKitBootstrap\Components\Forms\Error::class,
```

You can then use the component as you would from [Blade UI Kit Label component](https://blade-ui-kit.com/docs/label).

```blade
    <x-label for="search" />
```

Or composing the content:

```blade
<x-label for="search">
    {!! trans('search') !!}
</x-label>
```

[Back to index ^](#index)

### Error

In the file `/config/blade-ui-kit.php` you must replace:

```php
    'input' => Components\Forms\Error::class,
```

By:

```php
    'error' => BladeUIKitBootstrap\Components\Forms\Error::class,
```

You can then use the component as you would from [Blade UI Kit Error component](https://blade-ui-kit.com/docs/error) without forgetting to pass the possible errors in more:

```blade
    <x-error name="search :errors="$errors" />
```

[Back to index ^](#index)

### Form

In the file `/config/blade-ui-kit.php` you must replace:

```php
    'form' => Components\Forms\Form::class,
```

By:

```php
    'form' => BladeUIKitBootstrap\Components\Forms\Form::class,
```

You can then use the component as you would from [Blade UI Kit Form component](https://blade-ui-kit.com/docs/form).

The only difference is that the "novalidate" attribute is set by default in order to avoid browser validation and to use consistent error styles on all types of form fields.

If you do not want to use this attribute:

```blade
<x-form action="http://example.com" :novalidate="false">
    Form fields...
</x-form>
```

[Back to index ^](#index)


//    'alert' => Components\Alerts\Alert::class,