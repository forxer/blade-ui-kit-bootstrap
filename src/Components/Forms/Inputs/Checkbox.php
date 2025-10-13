<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\CanHaveErrors;

class Checkbox extends BladeComponent
{
    use CanHaveErrors;

    public private(set) string $id;

    public private(set) bool $isChecked;

    public function __construct(
        public string $name,
        public string $label,
        public string $value = '1',
        ?bool $checked = null,
        ?string $id = null,
        ?string $errorBag = null
    ) {
        $this->id = $id ?? $name;

        // Determine checked state: old() takes precedence, then explicit checked param
        $oldValue = old($name);

        if ($oldValue !== null) {
            $this->isChecked = $oldValue === $this->value;
        } else {
            $this->isChecked = $checked ?? false;
        }

        $this->bootCanHaveErrors($name, $errorBag);
    }

    public function viewName(): ?string
    {
        return 'components.forms.inputs.checkbox';
    }
}
