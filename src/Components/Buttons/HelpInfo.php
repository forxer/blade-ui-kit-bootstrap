<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\BtnIcons;
use BladeUIKitBootstrap\Concerns\BtnSize;
use BladeUIKitBootstrap\Concerns\BtnVariant;
use Illuminate\Support\Str;

class HelpInfo extends BladeComponent
{
    use BtnIcons;
    use BtnSize;
    use BtnVariant;

    /** Hide the button text (render icons only). */
    public bool $hideText = false;

    /**
     * Bootstrap color variant of the button. Defaults to `link`.
     *
     * @var 'primary'|'secondary'|'success'|'danger'|'warning'|'info'|'light'|'dark'|'link'|'outline-primary'|'outline-secondary'|'outline-success'|'outline-danger'|'outline-warning'|'outline-info'|'outline-light'|'outline-dark'|null The `outline-*` values are only valid in Bootstrap 5.
     */
    public ?string $variant = 'link';

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

    /** Single icon (backward-compatible alias of `startIcon`). */
    public ?string $icon = null;

    /** Icon displayed before the text. */
    public ?string $startIcon = null;

    /**
     * Content properties are declared as constructor parameters — not bare public properties — so
     * Blade does NOT apply `sanitizeComponentAttribute()` (`e()`) to them. They are rendered raw
     * (`{!! !!}`) to allow HTML, so the "caller escapes" contract is preserved and pre-escaped or
     * HTML content is not double escaped.
     *
     * @param  bool  $show  Display the button. Defaults to `true`.
     * @param  bool  $hide  Force-hide the button (takes precedence over `show`).
     * @param  string|null  $content  Help content to display (raw HTML allowed).
     * @param  string|null  $text  Button label (raw HTML allowed).
     * @param  string|null  $title  `title` attribute (raw HTML allowed).
     */
    public function __construct(
        public bool $show = true,
        public bool $hide = false,
        public ?string $content = null,
        public ?string $text = null,
        public ?string $title = null,
    ) {}

    protected function initAttributes(): void
    {
        if (! $this->show || $this->hide) {
            return;
        }

        $this->text ??= Str::ucfirst(trans('status.info'));

        $this->validBtnVariant();
        $this->validBtnSize();
        $this->validBtnStartIcon();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.help-info';
    }
}
