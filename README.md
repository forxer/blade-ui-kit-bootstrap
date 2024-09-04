Blade UI kit Bootstrap
======================

This package provides several Blade components prepared for use with Bootstrap (4 and/or 5).

Well yes: not everyone uses Tailwind CSS 😊 ; and old projects continue to live and evolve with Bootstrap.

Example
-------

For example a simple form with Bootstrap 5:

```blade
<x-form action="http://example.com">
    <div class="mb-3">
        <x-label for="title" />
        <x-input name="title" />
        <x-error field="title" />
    </div>
    <x-btn-save />
</x-form>
```

Will render the following HTML:

```html
<form method="POST" action="http://example.com" novalidate>
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="POST">
    <div class="mb-3">
        <label for="title" class="form-label">
            Title
        </label>
        <input name="title" type="text" id="title" class="form-control" />
    </div>
    <button type="submit" class="btn btn-primary">
        Save
    </button>
</form>
```

And if there are validation errors:

```html
<!-- ... -->
    <label for="title" class="form-label">
        Title
    </label>
    <input name="title" type="text" id="title" class="form-control is-invalid"
        aria-describedby="validation-title-feedback" />
    <div id="validation-title-feedback" class="invalid-feedback">
        The title field is mandatory.
    </div>
<!-- ... -->
```

Index
-----

- [Installation](./docs/installation.md)
- [Bootstrap version](./docs/bootstrap-version.md)
- [Buttons](./docs/buttons/buttons.md)
    - [Simple button](./docs/buttons/simple-button.md)
    - [Form button](./docs/buttons/form-button.md)
    - [Link button](./docs/buttons/link-button.md)
    - [Action Buttons](./docs/buttons/action-buttons.md)
    - [Help info button](./docs/buttons/help-info-button.md)
- [Forms](./docs/forms.md)
    - [Form](./docs/forms.md#form)
    - [Label](./docs/forms.md#label)
    - [Error](./docs/forms.md#error)
- [Inputs](./docs/inputs.md)
    - [The `<input>` element](./docs/inputs/inputs.md#input)
    - [Text](./docs/inputs/text.md)
    - [Textarea](./docs/inputs/textarea.md)
    - [Select](./docs/inputs/select.md)
    - [Password](./docs/inputs/password.md)
    - [Email](./docs/inputs/email.md)
    - [Date](./docs/inputs/date.md)
    - [Time](./docs/inputs/time.md)
    - [Hidden](./docs/inputs/hidden.md)
- [Modals](./docs/modals.md)
    - [Classic modal](./docs/modals.md#classic-modal)
    - [Confirm modal](./docs/modals.md#confirm-modal)

Why and thanks
--------------

This package was initially an extension of [Blade UI Kit](https://blade-ui-kit.com/) to provide pre-styled components for Bootstrap. But by making it evolve we decided to decouple it from its parent. This simplifies the code as well as its use in our case.

This package is therefore largely inspired by [Blade UI Kit](https://blade-ui-kit.com/). A large part of the documentation comes from it. And we sincerely thank its contributors for the idea and what they have developed.

Alternatives
------------

- [Laravel bootstrap components](https://laravel-bootstrap-components.com/)
