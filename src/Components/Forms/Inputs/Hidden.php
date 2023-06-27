<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

class Hidden extends Input
{
    public function __construct(string $name, string $id = null, ?string $value = '')
    {
        parent::__construct($name, $id, 'hidden', $value);
    }

    public function viewName(): string
    {
        return 'components.forms.inputs.hidden';
    }
}
