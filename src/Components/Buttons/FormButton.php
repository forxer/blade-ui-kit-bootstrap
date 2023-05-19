<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Concerns\HasBootstrapVersion;
use BladeUIKit\Components\Buttons\FormButton as BukFormButton;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class FormButton extends BukFormButton
{
    use HasBootstrapVersion;

    /** @var string */
    public $formId;

    public function __construct(string $formId = null, string $action = null, string $method = 'POST')
    {
        $this->formId = 'form-button-'.($formId ?? Str::random(32));
        $this->action = $action;
        $this->method = strtoupper($method);
    }

    public function render(): View
    {
        return view($this->viewPath('components.buttons.form-button'));
    }
}
