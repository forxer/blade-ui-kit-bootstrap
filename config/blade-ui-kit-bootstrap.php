<?php

use BladeUIKitBootstrap\Components\Buttons;
use BladeUIKitBootstrap\Components\Buttons\Actions;
use BladeUIKitBootstrap\Components\Forms;
use BladeUIKitBootstrap\Components\Forms\Inputs;
use BladeUIKitBootstrap\Components\Modals;
use BladeUIKitBootstrap\Enums\BootstrapVersion;

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
        'btn-back' => Actions\Back\Back::class,
        'btn-back-list' => Actions\Back\BackList::class,
        'btn-back-home' => Actions\Back\BackHome::class,
        'btn-archive' => Actions\Archive::class,
        'btn-archives' => Actions\Archives::class,
        'btn-create' => Actions\Create::class,
        'btn-delete' => Actions\Delete::class,
        'btn-destroy' => Actions\Destroy::class,
        'btn-disable' => Actions\Disable::class,
        'btn-disabled' => Actions\Disabled::class,
        'btn-edit' => Actions\Edit::class,
        'btn-enable' => Actions\Enable::class,
        'btn-enabled' => Actions\Enabled::class,
        'btn-logout' => Actions\Logout::class,
        'btn-move-down' => Actions\MoveDown::class,
        'btn-move-up' => Actions\MoveUp::class,
        'btn-preview' => Actions\Preview::class,
        'btn-recycle-bin' => Actions\RecycleBin::class,
        'btn-restore' => Actions\Restore::class,
        'btn-save' => Actions\Save::class,
        'btn-show' => Actions\Show::class,

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
    |   - BootstrapVersion::V4
    |   - BootstrapVersion::V5
    |
    */

    'boostrap_version' => BootstrapVersion::V5,

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
