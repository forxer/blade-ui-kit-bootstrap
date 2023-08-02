Blade UI kit Bootstrap
======================

This package provides several Blade components prepared for use with Bootstrap (4 and/or 5).

This package was initially an extension of [Blade UI Kit](https://blade-ui-kit.com/) to provide pre-styled components for Bootstrap. But by making it evolve we decided to decouple it from its parent. This simplifies the code as well as its use in our case.

This package is therefore largely inspired by [Blade UI Kit](https://blade-ui-kit.com/). A very large part of the documentation comes from it. And we sincerely thank its contributors for the idea and what they have developed. This package wouldn't exist without it.

Example
-------

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

And if there are validation errors:

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
    - [Blade Stacks](#blade-stacks)
    - [Publish files](#publish-files)
- [Bootstrap version](#bootstrap-version)
- [Buttons](#buttons)
    - [Form Button](#form-button)
    - [Logout](#logout)
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
- [Modals](#modals)
    - [Classic modal](#classic-modal)
    - [Confirm modal](#confirm-modal)

Installation
------------

Install the package by using Composer:

```
composer require forxer/blade-ui-kit-bootstrap
```

### Blade Stacks

Some components require additional styles and/or additional HTML and/or additional javascript. For this we have chosen to use a basic feature of Laravel: [Blade stacks](https://laravel.com/docs/blade#stacks).

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
<html lang="{{ app()->getLocale() }}">
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

### Publish files

You don't have to, but you can publish: the configuration file, the views and the translation files.

Publish the configuration file with this command:

```
php artisan vendor:publish --tag="blade-ui-kit-bootstrap-config"
```

Publish views with this command:

```
php artisan vendor:publish --tag="blade-ui-kit-bootstrap-views"
```

Note that it is not necessary to publish all views in your application. It is even recommended that you only keep published views that you have modified in your application.

Publish translation files with this command:

```
php artisan vendor:publish --tag="blade-ui-kit-bootstrap-translations"
```

[Back to index ^](#index)

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

[Back to index ^](#index)

Buttons
-------

### Form Button

The `form-button` component enables you to perform HTTP requests using any HTTP method you wish. By applying an HTML `form` tag behind the scenes it hides all of the bulk work of setting up the entire form.

Also this component is implemented because Bootstrap buttons can be elements of "button groups". And we don't want the form element to be directly in the "button groups" otherwise it "breaks" the display.

In order to avoid this we use the `form` attribute of the button element which has [good support](https://caniuse.com/form-attribute). This extracts the button from its form. The form itself will be displayed in the `blade-ui-kit-bs-html` stack.

```blade
    <x-form-button :action="route('do-something')" class="btn btn-primary">
        Do something
    </x-form-button>
```

This will output the following HTML:

```html
<button type="submit" form="form-button-toFuKoZ8bPwhijAlV9vIFdPokYkOhTeT" class="btn btn-primary">
    Do something
</button>

<!--... -->

<form id="form-button-toFuKoZ8bPwhijAlV9vIFdPokYkOhTeT" method="POST" action="https://localhost/do-something" >
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="POST">
</form>
```

All attributes set on the component are piped through on the button element.

You can specify a form ID targeted by the button. If you don't specify a form id, as you can see, it will be randomly generated for each request using a random string of characters.

But this is not ideal, it is preferable that you identify yourself the form on which the button acts. It will be easier to navigate and this with better performance.

```blade
    <x-form-button
        :action="route('do-something', $model)"
        :formId="'do-something-'.$model->id"
        class="btn btn-primary"
    >
        Do something
    </x-form-button>
```

This will output the following HTML:

```html
<button type="submit" form="form-button-do-something-1" class="btn btn-primary">
    Do something
</button>

<!--... -->

<form id="form-button-do-something-1" method="POST" action="https://localhost/do-something/1" >
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="POST">
</form>
```

You can set a different HTTP method if you like with the `method` attibute:

```blade
    <x-form-button
        :action="route('do-something', $model)"
        :formId="'do-something-'.$model->id"
        class="btn btn-primary"
        method="PATCH"
    >
        Do something
    </x-form-button>
```

[Back to index ^](#index)

### Logout

The `logout` component is a small convenience component for a widely used concept in an app, the logout link. Often this action sits in a menu item with other hyperlinks. But a logout is meant as an actionable link rather than a `GET` request. Therefor a `POST` request is better suited. And thus it deserves its own component.

Behind the scenes, the `logout` component extends the `form-button` component.

```blade
    <x-logout :action="route('auth.logout')" :formId="'logout-'.auth()->id()" class="btn btn-danger">
        {{ trans('logout') }}
    </x-logout>
```

This will output the following HTML:

```html
<button type="submit" form="form-button-logout-1" class="btn btn-primary">
    logout
</button>

<!--... -->

<form id="form-button-logout-1" method="POST" action="https://localhost/logout" >
    <input type="hidden" name="_token" value="...">
</form>
```

[Back to index ^](#index)

Forms
-----

### Form

The `form` component helps you with removing the bulk work when setting up forms in Laravel. By default, it sets the HTTP method and CSRF directives and allows for an easier to use syntax than the default HTML form tag.

The most basic usage of the form component is wrapping some form elements and setting an action attribute:

```blade
<x-form action="http://example.com">
    Form fields...
</x-form>
```

This will output the following HTML:

```html
<form method="POST" action="http://example.com" novalidate="true">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="POST">

    Form fields...
</form>
```

#### Browers validation

By default the `novalidate` attribute, in order to avoid browser validation *and* to use consistent error styles on all types of form fields, is set to `true`.

If you do not want to use this attribute simply set it to `false`:

```blade
<x-form action="http://example.com" :novalidate="false">
    Form fields...
</x-form>
```

#### HTTP method

By default a `POST` HTTP method will be set. Of course, you can customize this:

```blade
<x-form action="http://example.com" method="PUT">
    Form fields...
</x-form>
```

This will output the following HTML:

```html
<form method="POST" action="http://example.com" novalidate="true">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="PUT">

    Form fields...
</form>
```

#### File uploads

To enable file uploads in a form you can make use of the `has-files` attribute:

```blade
<x-form action="http://example.com" has-files>
    Form fields...
</x-form>
```

This will output the following HTML:

```html
<form method="POST" action="http://example.com" novalidate="true" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="...">
    Form fields...
</form>
```

[Back to index ^](#index)

### Label

The `label` component is a small and practical convenience component to use in your forms. When you set the `for` attribute, it'll generate a label tag for a subsequent input field with the same `id` attribute and automatically generate the label title.

```blade
    <x-label for="first_name" />
```

This will output the following HTML:

```html
<label for="first_name">
    First name
</label>
```

Or composing the content:

```blade
<x-label for="first_name">
    {!! trans('first_name') !!}
</x-label>
```

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/label)

[Back to index ^](#index)

### Error

The `error` component provides an easy way to work with Laravel's `$error` message bag in its Blade views. You can use it to display (multiple) error messages for form fields.

```blade
<x-error name="first_name />
```

This component works well with input tags to apply Bootstrap style validations and aria tags ([see example](#example)).

[Back to index ^](#index)

Inputs
------

### Input

The most basic usage of the component is to set its name attribute:

```blade
    <x-input name="first_name" />
```

This will output the following HTML:

```html
<input name="first_name" type="text" id="first_name" class="form-control" />
```

By default a `text` type will be set for the input field as well as an `id` that allows it to be easily referenced by a `label` element.

Of course, you can also specifically set a type and overwrite the id attribute:

```blade
<x-input name="confirm_password" id="confirmPassword" type="password" />
```

This will output the following HTML:

```html
<input name="confirm_password" type="password" id="confirmPassword" class="form-control" />
```
Of course you can set a default value.

```blade
    <x-input name="first_name" :value="$user->first_name" />
```

This will output the following HTML:

```html
<input name="first_name" type="text" id="first_name" class="form-control" value="John" />
```

The input component also supports old values that were set. For example, you might want to apply some validation in the backend, but also make sure the user doesn't lose their input data when you re-render the form with any validation errors. When re-rendering the form, the input component will remember the old value.


**Warning:** do not escape the value passed to the `value` attribute, this is done in the components view.

If you do it this wrong way, for example like this:

```blade
    <x-input name="first_name" value="{{ $user->first_name }}" />
```

The value will be escaped twice and for example the character `'` will be displayed `&#039;`.

If you need to pass a plain string directly, you must do it this way:

```blade
    <x-input name="first_name" :value="'John'" />
```

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input)

[Back to index ^](#index)

### Password

The most basic usage of the component is as a self-closing component:

```blade
<x-password />
```

This will output the following HTML:

```html
<input name="password" type="password" id="password" class="form-control" />
```

By default a `password` type will be set for the input field as well as an `id` that allows it to be easily referenced by a label element.

Of course, you can also specifically set a `name` attribute:

```blade
<x-password name="my_password" />
```

```html
<input name="my_password" type="password" id="my_password" class="form-control" />
```
Of course, unlike the other input fields in Blade UI Kit Bootstrap, old values for password fields are never re-set after validation.

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/password)

[Back to index ^](#index)

### Email

The most basic usage of the component is to simply reference it:

```blade
    <x-email name="email_address" />
```

This will output the following HTML:

```html
<input name="email_address" type="email" id="email_address" class="form-control">
```

*You can use this component in the same way as the "[Input text](#input)" component because it extends it.*

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/email)

[Back to index ^](#index)

### Date

The most basic usage of the component is to simply reference it with a `name` attribute:

```blade
<x-date name="someday" />
```

This will output the following HTML:

```html
<input name="someday" type="date" id="someday" class="form-control">
```

*You can use this component in the same way as the "[Input text](#input)" component because it extends it.*

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/date)

[Back to index ^](#index)

### Time

The most basic usage of the component is to simply reference it with a `name` attribute:

```blade
<x-time name="created_at" />
```

This will output the following HTML:

```html
<input name="someday" type="date" id="someday" class="form-control">
```

*You can use this component in the same way as the "[Input text](#input)" component because it extends it.*

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/time)

[Back to index ^](#index)

### Hidden

The most basic usage of the component is to simply reference it with a `name` and value attribute:

```blade
    <x-hidden name="foo" value="bar" />
```

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/hidden)

[Back to index ^](#index)

### Textarea

The most basic usage of the component is to simply reference it with a `name` attribute:

```blade
<x-textarea name="about" />
```

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea)

[Back to index ^](#index)

### Select

You can create a select tag by passing it at least a name and a list of options:

```blade
    <x-select name="country" :options="$countries" />
```

The `options` attribute can be an array or a Collection.

If it is an array, the keys of this one will be the values of the options and the values of the array will be the labels.

If it is a collection, this collection must have `name` and `id` elements for the labels and the values of the options respectively. Otherwise you can specify them with the `labelAttribute` and `valueAttribute` attributes.

Of course you can set a default selected value.

```blade
    <x-select name="country" :options="$countries" :selected="$user->country" />
```

The `selected` attribute can be a single value or an array of values.

The select component also supports old values that were set. For example, you might want to apply some validation in the backend, but also make sure the user doesn't lose their selected values when you re-render the form with any validation errors. When re-rendering the form, the select component will remember the old selected values.

If you use a select multiple you probably have a `name` attribute like this: `name="countries[]"` in this case you **should** define an `id` attribute:

```blade
    <x-select name="countries[]" id="countries" :options="$countries" multiple />
```

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select)

[Back to index ^](#index)

Modals
------

### Classic modal

First, you need an element to launch the modal, typically a button.

With Bootstrap 4:

```blade
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>
```

With Bootstrap 5:

```blade
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>
```

Then you can use the component like this :

```blade
<x-modal id="exampleModal" title="Example Modal" class="fade">
    <p>Modal example content</p>
</x-modal>
```

You can remove the close button with `:dismissable="false"` attribute.

You can customize the header with the `<x-slot:header>` slot.

Finally you can add a footer with the `<x-slot:footer>` slot.

Obviously you can use the attributes as you wish.

```blade
<x-modal id="exampleModal" title="Example Modal" :dismissable="false" class="fade" data-bs-backdrop="static" data-bs-keyboard="false">
    <x-slot:header>
        <h5 class="modal-title" id="{{ $component->titleLabel }}">{{ $component->title }}</h5>
    </x-slot>

    <p>Modal example content</p>

    <x-slot:footer>
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </x-slot>
</x-modal>
```

[Back to index ^](#index)

### Confirm modal

This modal allows you to request confirmation of an action. You can use the Form Button component to simplify writing.

It is simply necessary to add the `data-confirm` attribute to the button with the message you want to display in the confirmation modal.

```blade
<x-form-button class="btn btn-danger" method="delete"
    :action="route('model.delete', $model)"
    :formId="'form-delete-'.$model->id"
    data-confirm="Are you sure you want to delete this model?">
        Delete
</x-form-button>

<x-modal-confirm title="Confirmation" />
```
**Note that this is a first implementation** and that this component will certainly evolve soon in order to provide more customization possibilities.

[Back to index ^](#index)

