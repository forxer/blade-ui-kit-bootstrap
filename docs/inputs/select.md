Select
======

You can create a select tag by passing it at least a name and a list of options:

```blade
    <x-select name="country" :options="$countries" />
```

The `options` attribute can be an array or a Collection.

If it is an array, the keys of this one will be the values of the options and the values of the array will be the labels.

If it is a collection, this collection must have `name` and `id` elements for the labels and the values of the options respectively. Otherwise you can specify them with the `labelAttribute` and `valueAttribute` attributes.

Of course you can set a default selected value.

```blade
    <x-select name="country" :options="$countries" :selected="$user->country" />
```

The `selected` attribute can be a single value or an array of values.

The select component also supports old values that were set. For example, you might want to apply some validation in the backend, but also make sure the user doesn't lose their selected values when you re-render the form with any validation errors. When re-rendering the form, the select component will remember the old selected values.

If you use a select multiple you probably have a `name` attribute like this: `name="countries[]"` in this case you **should** define an `id` attribute:

```blade
    <x-select name="countries[]" id="countries" :options="$countries" multiple />
```

[Reference on MDN, especially for attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select)
