Link button
===========

This component aims to unify the behaviors of `<a>` element which are used as buttons. For example by assigning them the `role="button"` property by default. But it is not intended to be used to write "normal" links, for that just use HTML syntax.

```blade
    <x-link-button :url="route('do-something')" text="Do something" />
```

This will output the following HTML:

```html
<a href="https://localhost/do-something" role="button" class="btn btn-primary">
    Do something
</a>
```

Link button specific attributes
-------------------------------

All attributes set on the component are piped through on the button element. Also, like all buttons, this component accepts all [common button attributes](./buttons.md#common-button-attributes):
- [Text](./buttons.md#text)
- [Hide text](./buttons.md#hide-text)
- [Show or hide](./buttons.md#show-or-hide)
- [Start and end content](./buttons.md#start-and-end-content)
- [Icons](./buttons.md#icons)
- [Variant](./buttons.md#variant)
- [Outline and no-outline](./buttons.md#outline-and-no-outline)
- [Sizes](./buttons.md#sizes)
- [Title](./buttons.md#title)
- [Confirm](./buttons.md#confirm)
- [Confirm Variant](./buttons.md#confirm-variant)
- [Disabled](./buttons.md#disabled)

### URL

This button attribute corresponds to the "href" attribute of the link that the button must follow.

```blade
    <x-link-button :url="route('do-something')">
        Do something
    </x-link-button>
```

### Confirm ID

If you want to use the "[Confirm](./buttons.md#confirm)" attribute an identifier for the "[confirmation modal](./../modals.md#confirm-modal)" must be specified.

You can specify a confirm ID targeted by the button. If you don't specify a confirm id, it will be randomly generated for each request using a random string of characters.

But this is not ideal, it is preferable that you identify yourself the target on which the button acts. It will be easier to navigate and this with better performance.

```blade
    <x-link-button
        :url="route('do-something', $model)"
        confirm="Are you sure you want to do this?"
        :confirm-id="'do-something-'.$model->id"
    >
        Do something
    </x-link-button>
```
