Configuration
=============

You can modify features thanks to the different configuration variables than the package provided.

Publishing
----------

First, publish the configuration file with this command:

```bash
php artisan vendor:publish --tag="blade-ui-kit-bootstrap-config"
```

Loading components
------------------

In the published configuration file, you can use the `DefaultComponents` class to modify the components loaded by the package.

By default all components from Blade UI Kit Bootstrap are loaded in. You can add, disable or overwrite any component class or alias that you want.

Please refer to this `DefaultComponents` class to know all the components available.

You can access the instance of this class via the `defaultComponents()` method of the ServiceProvider.

Disable some components by there alias name:

```php
use BladeUIKitBootstrap\ServiceProvider;

return [
    //...
    'components' => ServiceProvider::defaultComponents()
        ->except([
            'date',
            'time',
        ])
        ->components(),
    //..
];
```

The `except()` method takes in parameter an array of component alias name.

Replace some component classes with your own:

```php
use BladeUIKitBootstrap\ServiceProvider;

return [
    //...
    'components' => ServiceProvider::defaultComponents()
        ->replace([
            'btn-help-info' => \App\View\Components\Buttons\HelpInfo::class,
            'btn-logout' => \App\View\Components\Buttons\Actions\Logout::class,
        ])
        ->components(),
    //..
];
```

The `replace()` method takes in parameter an associative array of components composed of their alias and their class.

You can also replace alias names with the `replaceAlias` method:

```php
use BladeUIKitBootstrap\ServiceProvider;

return [
    //...
    'components' => ServiceProvider::defaultComponents()
        ->replaceAlias([
            'password' => 'input-password',
            'email' => 'input-email',
        ])
        ->components(),
    //..
];
```

The `replaceAlias()` method takes in parameter an associative array composed of the original alias and their replacement.

You can mix the configurations by chaining the methods:

```php
use BladeUIKitBootstrap\ServiceProvider;

return [
    //...
    'components' => ServiceProvider::defaultComponents()
        ->except([
            'date',
            'time',
        ])
        ->replace([
            'btn-help-info' => \App\View\Components\Buttons\HelpInfo::class,
            'btn-logout' => \App\View\Components\Buttons\Actions\Logout::class,
        ])
        ->replaceAlias([
            'password' => 'input-password',
            'email' => 'input-email',
        ])
        ->components(),
    //..
];
```

Beware of the order of methods. For example, if you have previously disabled a component you will not be able to change your alias; This will not work:

```php
use BladeUIKitBootstrap\ServiceProvider;

return [
    //...
    'components' => ServiceProvider::defaultComponents()
        ->except([
            'email',
        ])
        ->replaceAlias([
            'email' => 'input-email',
        ])
        ->components(),
    //..
];
```

Bootstrap version
-----------------

By default the package uses version 5 of Bootstrap. To change the version to Bootstrap 4 for your whole app just change the value in the package configuration file.

For more details please see the documentation dedicated to the [Bootstrap version](./bootstrap-version.md).


Prefixing
---------

Components from this package might conflict with other ones from different libraries, or components from your own app. To prevent this, you can opt to add a prefix to the Blade UI Kit components. You can do this by setting the prefix option in the config file:

```php
return [
    //...
    'prefix' => 'bs',
    //...
];
```
Now all components can be referenced as usual, but with the prefix before their name:

```blade
<x-bs-input name="inpu_name" />
```
For obvious reasons, the docs don't use any prefix in their code examples. So keep this in mind when setting a prefix and copy/pasting code snippets.


Others configuration keys
-------------------------

### Always use novalidate

By default all forms have the `novalidate` attribute, you can reverse this behavior with this option.

For more details please see the documentation dedicated to [Forms Browers validation](./forms#browers-validation)

### All buttons outline

If this option is "true" all buttons will automatically have the "outline" attribute.

For more details please see the documentation dedicated to [Buttons Outline and no-outline](./buttons/buttons.md#outline-and-no-outline)

### All modal outline

If this option is "true" all modal will automatically have the "outline" attribute.

For more details please see the documentation dedicated to [Modal variants](./modals#modal-variants)

### Button Icon Formats

These two configuration options allow you to define formats for PHP's native sprintf() function. This is to easily and consistently add icons to buttons.

For more details please see the documentation dedicated to [Buttons Icons](./buttons/buttons.md#icons)
