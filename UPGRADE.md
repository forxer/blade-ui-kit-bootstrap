Upgrade
=======

From 0.9.x yo 0.10.x
--------------------

### New `text` and `variant` properties

With the addition of the `text` and `variant` properties to the `FormButton` and `LinkButton` components, the class constructor signature of these two components has changed. If you have extended these classes you must modify them accordingly.

### Logout

The "logout" button becomes an "Action button", this changes its name in blade templates.

So you need to replace `<x-logout />` with `<x-btn-logout />`.

### Confirm modal

The "confirm modal" attributes have been renamed:

- from `data-confirm` to `data-bs-confirm`
- from `data-confirm-modal` to `data-bs-confirm-modal`


From 0.8.x yo 0.9.x
-------------------

Confirm modals now require an id and this id should be referenced by the actionable element with the `data-confirm-modal` attribute.
