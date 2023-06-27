<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

class Time extends Input
{
    public function __construct(string $name, string $id = null, ?string $value = '', ?string $errorBag = null)
    {
        parent::__construct($name, $id, 'time', $value, $errorBag);
    }

    public function viewName(): string
    {
        return 'components.forms.inputs.time';
    }
}
