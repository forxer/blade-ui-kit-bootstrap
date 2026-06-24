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

    /**
     * @param  string  $name  Field `name` attribute.
     * @param  string  $label  Label text displayed next to the radio.
     * @param  string  $value  Value submitted when this radio is selected.
     * @param  mixed  $checked  Initial selected value or boolean (overridden by `old($name)` when present).
     * @param  string|null  $id  `id` attribute. Defaults to `{name}-{value}`.
     * @param  string|null  $errorBag  Name of the validation error bag to use.
     */
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

        $this->isChecked = $oldValue !== null ? (string) $oldValue === $this->value : $this->isValueChecked($checked);

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
