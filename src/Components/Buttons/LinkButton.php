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

    public function __construct(
        public string $url,
        public ?string $text = null,
        public bool $hideText = false,
        public ?string $title = null,
        public string $variant = 'primary',
        public bool $outline = false,
        public bool $noOutline = false,
        public ?string $size = null,
        public bool $lg = false,
        public bool $sm = false,
        public bool $disabled = false,
        public ?string $confirm = null,
        public ?string $confirmId = null,
        public ?string $startContent = null,
        public ?string $endContent = null,
        public ?string $icon = null,
        public ?string $startIcon = null,
        public ?string $endIcon = null,
    ) {
        if ($confirm !== null) {
            $this->confirmId = $confirmId ?? Str::random(32);
        }

        $this->variant = $this->validBtnVariant($variant, $outline, $noOutline);
        $this->size = $this->validBtnSize($size, $lg, $sm);
        $this->startIcon = $this->validBtnStartIcon($icon, $startIcon);
        $this->endIcon = $this->validBtnEndIcon($endIcon);
    }

    public function viewName(): string
    {
        return 'components.buttons.link-button';
    }
}
