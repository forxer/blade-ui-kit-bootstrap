Action buttons
==============

Action Buttons are a set of handy components for widely used buttons in an application like "Add", "Edit", "Delete", etc.

Action buttons extends either [Form button](./form-button.md) or [Link button](./link-button.md). The particularity is that they have [by default a text and a variant](#default-attributes) according to their semantic context.

- [Attributes](#attributes)
- [Create button](#create-button)
- [Edit button](#edit-button)
- [Delete button](#delete-button)
- [Destroy button](#destroy-button)
- [Logout button](#logout-button)

Attributes
----------

Like all buttons, every action buttons accepts all [button specific attributes](./buttons.md#button-specific-attributes):
- [Text](./buttons.md#text)
- [Variant](./buttons.md#variant)
- [Title](./buttons.md#title)
- [Confirm](./buttons.md#confirm)
- [Disabled](./buttons.md#disabled)

Some action buttons extends [Form button](./form-button.md) so they also accept its specific attributes:
- [Form ID](./form-button.md#form-id)
- [HTTP method](./form-button.md#http-method)

Others action buttons extends [Link button](./link-button.md) so they also accept its specific attributes:
- [URL](./link-button.md#url)
- [Confirm ID](./link-button.md#confirm-id)

### Action

You must always specify an `action` attribute, either for the form if it is an extension of the [Form button](./form-button.md) component, or for the URL if it is a [Link button](./link-button.md) component.

### Default attributes

Action buttons have default text localized using the [forxer/generic-term-translations-for-laravel](https://github.com/forxer/generic-term-translations-for-laravel) package but you can modify it with the [Text](./buttons.md#text) attribute of the buttons.

They also have a default variant but you can use the [Variant](./buttons.md#variant) attribute of the buttons to change it.

## Example of using these attributes

Note that this example is a bit silly, but it's to illustrate the point.

Imagine that you want to create an "archive button" on a model that implements soft delete (so with the HTTP "patch" method rather than "delete"), while adding a confirmation modal, a tooltip and customizing the text and variant.

For this we will use the "Destroy Button" component and use different attributes of the buttons available to us:

```blade
<x-btn-destroy
    :action="route('posts.delete', $post->id)"
    :form-id="'archive-post-'.e($post->id)"
    method="patch"
    text="Archive"
    :title="'Archive post “'.e($post->title).'“'"
    confirm="Are you sure you want to archive this post?"
    variant="warning"
/>
```

This will output the following HTML (and the javascript to manage the confirmation modal which does not appear here):

```html
<button type="submit"
    form="archive-post-42"
    title="Archive post “The Post Title“" data-bs-toggle="tooltip"
    data-bs-confirm="Are you sure you want to archive this post?"
    data-bs-confirm-modal="confirm-modal-archive-post-42"
    class="btn btn-warning">
        Archive
</button>

<!-- ... -->

<div class="modal" id="confirm-modal-archive-post-42" tabindex="-1" aria-labelledby="Please confirm" aria-hidden="true">
    <!-- ... modal header ... -->
    <div class="modal-body">
        Are you sure you want to delete this post?
    </div>
    <!-- ... modal footer with confirm and cancel buttons ... -->
</div>

<form id="archive-post-42" method="POST" action="https://localhost/posts/42/delete">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="PATCH">
</form>
```

Create button
-------------

Behind the scenes, the "Create button" component extends the [Link button](./../link-button.md) component with these default properties:
- Text: "Add"
- Variant: `primary`

Available attributes: [Text](./buttons.md#text), [Variant](./buttons.md#variant), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Confirm ID](./link-button.md#confirm-id).

```blade
<x-btn-create :action="route('posts.create')" />
```

This will output the following HTML:

```html
<a href="https://localhost/posts/create" role="button" class="btn btn-primary">
    Add
</a>
```

Edit button
-----------

Behind the scenes, the "Edit Button" component extends the [Link Button](./../link-button.md) component with these default properties:
- Text: "Edit"
- Variant: `primary`

Available attributes: [Text](./buttons.md#text), [Variant](./buttons.md#variant), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Confirm ID](./link-button.md#confirm-id).

```blade
<x-btn-edit :action="route('posts.edit', $post)" />
```

This will output the following HTML:

```html
<a href="https://localhost/posts/42/edit" role="button" class="btn btn-primary">
    Edit
</a>
```

Delete button
-------------

Its purpose is to be used in the context of a model that implements "soft delete".

Behind the scenes, the "Delete button" component extends the [Form button](./form-button.md) component with these default properties:
- Text: "Delete"
- HTTP Method: `PATCH`
- Variant: `danger`

Available attributes: [Text](./buttons.md#text), [Variant](./buttons.md#variant), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Form ID](./form-button.md#form-id), [HTTP method](./form-button.md#http-method).

```blade
<x-btn-delete :action="route('posts.delete', $post->id)" />
```

This will output the following HTML:

```html
<button type="submit" form="delete-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" class="btn btn-danger">
    Delete
</button>

<!--... -->

<form id="form-button-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" method="POST" action="https://localhost/posts/42/delete">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="PATCH">
</form>
```

Destroy button
--------------

Unlike the "Destroy button", its purpose is to permanently delete an entity.

Behind the scenes, the "Destroy button" component extends the [Form button](./form-button.md) component with these default properties:
- Text: "Delete"
- HTTP Method: `DELETE`
- Variant: `danger`

Available attributes: [Text](./buttons.md#text), [Variant](./buttons.md#variant), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Form ID](./form-button.md#form-id), [HTTP method](./form-button.md#http-method).

```blade
<x-btn-destroy :action="route('posts.delete', $post->id)" />
```

This will output the following HTML:

```html
<button type="submit" form="delete-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" class="btn btn-danger">
    Delete
</button>

<!--... -->

<form id="form-button-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" method="POST" action="https://localhost/posts/42/delete">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="DELETE">
</form>
```

Logout button
-------------

Behind the scenes, the "Logout button" component extends the [Form button](./form-button.md) component with these default properties:
- Action: `route('logout')`
- Text: "Logout"
- HTTP Method: `POST`
- Variant: `secondary`

Available attributes: [Text](./buttons.md#text), [Variant](./buttons.md#variant), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Form ID](./form-button.md#form-id), [HTTP method](./form-button.md#http-method).

```blade
    <x-btn-logout />
```

This will output the following HTML:

```html
<button type="submit" form="logout-toFuKoZ8bPwhijAlV9vIFdPokYkOhTeT" class="btn btn-secondary">
    Logout
</button>

<!--... -->

<form id="logout-toFuKoZ8bPwhijAlV9vIFdPokYkOhTeT" method="POST" action="https://localhost/logout" >
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="POST">
</form>
```
