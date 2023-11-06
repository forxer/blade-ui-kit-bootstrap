<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\FormMethod;
use Illuminate\Support\Str;

class FormButton extends BladeComponent
{
    use FormMethod;

    public function __construct(
        public ?string $action = null,
        public ?string $formId = null,
        public ?string $title = null,
        public ?string $confirm = null,
        public bool $disabled = false,
        public bool $novalidate = true,
        string $method = 'POST',
    ) {
        $this->formId = 'form-button-'.($formId ?? Str::random(32));
        $this->method = $this->validFormMethod($method);
    }

    public function viewName(): string
    {
        return 'components.buttons.form-button';
    }
}
