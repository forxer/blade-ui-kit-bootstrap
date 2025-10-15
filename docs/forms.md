Forms
=====

Form
----

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

Of course, you can use PHP in the `action` attribute, for example a named route:

```blade
<x-form :action="route('home')">
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

### HTTP method

By default a `POST` HTTP method will be set. Of course, you can customize this:

```blade
<x-form :action="route('home')" method="PUT">
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

### File uploads

To enable file uploads in a form you can make use of the `has-files` attribute:

```blade
<x-form :action="route('home')" has-files>
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

### Browers validation

By default the `novalidate` attribute, in order to avoid browser validation *and* to use consistent error styles on all types of form fields, is set to `true`.

If you do not want to use this attribute simply set it to `false`:

```blade
<x-form :action="route('home')" :novalidate="false">
    Form fields...
</x-form>
```

If you want this attribute to never be automatically added, you can disable it globally for all forms. To do this, change the value `all_forms_with_novalidate` to `false` in the configuration file.

It will always be possible to use it occasionally by setting it to `true`:

```blade
<x-form :action="route('home')" :novalidate="true">
    Form fields...
</x-form>
```

Label
-----

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

Error
-----

The `error` component provides an easy way to work with Laravel's `$error` message bag in its Blade views. You can use it to display (multiple) error messages for form fields.

```blade
<x-error field="first_name" />
```

This component works well with input tags to apply Bootstrap style validations and aria tags.
