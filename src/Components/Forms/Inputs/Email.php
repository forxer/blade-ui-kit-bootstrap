<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

class Email extends Input
{
    public function __construct(
        string $name,
        ?string $value = null,
        ?string $id = null,
        ?string $errorBag = null,
    ) {
        parent::__construct(
            name: $name,
            type: 'email',
            value: $value,
            id: $id,
            errorBag: $errorBag,
        );
    }

    public function viewName(): ?string
    {
        return 'components.forms.inputs.email';
    }
}
