
Buttons
=======

In order to benefit from all the advantages that these buttons allow, please take the time to read this documentation carefully.

A set of button components. There are basic components and components that extend them.

- [Simple button](./simple-button.md)
- [Form button](./form-button.md)
- [Link button](./link-button.md)
- [Action Buttons](./action-buttons.md)
- [Help info button](./help-info-button.md)

Common button attributes
------------------------

- [Text](#text)
- [Hide text](#hide-text)
- [Start and end content](#start-and-end-content)
- [Icons](#icons)
- [Variant](#variant)
- [Outline and no-outline](#outline-and-no-outline)
- [Sizes](#sizes)
- [Title](#title)
- [Confirm](#confirm)
- [Disabled](#disabled)

### Text

You can write the main text of the button in two different ways: either using the "text" attribute or in the "slot".

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

### Hide text

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

### Start and end content

You can add content to the buttons on either side of the text.

You can do this in two different ways: either by using the "startContent" and/or "endContent" attributes, or by using the "x-slot:start-content" and/or "x-slot:end-content".


```php
    $customStart = 'X - ';
    $customEnd = '?';
```

```blade
<x-btn text="Do something" :startContent="$customStart" :endContent="$customEnd" />
```

This will output the following HTML:

```html
<button type="button">
    X - Do something?
</button>
```

**Warning:** it's up to YOU to escape the value if you pass untrusted data:

```blade
<x-btn text="Do something" :startContent="e($customStart)" :endContent="e($customEnd)" />
```

For more advanced customizations you can use the dedicated “x-slots”:

```blade
<x-btn text="Do something">
    <x-slot:start-content>
        <span>{{ $customStart }}</span>
    </x-slot>
    <x-slot:end-content>
        <span>{{ $customEnd }}</span>
    </x-slot>
</x-btn>
```

This will output the following HTML:

```html
<button type="button">
    <span>X - </span>Do something<span>?</span>
</button>
```

***Note** that the "hide text" option does not affect these two locations. If "hideText" is enabled, they will still appear.

```blade
<x-btn text="Do something" :startContent="$customStart" :endContent="$customEnd" hide-text />
```

This will output the following HTML:

```html
<button type="button">
    X - <span class="visually-hidden">Do something</span>?
</button>
```

### Icons

In addition to "startContent" and "endContent" two other dedicated locations are available for icons. These can be defined using the `icon` or `start-icon` and `end-icon` attributes.

These are positioned on either side of all the concatenated contents "startContent", "text" and "endContent". To simplify, imagine it this way:

```php
($startIcon || $icon) . $startContent . $text . $endContent . $endIcon
```

The `icon`, `start-icon` and `end-icon` attributes are however different from the "startContent" and "endContent" locations in that they use configuration formats.

Formats that are used "behind the scenes" in PHP's native `sprintf()` function.

This allows you to add icons to buttons by simply passing the name of the desired icon from the library of your choice.

**Warning!** By default the configuration formats are `null`; to use this feature you must define them in the configuration file.

Let's say you want to use [Bootstrap icon fonts](https://icons.getbootstrap.com/). You need to define the formats in the configuration file:

```php
    'btn_start_icon_format' => '<i class="bi bi-%s"></i>',
    'btn_end_icon_format' => '<i class="bi bi-%s"></i>',
```

All you have to do now is add the name of the icon to your button:

```blade
<x-btn text="Do something" start-icon="check" />
```

This will output the following HTML:

```html
<button type="button">
    <i class="bi bi-check"></i>
    Do something
</button>
```

In the vast majority of cases the icon is displayed at the beginning of the button, to simplify even more you can use the `icon` attribute:

```blade
<x-btn text="Do something" icon="check" />
```

This will output the following HTML:

```html
<button type="button">
    <i class="bi bi-check"></i>
    Do something
</button>
```

**Note however** that the `start-icon` attribute will take precedence over the `icon` attribute.

Obviously the syntax is the same if you need to display the icon at the end of the button:

```blade
<x-btn text="Do something" end-icon="check" />
```

This will output the following HTML:

```html
<button type="button">
    Do something
    <i class="bi bi-check"></i>
</button>
```

Finally, like all other attributes, you can use them programmatically by passing a PHP expression:

```blade
<x-btn text="Do something" :icon="$iconName" />
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

You can add the `confirm` attribute with the message you want to display in the [confirmation modal](./../modals.md#confirm-modal).

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
