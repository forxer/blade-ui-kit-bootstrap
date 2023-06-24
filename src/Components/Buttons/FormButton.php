<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Components\BladeComponent;
use Illuminate\Support\Str;

class FormButton extends BladeComponent
{
    /** @var string */
    public $formId;

    /** @var string|null */
    public $action;

    /** @var string */
    public $method;

    public function __construct(string $formId = null, string $action = null, string $method = 'POST')
    {
        $this->formId = 'form-button-'.($formId ?? Str::random(32));
        $this->action = $action;
        $this->method = strtoupper($method);
    }

    public function viewName(): string
    {
        return 'components.buttons.form-button';
    }
}
