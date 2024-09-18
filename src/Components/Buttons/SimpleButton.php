<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\BtnIcons;
use BladeUIKitBootstrap\Concerns\BtnSize;
use BladeUIKitBootstrap\Concerns\BtnType;
use BladeUIKitBootstrap\Concerns\BtnVariant;
use Illuminate\Support\Str;

class SimpleButton extends BladeComponent
{
    use BtnIcons;
    use BtnSize;
    use BtnType;
    use BtnVariant;

    public function __construct(
        public ?string $text = null,
        public bool $hideText = false,
        public ?string $title = null,
        public ?string $variant = null,
        public bool $outline = false,
        public bool $noOutline = false,
        public ?string $size = null,
        public bool $lg = false,
        public bool $sm = false,
        public bool $disabled = false,
        public ?string $confirm = null,
        public ?string $confirmId = null,
        public ?string $formId = null,
        public ?string $type = null,
        public ?string $startContent = null,
        public ?string $endContent = null,
        public ?string $icon = null,
        public ?string $startIcon = null,
        public ?string $endIcon = null,
    ) {
        $this->initAttributes();
        $this->onConstructing();

        if ($this->confirm !== null) {
            $this->confirmId = 'simple-button-'.($this->confirmId ?? Str::random(32));
        }

        $this->validBtnType(self::DEFAULT_BUTTON_TYPE);
        $this->validBtnVariant();
        $this->validBtnSize();
        $this->validBtnStartIcon();
        $this->validBtnEndIcon();
    }

    public function viewName(): string
    {
        return 'components.buttons.simple-button';
    }
}
