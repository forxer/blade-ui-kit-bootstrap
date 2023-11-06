Link button
===========

This component aims to unify the behaviors of `<a>` element which are used as buttons. For example by assigning them the `role="button"` property by default. But it is not intended to be used to write "normal" links, for that just use HTML syntax.

```blade
    <x-link-button :url="route('do-something')" class="btn-primary">
        Do something
    </x-link-button>
```

This will output the following HTML:

```html
<a href="https://localhost/do-something" role="button" class="btn btn-primary">
    Do something
</a>
```

All attributes set on the component are piped through on the link element. Also, like all buttons, this component accepts [attributes common to buttons](./buttons.md#common-buttons-attributes).
