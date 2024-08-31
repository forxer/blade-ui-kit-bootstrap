Form Button
===========

The `form-button` component enables you to perform HTTP requests using any HTTP method you wish. By applying an HTML `form` tag behind the scenes it hides all of the bulk work of setting up the entire form.

Also this component is implemented because Bootstrap buttons can be elements of "button groups". And we don't want the form element to be directly in the "button groups" otherwise it "breaks" the display.

In order to avoid this we use the `form` attribute of the button element which has [good support](https://caniuse.com/form-attribute). This extracts the button from its form. The form itself will be displayed in the `blade-ui-kit-bs-html` stack.

Basic usage
-----------

```blade
    <x-form-button :action="route('do-something')" text="Do something" />
```

The `action` attribute is mandatory.

This will output the following HTML:

```html
<button type="submit" form="form-button-toFuKoZ8bPwhijAlV9vIFdPokYkOhTeT" class="btn btn-primary">
    Do something
</button>

<!-- ... -->

<form id="form-button-toFuKoZ8bPwhijAlV9vIFdPokYkOhTeT" method="POST" action="https://localhost/do-something">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="POST">
</form>
```

Form button specific attributes
-------------------------------

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

### Action

This button attribute corresponds to the "action" attribute of the form that the button must submit. It is required.

```blade
    <x-form-button :action="route('do-something')">
        Do something
    </x-form-button>
```

### Form ID

You can specify a form ID targeted by the button. If you don't specify a form id, as you can see, it will be randomly generated for each request using a random string of characters.

But this is not ideal, it is preferable that you identify yourself the form on which the button acts. It will be easier to navigate and this with better performance.

```blade
    <x-form-button
        :action="route('do-something', $model)"
        :form-id="'do-something-'.$model->id"
    >
        Do something
    </x-form-button>
```

This will output the following HTML:

```html
<button type="submit" form="form-button-do-something-42" class="btn btn-primary">
    Do something
</button>

<!--... -->

<form id="form-button-do-something-1" method="POST" action="https://localhost/do-something/1" >
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="POST">
</form>
```

### HTTP method

You can set a different HTTP method if you like with the `method` attibute:

```blade
    <x-form-button
        :action="route('do-something', $model)"
        :form-id="'do-something-'.$model->id"
        method="patch"
    >
        Do something
    </x-form-button>
```

This will output the following HTML:

```html
<button type="submit" form="form-button-do-something-42" class="btn btn-primary">
    Do something
</button>

<!--... -->

<form id="form-button-do-something-42" method="POST" action="https://localhost/do-something/1" >
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="PATCH">
</form>
```

### Type

The default type is "submit" but you can obviously modify it. Possible values are: `button`, `submit` or `reset`.

```blade
    <x-form-button type="submit" />
```

It is a property of the component rather than a simple attribute to make it easier to extend the class component, or necessary in certain edge cases.

```blade
    <x-form-button :type="$buttonType" />
```
