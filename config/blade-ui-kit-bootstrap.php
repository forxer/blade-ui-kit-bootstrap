<?php

use BladeUIKitBootstrap\Enums\BootstrapVersion;
use BladeUIKitBootstrap\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all components that should be loaded for your app.
    | By default all components from Blade UI Kit Bootstrap are loaded in.
    | You can add, disable or overwrite any component class or alias that you want.
    |
    */

    'components' => ServiceProvider::defaultComponents()->components(),

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
    | Always use novalidate
    |--------------------------------------------------------------------------
    |
    | By default all forms have the `novalidate` attribute,
    | you can reverse this behavior with this option.
    |
    */

    'all_forms_with_novalidate' => true,

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

    /*
    |--------------------------------------------------------------------------
    | All modal outline
    |--------------------------------------------------------------------------
    |
    | If this option is "true" all modal will automatically
    | have the "outline" attribute.
    |
    */

    'all_modal_outline' => true,

    /*
    |--------------------------------------------------------------------------
    | Button Icon Formats
    |--------------------------------------------------------------------------
    |
    | These two configuration options allow you to define formats
    | for PHP's native sprintf() function.
    |
    | This is to easily and consistently add icons to buttons.
    |
    | For example using Bootstrap Icons (https://icons.getbootstrap.com/).
    |
    | With the icon fonts:
    |
    |   'btn_start_icon_format' => '<i class="bi bi-%s"></i>',
    |
    | Or with the SVG sprite:
    |
    |   'btn_start_icon_format' => '<svg class="bi" fill="currentColor"><use xlink:href="bootstrap-icons.svg#%s"/></svg>',
    |
    | Want to use FontAwesome (https://fontawesome.com/) instead?
    | No problem, for example:
    |
    |   'btn_start_icon_format' => '<i class="fa-solid fa-%s"></i>',
    |
    */

    'btn_start_icon_format' => null,

    'btn_end_icon_format' => null,
];
