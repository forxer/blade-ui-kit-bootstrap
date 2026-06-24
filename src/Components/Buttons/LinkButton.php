<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\BtnIcons;
use BladeUIKitBootstrap\Concerns\BtnSize;
use BladeUIKitBootstrap\Concerns\BtnVariant;
use Illuminate\Support\Str;

class LinkButton extends BladeComponent
{
    use BtnIcons;
    use BtnSize;
    use BtnVariant;

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

    /** Identifier of the associated confirmation modal (generated when `confirm` is set). */
    public ?string $confirmId = null;

    /**
     * Color variant of the confirmation button inside the modal.
     *
     * @var 'primary'|'secondary'|'success'|'danger'|'warning'|'info'|'light'|'dark'|'link'|'outline-primary'|'outline-secondary'|'outline-success'|'outline-danger'|'outline-warning'|'outline-info'|'outline-light'|'outline-dark'|null
     */
    public ?string $confirmVariant = null;

    /** Single icon (backward-compatible alias of `startIcon`). */
    public ?string $icon = null;

    /** Icon displayed before the text. */
    public ?string $startIcon = null;

    /** Icon displayed after the text. */
    public ?string $endIcon = null;

    /**
     * Content properties (title, text, confirm, start/end content, url) are declared as
     * constructor parameters — not as bare public properties — on purpose: Blade applies
     * `sanitizeComponentAttribute()` (i.e. `e()`) to bound attributes that are NOT constructor
     * parameters. Since these values are rendered raw (`{!! !!}`) so the caller can pass HTML,
     * keeping them as constructor parameters preserves the "caller escapes" contract and avoids
     * the double escaping that would otherwise occur for pre-escaped or HTML content.
     *
     * @param  bool  $show  Display the button. Defaults to `true`.
     * @param  bool  $hide  Force-hide the button (takes precedence over `show`).
     * @param  string|null  $url  Target URL of the link (`href` attribute).
     * @param  string|null  $text  Button label (raw HTML allowed).
     * @param  string|null  $title  `title` attribute (raw HTML allowed).
     * @param  string|null  $confirm  Confirmation message; enables a confirmation modal.
     * @param  string|null  $confirmTitle  Title of the confirmation modal.
     * @param  string|null  $startContent  Raw HTML content inserted before the text.
     * @param  string|null  $endContent  Raw HTML content inserted after the text.
     */
    public function __construct(
        public bool $show = true,
        public bool $hide = false,
        public ?string $url = null,
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

        if ($this->confirm !== null) {
            $this->confirmId ??= 'link-button-'.Str::random(32);
        }

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

        return 'components.buttons.link-button';
    }
}
