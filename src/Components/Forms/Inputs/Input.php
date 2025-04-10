<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\CanHaveErrors;

class Input extends BladeComponent
{
    use CanHaveErrors;

    public string $id;

    public ?string $value;

    public function __construct(
        public string $name,
        public string $type = 'text',
        ?string $value = null,
        ?string $id = null,
        ?string $errorBag = null
    ) {
        $this->value = old($name, $value ?? '');
        $this->id = $id ?? $name;

        $this->bootCanHaveErrors($name, $errorBag);
    }

    public function viewName(): ?string
    {
        return 'components.forms.inputs.input';
    }
}
