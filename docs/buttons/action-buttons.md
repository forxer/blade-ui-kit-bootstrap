Action buttons
==============

Common attributes of action buttons
-----------------------------------

### Text

The action buttons have a default text localized using the [forxer/generic-term-translations-for-laravel](https://github.com/forxer/generic-term-translations-for-laravel) package but you can modify it with the `text` attribute.

```blade
<x-btn-action :text="trans('my_button_text')" />
```

Or in plain text:

```blade
<x-btn-action :text="'My button text'" />
```


Delete
------



