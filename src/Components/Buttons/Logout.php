<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

class Logout extends FormButton
{
    public function __construct(string $formId = null, string $action = null)
    {
        $this->action = $action ?? route('logout');

        parent::__construct($formId, $action, 'POST');
    }

    public function viewName(): string
    {
        return 'components.buttons.logout';
    }
}
