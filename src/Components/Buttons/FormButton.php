<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\BtnIcons;
use BladeUIKitBootstrap\Concerns\BtnSize;
use BladeUIKitBootstrap\Concerns\BtnType;
use BladeUIKitBootstrap\Concerns\BtnVariant;
use BladeUIKitBootstrap\Concerns\FormMethod;
use Illuminate\Support\Str;

class FormButton extends BladeComponent
{
    use BtnIcons;
    use BtnSize;
    use BtnType;
    use BtnVariant;
    use FormMethod;

    /** Hide the button text (render icons only). */
    public bool $hideText = false;

    /**
     * Bootstrap color variant of the button. Defaults to `primary`.
     *
     * @var 'primary'|'secondary'|'success'|'danger'|'warning'|'info'|'light'|'dark'|'link'|'outline-primary'|'outline-secondary'|'outline-success'|'outline-danger'|'outline-warning'|'outline-info'|'outline-light'|'outline-dark'|null The `outline-*` values are only valid in Bootstrap 5.
     */
    public ?string $variant = null;

    /** Force the outline style of the button (Bootstrap 5). */
    public bool $outline = false;

    /** Disable the outline style even when `all_buttons_outline` is enabled. */
    public bool $noOutline = false;

    /**
     * Button size. `null` means the default size.
     *
     * @var 'lg'|'sm'|null
     */
    public ?string $size = null;

    /** Shortcut for `size="lg"`. */
    public bool $lg = false;

    /** Shortcut for `size="sm"`. */
    public bool $sm = false;

    /** Render the button as disabled. */
    public bool $disabled = false;

    /** Identifier of the generated form that wraps the button. */
    public ?string $formId = null;

    /** Identifier of the associated confirmation modal (generated when `confirm` is set). */
    public ?string $confirmId = null;

    /**
     * Color variant of the confirmation button inside the modal.
     *
     * @var 'primary'|'secondary'|'success'|'danger'|'warning'|'info'|'light'|'dark'|'link'|'outline-primary'|'outline-secondary'|'outline-success'|'outline-danger'|'outline-warning'|'outline-info'|'outline-light'|'outline-dark'|null
     */
    public ?string $confirmVariant = null;

    /**
     * HTTP method of the form. Defaults to `POST` (with method spoofing for PUT/PATCH/DELETE).
     *
     * @var 'GET'|'POST'|'PUT'|'PATCH'|'DELETE'|null
     */
    public ?string $method = null;

    /**
     * HTML button type. Defaults to `submit`.
     *
     * @var 'button'|'reset'|'submit'|null
     */
    public ?string $type = 'submit';

    /** Add the `novalidate` attribute to the form. Defaults to `true`. */
    public bool $novalidate = true;

    /** Single icon (backward-compatible alias of `startIcon`). */
    public ?string $icon = null;

    /** Icon displayed before the text. */
    public ?string $startIcon = null;

    /** Icon displayed after the text. */
    public ?string $endIcon = null;

    /**
     * Content properties are declared as constructor parameters — not bare public properties — so
     * Blade does NOT apply `sanitizeComponentAttribute()` (`e()`) to them. They are rendered raw
     * (`{!! !!}`) to allow HTML, so the "caller escapes" contract is preserved and pre-escaped or
     * HTML content is not double escaped.
     *
     * @param  string  $url  Target URL of the form (`action` attribute).
     * @param  bool  $show  Display the button. Defaults to `true`.
     * @param  bool  $hide  Force-hide the button (takes precedence over `show`).
     * @param  string|null  $text  Button label (raw HTML allowed).
     * @param  string|null  $title  Button `title` attribute (raw HTML allowed).
     * @param  string|null  $confirm  Confirmation message; enables a confirmation modal.
     * @param  string|null  $confirmTitle  Title of the confirmation modal.
     * @param  string|null  $startContent  Raw HTML content inserted before the text.
     * @param  string|null  $endContent  Raw HTML content inserted after the text.
     */
    public function __construct(
        public string $url,
        public bool $show = true,
        public bool $hide = false,
        public ?string $text = null,
        public ?string $title = null,
        public ?string $confirm = null,
        public ?string $confirmTitle = null,
        public ?string $startContent = null,
        public ?string $endContent = null,
    ) {}

    protected function initAttributes(): void
    {
        if (! $this->show || $this->hide) {
            return;
        }

        $this->formId ??= 'form-button-'.Str::random(32);

        if ($this->confirm !== null) {
            $this->confirmId ??= $this->formId;
        }

        $this->validFormMethod();
        $this->validBtnType(self::DEFAULT_FORM_BUTTON_TYPE);
        $this->validBtnVariant();
        $this->validBtnSize();
        $this->validBtnStartIcon();
        $this->validBtnEndIcon();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.form-button';
    }
}
