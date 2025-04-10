<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

class Password extends Input
{
    public function __construct(
        string $name,
        ?string $id = null,
        ?string $errorBag = null
    ) {
        parent::__construct(
            name: $name,
            type: 'password',
            value: null,
            id: $id,
            errorBag: $errorBag,
        );
    }

    public function viewName(): ?string
    {
        return 'components.forms.inputs.password';
    }
}
