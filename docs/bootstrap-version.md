Bootstrap version
=================

By default the package uses version 5 of Bootstrap. To change the version to Bootstrap 4 for your whole app just change the value in the package configuration file.

But if your application uses both Bootstrap 4 and Bootstrap 5 you should use the route middleware provided by the package. You will need to apply middleware on routes that need to use Bootstrap 4.

To do this, add the route middleware alias to the `app/Http/Kernel.php` file:

```php
    protected $middlewareAliases = [
        //...
        'blade-ui-kit-bootstrap-4' => \BladeUIKitBootstrap\Http\Middleware\BladeUiKitBootstrap4::class,
    ];
```

Then add this middleware to the routes where you want it to be applied, for example:

```php
Route::prefix('admin')
    ->name('admin.')
    ->middleware([
        'auth',
        'blade-ui-kit-bootstrap-4',
    ])
    ->group(__DIR__.'/web/admin.php');
```
