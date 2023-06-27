<?php

use BladeUIKitBootstrap\Components;

return [

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all components that should be loaded for your app.
    | By default all components from Blade UI Kit Bootstrap are loaded in.
    | You can disable or overwrite any component class or alias that you want.
    |
    */

    'components' => [
        'date' => Components\Forms\Inputs\Date::class,
        'email' => Components\Forms\Inputs\Email::class,
        'error' => Components\Forms\Error::class,
        'form' => Components\Forms\Form::class,
        'form-button' => Components\Buttons\FormButton::class,
        'hidden' => Components\Forms\Inputs\Hidden::class,
        'input' => Components\Forms\Inputs\Input::class,
        'label' => Components\Forms\Label::class,
        'logout' => Components\Buttons\Logout::class,
        'modal' => Components\Modals\Modal::class,
        'modal-confirm' => Components\Modals\Confirm::class,
        'password' => Components\Forms\Inputs\Password::class,
        'select' => Components\Forms\Inputs\Select::class,
        'textarea' => Components\Forms\Inputs\Textarea::class,
        'time' => Components\Forms\Inputs\Time::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Bootstrap version
    |--------------------------------------------------------------------------
    |
    | Here you can set the default Boostrap version to use for rendering
    | views components. Possible values:
    |
    |   - bootstrap-4
    |   - bootstrap-5
    |
    */

    'boostrap_version' => 'bootstrap-5',

    /*
    |--------------------------------------------------------------------------
    | Components Prefix
    |--------------------------------------------------------------------------
    |
    | This value will set a prefix for all Blade UI Kit Bootstrap components.
    | By default it's empty. This is useful if you want to avoid
    | collision with components from other libraries.
    |
    | If set with "bs", for example, you can reference components like:
    |
    | <x-bs-email />
    |
    */

    'prefix' => '',
];
