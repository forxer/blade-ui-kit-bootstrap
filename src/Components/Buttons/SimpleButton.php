<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\BtnType;
use BladeUIKitBootstrap\Concerns\BtnVariant;
use Illuminate\Support\Str;

class SimpleButton extends BladeComponent
{
    use BtnType;
    use BtnVariant;

    public function __construct(
        public ?string $text = null,
        public ?string $title = null,
        public ?string $formId = null,
        public ?string $confirm = null,
        public ?string $confirmId = null,
        public bool $outline = false,
        public bool $noOutline = false,
        public bool $disabled = false,
        string $variant = 'primary',
        string $type = 'button',
    ) {
        if ($confirm !== null) {
            $this->confirmId = $confirmId ?? Str::random(32);
        }

        $this->type = $this->validType($type);
        $this->variant = $this->validBtnVariant($variant, $outline, $noOutline);
    }

    public function viewName(): string
    {
        return 'components.buttons.button';
    }
}
