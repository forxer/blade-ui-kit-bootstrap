Modals
======

Classic modal
-------------

First, you need an element to launch the modal, typically a button.

With Bootstrap 4:

```blade
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>
```

With Bootstrap 5:

```blade
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>
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

This modal allows you to request confirmation of an action. You can use the Form Button component to simplify writing.

It is simply necessary to add the `data-confirm` attribute to the button with the message you want to display in the confirmation modal.

```blade
<x-form-button class="btn btn-danger" method="delete"
    :action="route('model.delete', $model)"
    :formId="'form-delete-'.$model->id"
    data-confirm="Are you sure you want to delete this model?">
        Delete
</x-form-button>

<x-modal-confirm title="Confirmation" />
```
**Note that this is a first implementation** and that this component will certainly evolve soon in order to provide more customization possibilities.


