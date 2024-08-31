
Simple button
=============

```blade
<x-btn text="Do something" />
```

This will output the following HTML:

```html
<button type="button" class="btn btn-primary">
    Do something
</button>
```

Example using common button attributes:

```blade
<x-btn type="reset"
    :text="trans('action.cancel')"
    title="Reset this form"
    variant="secondary" />
```

This will output the following HTML:

```html
<button type="reset" class="btn btn-secondary" title="Reset this form" data-bs-toggle="tooltip">
    Cancel
</button>
```

Simple button specific attributes
---------------------------------

All attributes set on the component are piped through on the button element. Also, like all buttons, this component accepts all [common button attributes](./buttons.md#common-button-attributes):
- [Text](./buttons.md#text)
- [Hide text](./buttons.md#hide-text)
- [Start and end content](./buttons.md#start-and-end-content)
- [Variant](./buttons.md#variant)
- [Outline and no-outline](./buttons.md#outline-and-no-outline)
- [Sizes](./buttons.md#sizes)
- [Title](./buttons.md#title)
- [Confirm](./buttons.md#confirm)
- [Disabled](./buttons.md#disabled)

### Confirm ID

If you want to use the "[Confirm](./buttons.md#confirm)" attribute an identifier for the "[confirmation modal](./../modals.md)" must be specified.

You can specify a confirm ID targeted by the button. If you don't specify a confirm id, it will be randomly generated for each request using a random string of characters.

But this is not ideal, it is preferable that you identify yourself the target on which the button acts. It will be easier to navigate and this with better performance.

```blade
    <x-btn text="Do something"
        confirm="Are you sure you want to do this?"
        :confirm-id="'do-something-'.$model->id"
    />
```

### Type

The default type is "button" but you can obviously modify it. Possible values are: `button`, `submit` or `reset`.

```blade
    <x-btn type="submit" text="Do something" />
```

This will output the following HTML:

```html
<button type="submit" class="btn btn-primary">
    Do something
</button>
```

It is a property of the component rather than a simple attribute to make it easier to extend the class component, or necessary in certain edge cases.

```blade
    <x-form-button :type="$buttonType" />
```

### Form ID

If you want the button to be able to submit a form (`type="submit"`) and to be placed outside the form body you must specify the form identifier.

If you don't specify a form id, it will be randomly generated for each request using a random string of characters.

But this is not ideal, it is preferable that you identify yourself the form on which the button acts. It will be easier to navigate and this with better performance.

```blade
    <x-btn type="submit"
        text="Do something"
        :form-id="'do-something-'.$model->id"
    >
```

This will output the following HTML:

```html
<button type="submit" form="form-button-do-something-42" class="btn btn-primary">
    Do something
</button>
```
