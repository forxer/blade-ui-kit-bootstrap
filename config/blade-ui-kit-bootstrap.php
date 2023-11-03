<?php

use BladeUIKitBootstrap\Components;
use BladeUIKitBootstrap\Components\Buttons\FormButton;
use BladeUIKitBootstrap\Components\Buttons\Logout;
use BladeUIKitBootstrap\Components\Forms\Error;
use BladeUIKitBootstrap\Components\Forms\Form;
use BladeUIKitBootstrap\Components\Forms\Inputs\Date;
use BladeUIKitBootstrap\Components\Forms\Inputs\Email;
use BladeUIKitBootstrap\Components\Forms\Inputs\Hidden;
use BladeUIKitBootstrap\Components\Forms\Inputs\Input;
use BladeUIKitBootstrap\Components\Forms\Inputs\Password;
use BladeUIKitBootstrap\Components\Forms\Inputs\Select;
use BladeUIKitBootstrap\Components\Forms\Inputs\Textarea;
use BladeUIKitBootstrap\Components\Forms\Inputs\Time;
use BladeUIKitBootstrap\Components\Forms\Label;
use BladeUIKitBootstrap\Components\Modals\Confirm;
use BladeUIKitBootstrap\Components\Modals\Modal;

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
        'date' => Date::class,
        'email' => Email::class,
        'error' => Error::class,
        'form' => Form::class,
        'form-button' => FormButton::class,
        'hidden' => Hidden::class,
        'input' => Input::class,
        'label' => Label::class,
        'logout' => Logout::class,
        'modal' => Modal::class,
        'modal-confirm' => Confirm::class,
        'password' => Password::class,
        'select' => Select::class,
        'textarea' => Textarea::class,
        'time' => Time::class,
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
