Select
======

You can create a select tag in two ways: by passing options via an attribute, or by using a slot with HTML `<option>` tags.

Basic usage
-----------

### Using the options attribute

Pass a name and a list of options:

```blade
<x-select name="country" :options="$countries" />
```

The `options` attribute can be an array or a Collection.

If it is an array, the keys of this one will be the values of the options and the values of the array will be the labels.

If it is a collection, this collection must have `name` and `id` elements for the labels and the values of the options respectively. Otherwise you can specify them with the `labelAttribute` and `valueAttribute` attributes.

### Using a slot

Alternatively, you can provide the options directly using HTML:

```blade
<x-select name="country">
    <option value="">Select a country</option>
    <option value="us">United States</option>
    <option value="uk">United Kingdom</option>
    <option value="ca">Canada</option>
</x-select>
```

This approach gives you full control over the HTML, including support for `<optgroup>`:

```blade
<x-select name="vehicle">
    <option value="">Select a vehicle</option>
    <optgroup label="Cars">
        <option value="sedan">Sedan</option>
        <option value="suv">SUV</option>
    </optgroup>
    <optgroup label="Motorcycles">
        <option value="sport">Sport</option>
        <option value="touring">Touring</option>
    </optgroup>
</x-select>
```

Selected values
---------------

You can set a default selected value using the `selected` attribute:

```blade
<x-select name="country" :options="$countries" :selected="$user->country" />
```

The `selected` attribute can be a single value or an array of values (for multiple selects).

When using the slot approach with the `selected` attribute, the component will automatically mark matching options as selected:

```blade
<x-select name="country" :selected="$user->country">
    <option value="us">United States</option>
    <option value="uk">United Kingdom</option>
    <option value="ca">Canada</option>
</x-select>
```

Alternatively, you can use the native HTML `selected` attribute directly in your options:

```blade
<x-select name="country">
    <option value="us">United States</option>
    <option value="uk" selected>United Kingdom</option>
    <option value="ca">Canada</option>
</x-select>
```

Old values
----------

The select component also supports old values that were set. For example, you might want to apply some validation in the backend, but also make sure the user doesn't lose their selected values when you re-render the form with any validation errors. When re-rendering the form, the select component will remember the old selected values.

Multiple select
---------------

If you use a select multiple you probably have a `name` attribute like this: `name="countries[]"` in this case you **should** define an `id` attribute:

```blade
<x-select name="countries[]" id="countries" :options="$countries" multiple />
```

Or using the slot approach:

```blade
<x-select name="countries[]" id="countries" multiple>
    <option value="us">United States</option>
    <option value="uk">United Kingdom</option>
    <option value="ca">Canada</option>
</x-select>
```

Placeholder option
------------------

When using the `options` attribute, you can add a placeholder option:

```blade
<x-select name="country" :options="$countries" placeholder="Select a country" />
```

This will add a hidden empty option at the beginning of the select.

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select)
