Action buttons
==============

Action Buttons are a set of handy components for widely used buttons in an application like "Add", "Edit", "Delete", etc.

They are particularly useful when using a tool with boilerplate views like a "CRUD generator".

Action buttons extends either [Form button](./form-button.md), the [Link button](./link-button.md), or the [Simple button](./simple-button.md). The particularity is that they have [by default a text and a variant](#default-attributes) according to their semantic context.

- [Attributes](#attributes)
- [Resource buttons](#resource-buttons)
    - [Create button](#create-button)
    - [Edit button](#edit-button)
    - [Archive button](#archive-button)
    - [Delete button](#delete-button)
    - [Restore button](#restore-button)
    - [Destroy button](#destroy-button)
    - [Show button](#show-button)
    - [Preview button](#preview-button)
    - [Save button](#save-button)
- [Status buttons](#status-buttons)
    - [Move up button](#move-up-button)
    - [Move down button](#move-down-button)
    - [Enable button](#enable-button)
    - [Disable button](#disable-button)
    - [Enabled button](#enabled-button)
    - [Disabled button](#disabled-button)
- [Back buttons](#back-buttons)
    - [Back button](#back-button)
    - [Back list button](#back-list-button)
    - [Back home button](#back-home-button)
- [Other useful buttons](#other-useful-buttons)
    - [Logout button](#logout-button)
    - [Archives button](#archives-button)
    - [Recycle Bin button](#recycle-bin-button)

Attributes
----------

Like all buttons, every action buttons accepts all [common button attributes](./buttons.md#common-button-attributes):
- [Text](./buttons.md#text)
- [Hide text](./buttons.md#hide-text)
- [Start and end content](./buttons.md#start-and-end-content)
- [Variant](./buttons.md#variant)
- [Outline and no-outline](./buttons.md#outline-and-no-outline)
- [Sizes](./buttons.md#sizes)
- [Title](./buttons.md#title)
- [Confirm](./buttons.md#confirm)
- [Disabled](./buttons.md#disabled)

Some action buttons extends [Form button](./form-button.md) component so they also accept its specific attributes:
- [Form ID](./form-button.md#form-id)
- [HTTP method](./form-button.md#http-method)
- [Type](./form-button.md#type)

Others action buttons extends [Link button](./link-button.md) component so they also accept its specific attributes:
- [URL](./link-button.md#url)
- [Confirm ID](./link-button.md#confirm-id)

Finally, some action buttons extend the [Simple button](./simple-button.md) component so they also accept its specific attributes:
- [Confirm ID](./simple-button.md#confirm-id)
- [Type](./simple-button.md#type)
- [Form ID](./simple-button.md#form-id)

You therefore have at your fingertips a whole range of possibilities on simple and semantic bases.

### Action

Except for [Simple button](./simple-button.md), you must always specify an `url` attribute. Either for the form if it is an extension of the [Form button](./form-button.md) component, or for the URL if it is a [Link button](./link-button.md) component.


### Default attributes

Action buttons have default text localized using the [forxer/generic-term-translations-for-laravel](https://github.com/forxer/generic-term-translations-for-laravel) package but you can modify it with the [Text](./buttons.md#text) attribute of the buttons.

They also have a default variant but you can use the [Variant](./buttons.md#variant) attribute of the buttons to change it.

Depending on the context, the HTTP method is predefined but you can modify it with the [HTTP method](./form-button.md#http-method) attribute.

## Example of using these attributes

Note that this example is a bit silly, but it's to illustrate the point.

Imagine that you want to create an "archive button" on a model that implements soft delete (so with the HTTP "patch" method rather than "delete"), while adding a confirmation modal, a tooltip and customizing the text and variant.

For this we will use the "Destroy Button" component and use different attributes of the buttons available to us:

```blade
<x-btn-destroy
    :url="route('posts.delete', $post)"
    :form-id="'archive-post-'.e($post->id)"
    method="patch"
    text="Archive"
    :title="'Archive post “'.e($post->title).'“'"
    confirm="Are you sure you want to archive this post?"
    variant="warning"
    outline
/>
```

This will output the following HTML (and the javascript to manage the confirmation modal which does not appear here):

```html
<button type="submit"
    form="archive-post-42"
    title="Archive post “The Post Title“" data-bs-toggle="tooltip"
    data-bs-confirm="Are you sure you want to archive this post?"
    data-bs-confirm-modal="confirm-modal-archive-post-42"
    class="btn btn-outline-warning">
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

Resource buttons
----------------

### Create button

Behind the scenes, the "Create button" component extends the [Link button](./../link-button.md) component with the following default properties:
- Text: "Add"
- Variant: `primary`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Confirm ID](./link-button.md#confirm-id).

```blade
<x-btn-create :url="route('posts.create')" />
```

This will output the following HTML:

```html
<a href="https://localhost/posts/create" role="button" class="btn btn-primary">
    Add
</a>
```

### Edit button

Behind the scenes, the "Edit Button" component extends the [Link Button](./../link-button.md) component with the following default properties:
- Text: "Edit"
- Variant: `primary`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Confirm ID](./link-button.md#confirm-id).

```blade
<x-btn-edit :url="route('posts.edit', $post)" />
```

This will output the following HTML:

```html
<a href="https://localhost/posts/42/edit" role="button" class="btn btn-primary">
    Edit
</a>
```

### Delete button

Its purpose is to be used in the context of a model that implements "soft delete". To permanently delete an entity, use the "Destroy button" instead.

Behind the scenes, the "Delete button" component extends the [Form button](./form-button.md) component with the following default properties:
- Text: "Delete"
- HTTP Method: `PATCH`
- Variant: `danger`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Form ID](./form-button.md#form-id), [HTTP method](./form-button.md#http-method), [Type](./form-button.md#type).

```blade
<x-btn-delete :url="route('posts.delete', $post)" />
```

This will output the following HTML:

```html
<button type="submit" form="delete-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" class="btn btn-danger">
    Delete
</button>

<!--... -->

<form id="delete-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" method="POST" action="https://localhost/posts/42/delete">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="PATCH">
</form>
```

### Archive button

It has exactly the same role as the "Delete button" component above but simply the default text is "Archive".

Its purpose is to be used in the context of a model that implements "soft delete". To permanently delete an entity, use the "Destroy button" instead.

Behind the scenes, the "Archive button" component extends the [Form button](./form-button.md) component with the following default properties:
- Text: "Archive"
- HTTP Method: `PATCH`
- Variant: `danger`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Form ID](./form-button.md#form-id), [HTTP method](./form-button.md#http-method), [Type](./form-button.md#type).

```blade
<x-btn-archive :url="route('posts.archive', $post)" />
```

This will output the following HTML:

```html
<button type="submit" form="archive-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" class="btn btn-danger">
    Archive
</button>

<!--... -->

<form id="delete-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" method="POST" action="https://localhost/posts/42/archive">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="PATCH">
</form>
```

### Restore button

Its purpose is to restore an entity that has been "soft deleted".

Behind the scenes, the "Restore button" component extends the [Form button](./form-button.md) component with the following default properties:
- Text: "Delete"
- HTTP Method: `PATCH`
- Variant: `warning`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Form ID](./form-button.md#form-id), [HTTP method](./form-button.md#http-method), [Type](./form-button.md#type).

```blade
<x-btn-restore :url="route('posts.restore', $post)" />
```

This will output the following HTML:

```html
<button type="submit" form="restore-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" class="btn btn-warning">
    Restore
</button>

<!--... -->

<form id="restore-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" method="POST" action="https://localhost/posts/42/restore">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="PATCH">
</form>
```

### Destroy button

Unlike the "Archive button" and "Delete button" components, its purpose is to permanently delete an entity.

Behind the scenes, the "Destroy button" component extends the [Form button](./form-button.md) component with the following default properties:
- Text: "Delete"
- HTTP Method: `DELETE`
- Variant: `danger`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Form ID](./form-button.md#form-id), [HTTP method](./form-button.md#http-method), [Type](./form-button.md#type).

```blade
<x-btn-destroy :url="route('posts.delete', $post)" />
```

This will output the following HTML:

```html
<button type="submit" form="destroy-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" class="btn btn-danger">
    Delete
</button>

<!--... -->

<form id="destroy-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" method="POST" action="https://localhost/posts/42/delete">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="DELETE">
</form>
```

### Show button

Useful for example to see an entity on the public side from the administration area.

Behind the scenes, the "Show button" component extends the [Link button](./../link-button.md) component with the following default properties:
- Text: "Show"
- Variant: `info`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Confirm ID](./link-button.md#confirm-id).

```blade
<x-btn-show :url="route('posts.show', $post)" />
```

This will output the following HTML:

```html
<a href="https://localhost/posts/42" role="button" class="btn btn-info">
    Show
</a>
```

### Preview button

Very similar to the "Show button" but more for private/signed URLs.

Behind the scenes, the "Preview button" component extends the [Link button](./../link-button.md) component with the following default properties:
- Text: "Preview"
- Variant: `info`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Confirm ID](./link-button.md#confirm-id).

```blade
<x-btn-preview :url="route('posts.preview', $post)" />
```

This will output the following HTML:

```html
<a href="https://localhost/posts/42/preview" role="button" class="btn btn-info">
    Preview
</a>
```

### Save button

A simple form submit button.

Behind the scenes, the "Save button" component extends the [Simple button](./simple-button.md) component with the following default properties:
- Text: "Save"
- Variant: `primary`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Confirm ID](./simple-button.md#confirm-id), [Type](./simple-button.md#type), [Form ID](./simple-button.md#form-id)

```blade
    <x-btn-save />
```

This will output the following HTML:

```html
<button type="submit" class="btn btn-primary">
    Save
</button>
```

Status buttons
--------------

### Move up button

Its purpose is to move up an entity if it has, for example, a "sort" or "order" column.

Behind the scenes, the "Move up button" component extends the [Form button](./form-button.md) component with the following default properties:
- Text: "Up"
- HTTP Method: `PATCH`
- Variant: `secondary`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Form ID](./form-button.md#form-id), [HTTP method](./form-button.md#http-method), [Type](./form-button.md#type).

```blade
<x-btn-move-up :url="route('posts.move-up', $post)" />
```

This will output the following HTML:

```html
<button type="submit" form="move-up-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" class="btn btn-secondary">
    Up
</button>

<!--... -->

<form id="move-up-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" method="POST" action="https://localhost/posts/42/move-up">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="PATCH">
</form>
```

### Move down button

Its purpose is to move down an entity if it has, for example, a "sort" or "order" column.

Behind the scenes, the "Move down button" component extends the [Form button](./form-button.md) component with the following default properties:
- Text: "Down"
- HTTP Method: `PATCH`
- Variant: `secondary`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Form ID](./form-button.md#form-id), [HTTP method](./form-button.md#http-method), [Type](./form-button.md#type).

```blade
<x-btn-move-down :url="route('posts.move-down', $post)" />
```

This will output the following HTML:

```html
<button type="submit" form="move-down-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" class="btn btn-secondary">
    Down
</button>

<!--... -->

<form id="move-down-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" method="POST" action="https://localhost/posts/42/move-down">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="PATCH">
</form>
```

### Enable button

Its purpose is to enable an entity if it has, for example, an "active" column.

Behind the scenes, the "Enable button" component extends the [Form button](./form-button.md) component with the following default properties:
- Text: "Enable"
- HTTP Method: `PATCH`
- Variant: `warning`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Form ID](./form-button.md#form-id), [HTTP method](./form-button.md#http-method), [Type](./form-button.md#type).

```blade
<x-btn-enable :url="route('posts.enable', $post)" />
```

This will output the following HTML:

```html
<button type="submit" form="enable-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" class="btn btn-warning">
    Enable
</button>

<!--... -->

<form id="enable-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" method="POST" action="https://localhost/posts/42/enable">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="PATCH">
</form>
```

### Disable button

Its purpose is to disable an entity if it has, for example, an "active" column.

Behind the scenes, the "Disable button" component extends the [Form button](./form-button.md) component with the following default properties:
- Text: "Disable"
- HTTP Method: `PATCH`
- Variant: `success`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Form ID](./form-button.md#form-id), [HTTP method](./form-button.md#http-method), [Type](./form-button.md#type).

```blade
<x-btn-disable :url="route('posts.disable', $post)" />
```

This will output the following HTML:

```html
<button type="submit" form="disable-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" class="btn btn-warning">
    Enable
</button>

<!--... -->

<form id="disable-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" method="POST" action="https://localhost/posts/42/disable">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="PATCH">
</form>
```

### Enabled button

The counterpart to the "Disable button" component but which visually inverts the state.

Behind the scenes, the "Enabled button" component extends the [Form button](./form-button.md) component with the following default properties:
- Text: "Enabled"
- HTTP Method: `PATCH`
- Variant: `success`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Form ID](./form-button.md#form-id), [HTTP method](./form-button.md#http-method), [Type](./form-button.md#type).

```blade
<x-btn-enabled :url="route('posts.disable', $post)" />
```

This will output the following HTML:

```html
<button type="submit" form="disable-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" class="btn btn-success">
    Enabled
</button>

<!--... -->

<form id="disable-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" method="POST" action="https://localhost/posts/42/disable">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="PATCH">
</form>
```

### Disabled button

The counterpart to the "Enable button" component but which visually inverts the state.

Behind the scenes, the "Disabled button" component extends the [Form button](./form-button.md) component with the following default properties:
- Text: "Disabled"
- HTTP Method: `PATCH`
- Variant: `warning`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Form ID](./form-button.md#form-id), [HTTP method](./form-button.md#http-method), [Type](./form-button.md#type).

```blade
<x-btn-disabled :url="route('posts.enable', $post)" />
```

This will output the following HTML:

```html
<button type="submit" form="enable-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" class="btn btn-warning">
    Enabled
</button>

<!--... -->

<form id="enable-hijAlV9vIFtoFuKoZ8bPwdPokYkOhTeT" method="POST" action="https://localhost/posts/42/enable">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="PATCH">
</form>
```

Back buttons
------------

### Back button

Behind the scenes, the "Back button" component extends the [Link button](./../link-button.md) component with the following default properties:
- Text: "Back"
- Variant: `secondary`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Confirm ID](./simple-button.md#confirm-id), [Form ID](./simple-button.md#form-id)

```blade
<x-btn-back :url="route('posts')" />
```

This will output the following HTML:

```html
<a href="https://localhost/posts" role="button" class="btn btn-secondary">
    Back
</a>
```

### Back list button

It has exactly the same role as the "Back button" component above but simply the default text is "Back to the list".

Behind the scenes, the "Back list button" component extends the [Link button](./../link-button.md) component with the following default properties:
- Text: "Back to the list"
- Variant: `secondary`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Confirm ID](./simple-button.md#confirm-id), [Form ID](./simple-button.md#form-id)

```blade
<x-btn-back-list :url="route('posts')" />
```

This will output the following HTML:

```html
<a href="https://localhost/posts" role="button" class="btn btn-secondary">
    Back to the list
</a>
```

### Back home button

It has exactly the same role as the "Back button" component above but simply the default text is "Back to home".

Behind the scenes, the "Back home button" component extends the [Link button](./../link-button.md) component with the following default properties:
- Text: "Back to home"
- Variant: `primary`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Confirm ID](./simple-button.md#confirm-id), [Form ID](./simple-button.md#form-id)

```blade
<x-btn-back-home :url="route('home')" />
```

This will output the following HTML:

```html
<a href="https://localhost/" role="button" class="btn btn-primary">
    Back to home
</a>
```

Other useful buttons
--------------------

### Logout button

Behind the scenes, the "Logout button" component extends the [Form button](./form-button.md) component with the following default properties:
- Action: `route('logout')`
- Text: "Logout"
- HTTP Method: `POST`
- Variant: `secondary`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Form ID](./form-button.md#form-id), [HTTP method](./form-button.md#http-method), [Type](./form-button.md#type).

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

### Archives button

Use to access the list of "soft-deleted" entities.

Behind the scenes, the "Archives button" component extends the [Link button](./../link-button.md) component with the following default properties:
- Text: "Archives"
- Variant: `secondary`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Confirm ID](./simple-button.md#confirm-id), [Form ID](./simple-button.md#form-id)

```blade
<x-btn-archives :url="route('posts.archives')" />
```

This will output the following HTML:

```html
<a href="https://localhost/posts/archives" role="button" class="btn btn-secondary">
    Archives
</a>
```

### Recycle Bin button

It has exactly the same role as the "Archives button" component above but simply the default text is "Recycle Bin".

Behind the scenes, the "Recycle Bin button" component extends the [Link button](./../link-button.md) component with the following default properties:
- Text: "Recycle Bin"
- Variant: `secondary`

Available attributes: [Text](./buttons.md#text), [Hide text](./buttons.md#hide-text), [Start and end content](./buttons.md#start-and-end-content), [Icons](./buttons.md#icons), [Variant](./buttons.md#variant), [Outline and no-outline](./buttons.md#outline-and-no-outline), [Sizes](./buttons.md#sizes), [Title](./buttons.md#title), [Confirm](./buttons.md#confirm), [Disabled](./buttons.md#disabled), [Confirm ID](./simple-button.md#confirm-id), [Form ID](./simple-button.md#form-id)

```blade
<x-btn-recycle-bin :url="route('posts.recycle-bin')" />
```

This will output the following HTML:

```html
<a href="https://localhost/posts/recycle-bin" role="button" class="btn btn-secondary">
    Recycle Bin
</a>
```
