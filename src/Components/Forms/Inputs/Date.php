<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

class Date extends Input
{
    public function __construct(string $name, string $id = null, ?string $value = '', ?string $errorBag = null)
    {
        parent::__construct($name, $id, 'date', $value, $errorBag);
    }

    public function viewName(): string
    {
        return 'components.forms.inputs.date';
    }
}
