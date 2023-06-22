<?php

use BladeUIKitBootstrap\Components;

return [

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all components that should be loaded for your app.
    | By default all components from Blade UI Kit are loaded in. You can
    | disable or overwrite any component class or alias that you want.
    |
    */

    'components' => [
        'date' => Components\Forms\Inputs\Date::class,
        'hidden' => Components\Forms\Inputs\Hidden::class,
        'select' => Components\Forms\Inputs\Select::class,
        'time' => Components\Forms\Inputs\Time::class,
        'modal' => Components\Modals\Modal::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Bootstrap version
    |--------------------------------------------------------------------------
    |
    | Here you can set the default Boostrap version to use for rendering
    | views components. Possible values:
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
    | If set with "buk", for example, you can reference components like:
    |
    | <x-buk-email />
    |
    */

    'prefix' => '',
];
