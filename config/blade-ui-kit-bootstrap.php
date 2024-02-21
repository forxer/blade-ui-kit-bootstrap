<?php

use BladeUIKitBootstrap\Components\Buttons;
use BladeUIKitBootstrap\Components\Buttons\Actions;
use BladeUIKitBootstrap\Components\Forms;
use BladeUIKitBootstrap\Components\Forms\Inputs;
use BladeUIKitBootstrap\Components\Modals;

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
        // Buttons
        'btn' => Buttons\SimpleButton::class,
        'form-button' => Buttons\FormButton::class,
        'link-button' => Buttons\LinkButton::class,

        // Actions buttons
        'btn-create' => Actions\Create::class,
        'btn-edit' => Actions\Edit::class,
        'btn-archive' => Actions\Archive::class,
        'btn-delete' => Actions\Delete::class,
        'btn-restore' => Actions\Restore::class,
        'btn-destroy' => Actions\Destroy::class,
        'btn-logout' => Actions\Logout::class,
        'btn-show' => Actions\Show::class,
        'btn-back' => Actions\Back::class,
        'btn-save' => Actions\Save::class,
        'btn-archives' => Actions\Archives::class,
        'btn-archives' => Actions\Archives::class,
        'btn-recycle-bin' => Actions\RecycleBin::class,

        // Forms
        'form' => Forms\Form::class,
        'label' => Forms\Label::class,
        'error' => Forms\Error::class,

        // Inputs
        'input' => Inputs\Input::class,
        'text' => Inputs\Text::class,
        'textarea' => Inputs\Textarea::class,
        'select' => Inputs\Select::class,
        'password' => Inputs\Password::class,
        'email' => Inputs\Email::class,
        'date' => Inputs\Date::class,
        'time' => Inputs\Time::class,
        'hidden' => Inputs\Hidden::class,

        // Modals
        'modal' => Modals\Modal::class,
        'modal-confirm' => Modals\Confirm::class,
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

    /*
    |--------------------------------------------------------------------------
    | All buttons outline
    |--------------------------------------------------------------------------
    |
    | If this option is "true" all buttons will automatically
    | have the "outline" attribute.
    |
    | Only since Bootstrap 5
    |
    */

    'all_buttons_outline' => false,
];
