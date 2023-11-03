<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\CanHaveErrors;

class Textarea extends BladeComponent
{
    use CanHaveErrors;

    public string $id;

    public function __construct(
        public string $name,
        string $id = null,
        string $errorBag = null
    ) {
        $this->id = $id ?? $name;

        $this->bootCanHaveErrors($name, $errorBag);
    }

    public function viewName(): string
    {
        return 'components.forms.inputs.textarea';
    }
}
