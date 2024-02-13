<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\BtnVariant;

class Button extends BladeComponent
{
    use BtnVariant;

    public function __construct(
        public ?string $text = null,
        public ?string $title = null,
        public bool $disabled = false,
        string $variant = 'primary',
    ) {
        $this->variant = $this->validBtnVariant($variant);
    }

    public function viewName(): string
    {
        return 'components.buttons.button';
    }
}
