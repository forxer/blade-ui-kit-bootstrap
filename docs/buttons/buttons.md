
Buttons
=======

In order to benefit from all the advantages that these buttons allow, please take the time to read this documentation carefully.

A set of button components. There are basic components and components that extend them.

- [Simple button](./simple-button.md)
- [Form button](./form-button.md)
- [Link button](./link-button.md)
- [Action Buttons](./action-buttons.md)

Common button attributes
------------------------

- [Text](#text)
- [Hide text](#hide-text)
- [Variant](#variant)
- [Outline and no-outline](#outline-and-no-outline)
- [Sizes](#sizes)
- [Title](#title)
- [Confirm](#confirm)
- [Disabled](#disabled)

### Text

You can write the content of the button in two different ways: either using the "text" attribute or in the "slot".

```blade
<x-btn :text="trans('do_something')" />
```

Or in plain text:

```blade
<x-btn text="Do something" />
```

This will output the following HTML:

```html
<button type="button">
    Do something
</button>
```

**Warning:** it's up to YOU to escape the value if you pass untrusted data:

```blade
<x-btn :text="e($data)" />
```

For more customization you can use the slot:

```blade
<x-btn>
    <span>Do something</span>
</x-btn>
```

Hide text
---------

Visually hide button text but keep them accessible to assistive technologies.

```blade
<x-btn text="Do something" hide-text />
```

This will output the following HTML:

```html
<button type="button">
    <span class="visually-hidden">Do something</span>
</button>
```

In some cases you may need to do this programmatically by passing a boolean value to the `hide-text` attribute:

```blade
<x-btn text="Do something" :hide-text="$booleanCondition" />
```

### Variant

Buttons have a default Bootstrap variant (`primary`), but you can change it with the `variant` attribute.

Possible values are the variants provided by Bootstrap. With [Bootstrap 4](https://getbootstrap.com/docs/4.6/components/buttons/#examples) and [Bootstrap 5](https://getbootstrap.com/docs/5.3/components/buttons/#variants):
- `primary`
- `secondary`
- `success`
- `danger`
- `warning`
- `info`
- `light`
- `dark`
- `link`

```blade
<x-btn variant="success" />
```

This will output the following HTML:

```html
<button type="button" class="btn btn-success">
    ...
</button>
```

### Outline and no-outline

Since Bootstrap 5 it is possible to use "Outline Buttons".

To do this, several options are available to you: use `variant` attribute, `outline` attribute and global configuration.

You can use the "outline-`variant`" variant:

```blade
<x-btn variant="outline-primary" />
```

This will output the following HTML:

```html
<button type="button" class="btn btn-outline-primary">
    ...
</button>
```

But the simplest is to use the `outline` attribute:

```blade
<x-btn />
<x-btn outline />
```

This will output the following HTML:

```html
<button type="button" class="btn btn-primary">
    ...
</button>

<button type="button" class="btn btn-outline-primary">
    ...
</button>
```

Especially since this allows it to be defined programmatically:

```blade
<x-btn variant="success" :outline="$booleanCondition" />
```

In the configuration file, you can change the value of `all_buttons_outline` to `true`. Then all buttons will have the outline property by default.

No need to specify the "outline" attribute. Conversely in this case, if you want a button not to have this property you can use the `no-outline`  attribute so that the button has its normal display.

```blade
<x-btn />
<x-btn no-outline />
```

This will output the following HTML:

```html
<button type="button" class="btn btn-outline-primary">
    ...
</button>

<button type="button" class="btn btn-primary">
    ...
</button>
```

### Sizes

Want bigger or smaller buttons? Add `lg` or `sm` attributes for additional sizes:

```blade
<x-btn />
<x-btn lg />
<x-btn sm />
```

This will output the following HTML:

```html
<button type="button" class="btn btn-primary">
    ...
</button>

<button type="button" class="btn btn-primary btn-lg">
    ...
</button>

<button type="button" class="btn btn-primary btn-sm">
    ...
</button>
```

In some cases you may need to do this programmatically by passing a boolean value to the `lg` or `sm` attributes:

```blade
<x-btn :lg="$booleanCondition" />
<x-btn :sm="$booleanCondition" />
```

You also have at your disposal the `size` attribute which must return one of the two strings `lg` or `sm`:

```blade
<x-btn :size="$size" />
```

Note that the `size` attribute *has priority* over the other two attributes `lg` and `sm`.

### Title

You can add a `title` which will appear in a tooltip.

```blade
<x-btn :title="trans('my_button_title')" />
```

Or alternatively for a plain text string:

```blade
<x-btn title="My button title" />
```

This will output the following HTML:

```html
<button title="My button title" data-bs-toggle="tooltop">
    ...
</button>
```

**Warning:** it's up to YOU to escape the value if you pass untrusted data:

```blade
<x-btn :title="e($data)" />
```

### Confirm

You can add the `confirm` attribute with the message you want to display in the [confirmation modal](./../modals.md).

```blade
<x-btn :confirm="trans('confirmation_message')" />
```

Or alternatively for a plain text string:

```blade
<x-btn confirm="Are you sure you want to do this?" />
```

**Warning:** it's up to YOU to escape the value if you pass untrusted data:

```blade
<x-btn :confirm="e($data)" />
```

## Disabled

Obviously you can use the native HTML "disabled" attribute:

```blade
<x-btn disabled />
```

But in some cases you may need to do this programmatically by passing a boolean value to the `disabled` attribute:

```blade
<x-btn :disabled="$booleanCondition" />
```
