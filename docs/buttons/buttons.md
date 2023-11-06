
Buttons
=======

A set of button components. There are basic components and components that extend them.

Basic components:

- [Form button](./form-button.md)
- [Link button](./link-button.md)


Common buttons attributes
-------------------------

### Title

You can add a `title` which will appear in a tooltip.

```blade
<x-btn :title="trans('my_button_title')" />
```

Or alternatively for a plain text string:

```blade
<x-btn :title="'My button title'" />
```

### Confirm

You can add the `confirm` attribute with the message you want to display in the confirmation modal.

```blade
<x-btn :confirm="trans('confirmation_message')" />
```

Or alternatively for a plain text string:

```blade
<x-btn :confirm="'Are you sure you want to do this?'" />
```

## Disabled

You can disable a button by passing a boolean value to the `disabled` attribute.

```blade
<x-btn :disabled="$booleanCondition" />
```
