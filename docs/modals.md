Modals
======

Classic modal
-------------

First, you need an element to launch the modal, typically a button.

```blade
<x-btn data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</x-btn>
```

**Note:** With Bootstrap 4 you should use `data-toggle` and `data-target` attributes instead of Bootstrap 5 `data-bs-toggle` and `data-bs-target` attributes.

Then you can use the component like this :

```blade
<x-modal id="exampleModal" title="Example Modal">
    <p>Modal example content</p>
</x-modal>
```

The `id` and `title` attributes are required. Of course the `id` must be unique.

This will output the following HTML:

```html
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>

<!--... -->

<div class="modal show" id="exampleModal" tabindex="-1" aria-labelledby="example-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="example-modal-label">Example Modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal example content</p>
            </div>
        </div>
    </div>
</div>
```

> Note that a modal dialog represents its own separate document/context, so the `.modal-title` is an `<h1>` tag.  If necessary, you can add your custom CSS to control the heading’s appearance.

You can remove the close button with `:dismissable="false"` attribute.

You can customize the header with the `<x-slot:header>` slot.

Finally you can add a footer with the `<x-slot:footer>` slot.

Obviously you can use the attributes as you wish.

```blade
<x-modal id="exampleModal" title="Example Modal" :dismissable="false" data-bs-backdrop="static" data-bs-keyboard="false">
    <x-slot:header>
        <h5 class="modal-title" id="{{ $component->titleLabel }}">{{ $component->title }}</h5>
    </x-slot>

    <p>Modal example content</p>

    <x-slot:footer>
        <x-btn-cancel data-bs-dismiss="modal" />
    </x-slot>
</x-modal>
```

Form modal
----------

This modal allows you to integrate a form into its content.

```blade
<x-form-modal id="exampleFormModal" title="Example Form Modal" action="http://example.com">
    <p>Modal form example content</p>
</x-modal>
```

As for the basic modal the `id` and `title` attributes are required. But also the `action` attribute.

There is behind the "form component", so you can use all the attributes provided by it (`action`, `method`, `has-files` and `novalidate`). Please refer to the [form component](./forms.md#form) documentation for more details.



Confirm modal
-------------

This modal allows you to request confirmation of an action.

It is simply necessary to add the `data-buk-confirm` attribute to an actionable element with the message you want to display in the confirmation modal. You must also associate this button with the confirmation modal by specifying its ID via the `data-buk-confirm-modal` attribute.


```blade
<a href="{{ route('do-something', $model) }}"
    data-buk-confirm="Are you sure you want to do this?"
    data-buk-confirm-modal="confirm-modal-do-something-{{ $model->id }}">
        Do something
</a>

<x-confirm-modal id="confirm-modal-do-something-{{ $model->id }}" />
```

For this modal the title is not mandatory because it will have a default value from the embedded translations. But you can enter the title of your choice using the `title` attribute.

This is the low level implementation but in the vast majority of cases it is even simpler to use the "[Confirm](./buttons/buttons.md#confirm)" attribute of button components.

For example for a link button like in the example above:

```blade
    <x-link-button :url="route('do-something', $model)"
        confirm="Are you sure you want to do this?"
        :confirm-id="'confirm-modal-do-something-'.$model->id"
    >
        Do something
    </x-link-button>
```

Also, the [action buttons](./buttons/action-buttons.md) are even simpler if one of them suits your need.

