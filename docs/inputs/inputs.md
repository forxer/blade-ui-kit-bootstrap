Inputs
======

A set of components to make it easier to write form elements.

* [Text](./docs/inputs/inputs.md#input)
* [Password](./docs/inputs/password.md)
* [Email](./docs/inputs/email.md)
* [Date](./docs/inputs/date.md)
* [Time](./docs/inputs/time.md)
* [Hidden](./docs/inputs/hidden.md)
* [Textarea](./docs/inputs/textarea.md)
* [Select](./docs/inputs/select.md)

Input
-----

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
