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

    public bool $hideText = false;

    public ?string $variant = null;

    public bool $outline = false;

    public bool $noOutline = false;

    public ?string $size = null;

    public bool $lg = false;

    public bool $sm = false;

    public bool $disabled = false;

    public ?string $confirmId = null;

    public ?string $confirmVariant = null;

    public ?string $icon = null;

    public ?string $startIcon = null;

    public ?string $endIcon = null;

    /**
     * Content properties (title, text, confirm, start/end content, url) are declared as
     * constructor parameters — not as bare public properties — on purpose: Blade applies
     * `sanitizeComponentAttribute()` (i.e. `e()`) to bound attributes that are NOT constructor
     * parameters. Since these values are rendered raw (`{!! !!}`) so the caller can pass HTML,
     * keeping them as constructor parameters preserves the "caller escapes" contract and avoids
     * the double escaping that would otherwise occur for pre-escaped or HTML content.
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
