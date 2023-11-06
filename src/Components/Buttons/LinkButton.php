<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\FormMethod;

class LinkButton extends BladeComponent
{
    use FormMethod;

    public function __construct(
        public ?string $url = null,
        public ?string $title = null,
        public ?string $confirm = null,
        public bool $disabled = false,
    ) {
    }

    public function viewName(): string
    {
        return 'components.buttons.link-button';
    }
}
