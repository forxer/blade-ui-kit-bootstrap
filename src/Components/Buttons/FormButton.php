<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\BtnVariant;
use BladeUIKitBootstrap\Concerns\FormMethod;
use Illuminate\Support\Str;

class FormButton extends BladeComponent
{
    use BtnVariant;
    use FormMethod;

    public function __construct(
        public string $action,
        public ?string $text = null,
        public ?string $formId = null,
        public ?string $title = null,
        public ?string $confirm = null,
        public bool $disabled = false,
        public bool $novalidate = true,
        string $method = 'POST',
        string $variant = 'primary',
    ) {
        $this->formId = $formId ?? 'form-button-'.Str::random(32);
        $this->method = $this->validFormMethod($method);
        $this->variant = $this->validBtnVariant($variant);
    }

    public function viewName(): string
    {
        return 'components.buttons.form-button';
    }
}
