Blade UI kit Bootstrap
======================

This package provides several Blade components prepared for use with Bootstrap (4 and/or 5).

This package was initially an extension of [Blade UI Kit](https://blade-ui-kit.com/) to provide pre-styled components for Bootstrap. But by making it evolve we decided to decouple it from its parent. This simplifies the code as well as its use in our case.

This package is therefore largely inspired by [Blade UI Kit](https://blade-ui-kit.com/). A large part of the documentation comes from it. And we sincerely thank its contributors for the idea and what they have developed. This package wouldn't exist without it.

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

- [Installation](./docs/installation.md)
- [Bootstrap version](./docs/bootstrap-version.md)
- [Buttons](./docs/buttons.md)
    - [Form Button](./docs/buttons.md#form-button)
    - [Logout](./docs/buttons.md#logout)
- [Forms](./docs/forms.md)
    - [Form](./docs/forms.md#form)
    - [Label](./docs/forms.md#label)
    - [Error](./docs/forms.md#error)
- [Inputs](./docs/inputs.md)
    - [Input](./docs/inputs.md#input)
    - [Password](./docs/inputs.md#password)
    - [Email](./docs/inputs.md#email)
    - [Date](./docs/inputs.md#date)
    - [Time](./docs/inputs.md#time)
    - [Hidden](./docs/inputs.md#hidden)
    - [Select](./docs/inputs.md#select)
- [Modals](./docs/modals.md)
    - [Classic modal](./docs/modals.md#classic-modal)
    - [Confirm modal](./docs/modals.md#confirm-modal)
