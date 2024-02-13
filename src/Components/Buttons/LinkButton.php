<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\BtnVariant;
use Illuminate\Support\Str;

class LinkButton extends BladeComponent
{
    use BtnVariant;

    public function __construct(
        public ?string $url = null,
        public ?string $text = null,
        public ?string $title = null,
        public ?string $confirm = null,
        public ?string $confirmId = null,
        public bool $disabled = false,
        string $variant = 'primary',
    ) {
        if ($confirm !== null) {
            $this->confirmId = $confirmId ?? Str::random(32);
        }

        $this->variant = $this->validBtnVariant($variant);
    }

    public function viewName(): string
    {
        return 'components.buttons.link-button';
    }
}
