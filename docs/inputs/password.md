Password
========

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

*You can use this component in the same way as the "[Input](./docs/inputs/inputs.md#input)" component because it extends it.*

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/password)
