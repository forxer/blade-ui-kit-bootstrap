<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\CanHaveErrors;

class Input extends BladeComponent
{
    use CanHaveErrors;

    public private(set) string $id;

    public private(set) ?string $value;

    /**
     * @param  string  $name  Field `name` attribute (also the default `id`).
     * @param  string  $type  HTML input type. Defaults to `text`.
     * @param  string|null  $value  Initial value (overridden by `old($name)` if present).
     * @param  string|null  $id  `id` attribute. Defaults to the `name` value.
     * @param  string|null  $errorBag  Name of the validation error bag to use.
     */
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
