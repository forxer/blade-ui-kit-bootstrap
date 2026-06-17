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

    public bool $hideText = false;

    public ?string $variant = 'link';

    public bool $outline = false;

    public bool $noOutline = false;

    public ?string $size = null;

    public bool $lg = false;

    public bool $sm = false;

    public ?string $icon = null;

    public ?string $startIcon = null;

    /**
     * Content properties are declared as constructor parameters — not bare public properties — so
     * Blade does NOT apply `sanitizeComponentAttribute()` (`e()`) to them. They are rendered raw
     * (`{!! !!}`) to allow HTML, so the "caller escapes" contract is preserved and pre-escaped or
     * HTML content is not double escaped.
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
