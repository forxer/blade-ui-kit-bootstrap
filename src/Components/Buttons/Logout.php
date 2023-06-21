<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use Illuminate\Contracts\View\View;

class Logout extends FormButton
{
    /** @var string */
    public $action;

    public function __construct(string $formId = null, string $action = null)
    {
        $this->action = $action ?? route('logout');

        parent::__construct($formId, $action, 'POST');
    }

    public function render(): View
    {
        return view($this->viewPath('components.buttons.logout'));
    }
}
