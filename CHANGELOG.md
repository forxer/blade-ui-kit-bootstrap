CHANGELOG
=========

0.26.0 (2024-04-11)
-------------------

- Added `show` and `hide` properties to button components


0.25.0 (2024-03-22)
-------------------

- Added support for Laravel 12


0.24.4 (2024-03-21)
-------------------

- Fixed #28 `visually-hidden` isn't a boostrap 4 class
- Use Rector 2


0.24.3 (2024-12-04)
-------------------

- Extracted `<x-confirm-modal />` component from elements attributes


0.24.2 (2024-12-04)
-------------------

- Fixed like in 0.24.1 for `<x-btn-copy />` action button component


0.24.1 (2024-12-03)
-------------------

- Removed "partials" which cause bugs in a Livewire context


0.24.0 (2024-10-26)
-------------------

- Added `DefaultComponents` class


0.23.1 (2024-10-25)
-------------------

- Replaced all "modal-confirm" by "confirm-modal"


0.23.0 (2024-10-22)
-------------------

- Added `<span class="btn-text">` on button text


0.22.0 (2024-10-15)
-------------------

- Added `<x-btn-copy />` action button component
- The shared button code has been put into Blade partials


0.21.0 (2024-10-14)
-------------------

- The `href` attribute of link buttons is not mandatory
- Added `<x-btn-email />` action button component
- Added `<x-btn-phone />` action button component
- Added `<x-btn-website />` action button component
- Documentation fixes and improvements


0.20.1 (2024-10-02)
-------------------

- Forms : `@csrf` and `@method` only when needed


0.20.0 (2024-10-01)
-------------------

- Added `variant` property to "modal components"
- Added `outline` property to "modal components", with possibility of global configuration and associated `no-outline` property
- Added `confirmVariant` property to "button components"


0.19.2 (2024-09-25)
-------------------

- Inversion of method invocation: `onConstructing()` before `initAttributes()`


0.19.1 (2024-09-23)
-------------------

- Inverting modal buttons


0.19.0 (2024-09-23)
-------------------

- Added `<x-form-modal />` component
- Renamed from `<x-modal-confirm />` to `<x-confirm-modal />`
- Added `<x-btn-modal-confirm-yes />` and `<x-btn-modal-confirm-no />` action buttons for confirm modal component
- Added `confirmTitle` attribute to button components
- Added `<x-btn-cancel />` action button component
- Refactored confirm modal component views


0.18.0 (2024-09-18)
-------------------

- The "confirm modal" attributes have been renamed from `data-bs-*` to `data-buk-*`
- Systematically add a prefix to "action buttons" components


0.17.3 (2024-09-12)
-------------------

- Set default variant type of "Save" to 'success'


0.17.2 (2024-09-05)
-------------------

- Set default button type and let user define one


0.17.1 (2024-09-04)
-------------------

- Fixed "Save" button


0.17.0 (2024-09-04)
-------------------

- Added `Help info button` component


0.16.1 (2024-09-03)
-------------------

- Fixed "Disable" and "Enable" action buttons


0.16.0 (2024-09-03)
-------------------

- Introduced `initAttributes()` and `onConstructing()` methods
- Renamed `action` attribute to `url` for "FormButton" component
- Renamed `action` attribute to `url` for every "Action buttons" components


0.15.0 (2024-09-01)
-------------------

- Added `$icon`, `$startIcon` and `$endIcon` properties to button components


0.14.5 (2024-08-31)
-------------------

- Improved button documentation


0.14.4 (2024-08-31)
-------------------

- Added new dedicated action button components views for Boostrap 4


0.14.3 (2024-08-30)
-------------------

- Experimental : added dedicated views for action button components (only for Boostrap 5 first)
- Various consolidations


0.14.2 (2024-08-30)
-------------------

- Fixed "Disabled" and "Enabled" action buttons
- Experimental : added `$startContent` and `$endContent` properties to button components


0.14.1 (2024-08-28)
-------------------

