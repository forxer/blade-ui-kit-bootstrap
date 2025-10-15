<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\CanHaveErrors;

class Radio extends BladeComponent
{
    use CanHaveErrors;

    public private(set) string $id;

    public private(set) bool $isChecked;

    public function __construct(
        public string $name,
        public string $label,
        public string $value,
        mixed $checked = null,
        ?string $id = null,
        ?string $errorBag = null
    ) {
        // For radio buttons, ID should be unique. If not provided, use name-value
        $this->id = $id ?? $name.'-'.$value;

        // Determine checked state: old() takes precedence, then explicit checked param
        $oldValue = old($name);

        if ($oldValue !== null) {
            $this->isChecked = (string) $oldValue === $this->value;
        } else {
            $this->isChecked = $this->isValueChecked($checked);
        }

        $this->bootCanHaveErrors($name, $errorBag);
    }

    public function viewName(): ?string
    {
        return 'components.forms.inputs.radio';
    }

    /**
     * Determine if the given value matches and should be checked.
     */
    protected function isValueChecked(mixed $checked): bool
    {
        if ($checked === null) {
            return false;
        }

        if (\is_bool($checked)) {
            return $checked;
        }

        return (string) $checked === $this->value;
    }
}
