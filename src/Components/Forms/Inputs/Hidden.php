<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

class Hidden extends Input
{
    public function __construct(
        string $name,
        ?string $value = null,
        ?string $id = null,
    ) {
        parent::__construct(
            name: $name,
            type: 'hidden',
            value: $value,
            id: $id,
        );
    }

    public function viewName(): string
    {
        return 'components.forms.inputs.hidden';
    }
}