- Maintenance


0.14.0 (2024-06-16)
-------------------

- Added `all_forms_with_novalidate` global configuration value


0.13.1 (2024-05-10)
-------------------

- Small typos


0.13.0 (2024-04-01)
-------------------

- Added support for Laravel 11


0.12.2 (2024-02-28)
-------------------

- Fixed "Logout" translation


0.12.1 (2024-02-28)
-------------------

- Fixed "Logout" translation


0.12.0 (2024-02-27)
-------------------

- Added `BootstrapVersion` enum
- Added `size`, `lg` and `sm` properties to buttons
- Added `hide-text` property to buttons for future features...
- Added new "Action buttons" components:
    - Preview button
    - Move up button
    - Move down button
    - Enable button
    - Disable button
    - Enabled button
    - Disabled button
- Renamed `button.blade.php` views to `simple-button.blade.php`
- Rewrote all button component class constructor signatures
- Replaced the native PHP function `ucfirst()` with the Laravel method `Str::ucfirst()` to support multi-byte strings


0.11.1 (2024-02-21)
-------------------

- Default `all_buttons_outline` config value to `false`


0.11.0 (2024-02-21)
-------------------

- Renamed `Button` component to `SimpleButton`
- Added `outline` property to buttons, with possibility of global configuration and associated `no-outline` property
- Added `confirm`, `confirmId` and `formId` properties to `SimpleButton` components
- Added `type` property to `FormButton` and `SimpleButton` components
- Added new "Action buttons" components:
    - Show button
    - Restore button
    - Back button
    - Save button
    - Archive button
    - Archives button
    - Recycle Bin button
- Added missing "Simple Button" view for Bootstrap 4
- Fixed alloweb button variants


0.10.0 (2024-02-13)
-------------------

- Added `text` and `variant` properties to `FormButton` and `LinkButton` components
- Added `confirmId` property to `LinkButton` component
- Added `Button` component
- Added first "Action buttons" components:
    - Create button
    - Edit button
    - Delete button
    - Destroy button
- The "logout" button becomes an "Action button"
- Renamed confirm modal data attributes
- Fixed button tooltip for `title` property in Bootstrap 5


0.9.1 (2023-11-07)
------------------

- Input value could be null
- Fix doc URLs


0.9.0 (2023-11-06)
------------------

- Moved documentation in `/docs` directory
- Added `title`, `confirm` and `disabled` properties to the `FormButton` component
- Added `LinkButton` component
- Added `Text` input component
- Renamed `HasFormMethod` trait to `FormMethod`
- Inherited views for child components


0.8.4 (2023-11-03)
------------------

- Updated QA tools


0.8.3 (2023-08-19)
------------------

- Removed CRSF token on form with GET method
- Removed textarea rows attribute
- Enhanced strict type declarations


0.8.2 (2023-08-14)
------------------

- Added QA tools


0.8.1 (2023-08-02)
------------------

- Added an important note regarding values passed to input fields
- Added a note for select multiple


0.8.0 (2023-06-27)
------------------

- Decoupling of Blade UI Kit, the package is now independent
- Dropped support for Laravel < 10
- Dropped support for PHP < 8.2


0.7.0 (2023-06-23)
------------------

- Added Confirm Modal component
- Added missing input hidden views


0.6.0 (2023-06-22)
------------------

- Added required Blade Stacks
- Added Logout form button component
- Added Modal component


0.5.0 (2023-05-20)
------------------

- Added Form Button component


0.4.0 (2023-05-12)
------------------

- Added built-in "select" component


0.3.0 (2023-05-11)
------------------

- Support multiple Bootstrap versions
- Added ability to define prefix
- Added built-in components:
    - Date
    - Time
    - Hidden


0.2.0 (2023-04-29)
------------------

- #5 Remove :errors="$errors" attribute


0.1.0 (2023-04-14)
------------------

- First pre-release with:
    - Input
    - Email
    - Password
    - Label
    - Error
    - Form
