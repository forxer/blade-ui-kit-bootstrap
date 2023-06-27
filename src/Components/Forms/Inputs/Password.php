<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

class Password extends Input
{
    public function __construct(string $name = 'password', string $id = null, ?string $errorBag = null)
    {
        parent::__construct($name, $id, 'password', null, $errorBag);
    }

    public function viewName(): string
    {
        return 'components.forms.inputs.password';
    }
}
