Blade UI kit Bootstrap
======================

The primary purpose of this package is to provide Bootstrap styling for [Blade UI Kit](https://blade-ui-kit.com/) form components.

For example a typical form field with Bootstrap 5:

```blade
<div class="mb-3">
    <x-label for="title" />
    <x-input name="title" />
    <x-error field="title" />
</div>
```

Will render the following HTML:

```html
<div class="mb-3">
    <label for="title" class="form-label">
        Title
    </label>
    <input name="title" type="text" id="title" class="form-control" />
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
    - [Automatically](#automatically)
    - [Manually](#manually)
- [Bootstrap version](#bootstrap-version)
- [Forms](#forms)
    - [Form](#form)
    - [Label](#label)
    - [Error](#error)
- [Inputs](#inputs)
    - [Input](#input)
    - [Password](#password)
    - [Email](#email)
    - [Date](#date)
    - [Time](#time)
    - [Hidden](#hidden)
    - [Select](#select)


Installation
------------

**You should familiarize yourself with the [Blade UI Kit](https://blade-ui-kit.com/docs) package at first before using this one.**

Install the package by using Composer:

```
composer require forxer/blade-ui-kit-bootstrap
```

### Automatically

In the usage examples below you are asked to override PHP classes in the Blade UI Kit configuration file for each of the components. It is possible to achieve this automatically via the following command:

```
php artisan blade-ui-kit-bootstrap:install
```

This will publish the two configuration files `/config/blade-ui-kit.php` and `/config/blade-ui-kit-bootstrap.php` and then override the PHP classes for each of the components to replace the classes of the base package.

### Manually

Publish the *Blade UI Kit* configuration file:

```
php artisan vendor:publish --tag=blade-ui-kit-config
```

This will publish a file `/config/blade-ui-kit.php`

You will then need for each of the components to replace the classes of the base package in its configuration file with those of this package.

Then publish configuration file of this package:

```
php artisan vendor:publish --blade-ui-kit-bootstrap-config
```

This will publish a file `/config/blade-ui-kit-bootstrap.php`


Bootstrap version
-----------------

By default the package uses version 5 of Bootstrap. To change the version to Bootstrap 4 for your whole app just change the value in the package configuration file.

But if your application uses both Bootstrap 4 and Bootstrap 5 you should use the route middleware provided by the package. You will need to apply middelware on routes that need to use Bootstrap 4.

To do this, add the route middelware alias to the `app/Http/Kernel.php` file:

```php
    protected $middlewareAliases = [
        //...
        'blade-ui-kit-bootstrap-4' => \BladeUIKitBootstrap\Http\Middleware\BladeUiKitBootstrap4::class,
    ];
```

Then add this middleware to the routes where you want it to be applied, for example:

```php
Route::prefix('admin')
    ->name('admin.')
    ->middleware([
        'auth',
        'blade-ui-kit-bootstrap-4',
    ])
    ->group(__DIR__.'/web/admin.php');
```

Forms
-----

### Form

<details>
<summary>If you did not use automatic installation</summary>

In the file `/config/blade-ui-kit.php` you must replace:

```php
    'form' => Components\Forms\Form::class,
```

By:

```php
    'form' => BladeUIKitBootstrap\Components\Forms\Form::class,
```
</details>

You can use the component as you would from [Blade UI Kit Form component](https://blade-ui-kit.com/docs/form).

The only difference is that the "novalidate" attribute is set by default in order to avoid browser validation and to use consistent error styles on all types of form fields.

If you do not want to use this attribute:

```blade
<x-form action="http://example.com" :novalidate="false">
    Form fields...
</x-form>
```

[Back to index ^](#index)

### Label

<details>
<summary>If you did not use automatic installation</summary>

In the file `/config/blade-ui-kit.php` you must replace:

```php
    'input' => Components\Forms\Error::class,
```

By:

```php
    'error' => BladeUIKitBootstrap\Components\Forms\Error::class,
```
</details>

You can use the component as you would from [Blade UI Kit Label component](https://blade-ui-kit.com/docs/label):

```blade
    <x-label for="search" />
```

Or composing the content:

```blade
<x-label for="search">
    {!! trans('search') !!}
</x-label>
```

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/label)

[Back to index ^](#index)

### Error

<details>
<summary>If you did not use automatic installation</summary>

In the file `/config/blade-ui-kit.php` you must replace:

```php
    'input' => Components\Forms\Error::class,
```

By:

```php
    'error' => BladeUIKitBootstrap\Components\Forms\Error::class,
```
</details>

You can use the component as you would from [Blade UI Kit Error component](https://blade-ui-kit.com/docs/error).

```blade
    <x-error name="search />
```

[Back to index ^](#index)


Inputs
------

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

```blade
    <x-input name="search />
```

The default type attribute is "text" but of course you can change it.

There are "helper" components (see below) to simplify things: [Password](#password), [Email](#email), [Hidden](#hidden), etc.

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input)

[Back to index ^](#index)

### Password

<details>
<summary>If you did not use automatic installation</summary>

In the file `/config/blade-ui-kit.php` you must replace:

```php
    'password' => Components\Forms\Inputs\Password::class,
```

By:

```php
    'password' => BladeUIKitBootstrap\Components\Forms\Inputs\Password::class,
```
</details>

You can use the component as you would from [Blade UI Kit Password component](https://blade-ui-kit.com/docs/password):

```blade
    <x-password />
```

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/password)

[Back to index ^](#index)

### Email

<details>
<summary>If you did not use automatic installation</summary>

In the file `/config/blade-ui-kit.php` you must replace:

```php
    'email' => Components\Forms\Inputs\Email::class,
```

By:

```php
    'email' => BladeUIKitBootstrap\Components\Forms\Inputs\Email::class,
```
</details>

You can use the component as you would from [Blade UI Kit Email component](https://blade-ui-kit.com/docs/email):

```blade
    <x-email />
```

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/email)

[Back to index ^](#index)

### Date

This component is only present in this package, it is not available in blade-ui-kit.

You can use this component in the same way as the "input text" or "input email" components, for example.

```blade
    <x-date />
```

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/date)

[Back to index ^](#index)

### Time

This component is only present in this package, it is not available in blade-ui-kit.

You can use this component in the same way as the "input text" or "input email" components, for example.

```blade
    <x-time />
```

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/time)

[Back to index ^](#index)

### Hidden

This component is only present in this package, it is not available in blade-ui-kit.

You can use this component in the same way as the "input text" or "input email" components, for example.

```blade
    <x-hidden />
```

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/hidden)

[Back to index ^](#index)

### Textarea

<details>
<summary>If you did not use automatic installation</summary>

In the file `/config/blade-ui-kit.php` you must replace:

```php
    'textarea' => Components\Forms\Inputs\Textarea::class,
```

By:

```php
    'textarea' => BladeUIKitBootstrap\Components\Forms\Inputs\Textarea::class,
```
</details>

You can use the component as you would from [Blade UI Kit Textarea component](https://blade-ui-kit.com/docs/textarea):

```blade
    <x-textarea name="about" />
```

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea)

[Back to index ^](#index)

### Select

This component is only present in this package, it is not available in blade-ui-kit.

```blade
    <x-select name="country" :options="$counties" :selected="$user->country" />
```

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select)

[Back to index ^](#index)