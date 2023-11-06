Logout
======

The `logout` component is a small convenience component for a widely used concept in an app, the logout link. Often this action sits in a menu item with other hyperlinks. But a logout is meant as an actionable link rather than a `GET` request. Therefor a `POST` request is better suited. And thus it deserves its own component.

Behind the scenes, the `logout` component extends the `form-button` component.

```blade
    <x-logout :formId="auth()->id()" class="btn btn-primary">
        {{ trans('Logout') }}
    </x-logout>
```

This will output the following HTML:

```html
<button type="submit" form="form-button-logout-1" class="btn btn-primary">
    Logout
</button>

<!--... -->

<form id="form-button-logout-1" method="POST" action="https://localhost/logout" >
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="POST">
</form>
```

By default the URL of the logout form is `route('logout')` but you can specify an URL:

```blade
    <x-logout :url="route('auth.logout')" :formId="auth()->id()" class="btn btn-primary">
        {{ trans('Logout') }}
    </x-logout>
```
