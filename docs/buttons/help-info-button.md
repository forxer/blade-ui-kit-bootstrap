Help info button
================

This button is special, it does not have all the common attributes like the others, it simply allows you to add a button that displays a popover containing help information.

```blade
<x-btn-help-info content="Help informations"/>
```

This will output the following HTML:

```html
<button class="btn btn-link" type="button"
    data-bs-trigger="focus"
    data-bs-placement="auto"
    data-bs-html="true"
    data-bs-toggle="popover"
    data-bs-content="Help informations">
        Information
    </button>
```

Help info button specific attributes
------------------------------------

All attributes set on the component are piped through on the button element. Also, this component accepts this [common button attributes](./buttons.md#common-button-attributes):
- [Text](./buttons.md#text)
- [Hide text](./buttons.md#hide-text)
- [Icons](./buttons.md#icons) (only "icon/start-icon" not "end-icon")
- [Variant](./buttons.md#variant)
- [Outline and no-outline](./buttons.md#outline-and-no-outline)
- [Sizes](./buttons.md#sizes)


**@todo should be completed...**
