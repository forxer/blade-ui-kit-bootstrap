<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\HasFormMethod;
use Illuminate\Support\Str;

class FormButton extends BladeComponent
{
    use HasFormMethod;

    public function __construct(
        public ?string $formId = null,
        public ?string $action = null,
        string $method = 'POST',
        public bool $hasFiles = false,
        public bool $novalidate = true
    ){
        $this->formId = 'form-button-'.($formId ?? Str::random(32));
        $this->method = $this->validFormMethod($method);
    }

    public function viewName(): string
    {
        return 'components.buttons.form-button';
    }
}
