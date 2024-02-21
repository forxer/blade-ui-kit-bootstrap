Modals
======

Classic modal
-------------

First, you need an element to launch the modal, typically a button.

With Bootstrap 5:

```blade
<x-btn variant="primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</x-btn>
```

With Bootstrap 4:

```blade
<x-btn variant="primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</x-btn>
```

Then you can use the component like this :

```blade
<x-modal id="exampleModal" title="Example Modal" class="fade">
    <p>Modal example content</p>
</x-modal>
```

You can remove the close button with `:dismissable="false"` attribute.

You can customize the header with the `<x-slot:header>` slot.

Finally you can add a footer with the `<x-slot:footer>` slot.

Obviously you can use the attributes as you wish.

```blade
<x-modal id="exampleModal" title="Example Modal" :dismissable="false" class="fade" data-bs-backdrop="static" data-bs-keyboard="false">
    <x-slot:header>
        <h5 class="modal-title" id="{{ $component->titleLabel }}">{{ $component->title }}</h5>
    </x-slot>

    <p>Modal example content</p>

    <x-slot:footer>
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </x-slot>
</x-modal>
```

Confirm modal
-------------

This modal allows you to request confirmation of an action.

It is simply necessary to add the `data-confirm` attribute to an actionable element with the message you want to display in the confirmation modal. You must also associate this button with the confirmation modal by specifying its ID via the `data-confirm-modal` attribute.


```blade
<a href="{{ route('model.delete', $model) }}" class="btn btn-danger"
    data-confirm="Are you sure you want to delete this model?"
    data-confirm-modal="confirm-modal-delete-{{ $model->id }}">
        Delete
</a>

<x-modal-confirm id="confirm-modal-delete-{{ $model->id }}" title="Confirmation" />
```
