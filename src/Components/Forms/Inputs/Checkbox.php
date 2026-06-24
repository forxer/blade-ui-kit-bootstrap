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

    /**
     * @param  string  $name  Field `name` attribute (also the default `id`).
     * @param  string  $label  Label text displayed next to the checkbox.
     * @param  string  $value  Value submitted when the checkbox is checked. Defaults to `1`.
     * @param  bool|null  $checked  Initial checked state (overridden by `old($name)` when present).
     * @param  string|null  $id  `id` attribute. Defaults to the `name` value.
     * @param  string|null  $errorBag  Name of the validation error bag to use.
     */
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

        $this->isChecked = $oldValue !== null ? $oldValue === $this->value : $checked ?? false;

        $this->bootCanHaveErrors($name, $errorBag);
    }

    public function viewName(): ?string
    {
        return 'components.forms.inputs.checkbox';
    }
}
