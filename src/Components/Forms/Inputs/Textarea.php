<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\CanHaveErrors;

class Textarea extends BladeComponent
{
    use CanHaveErrors;

    /** `id` attribute of the textarea. Defaults to the `name` value. */
    public string $id;

    /**
     * @param  string  $name  Field `name` attribute (also the default `id`).
     * @param  string|null  $id  `id` attribute. Defaults to the `name` value.
     * @param  string|null  $errorBag  Name of the validation error bag to use.
     */
    public function __construct(
        public string $name,
        ?string $id = null,
        ?string $errorBag = null
    ) {
        $this->id = $id ?? $name;

        $this->bootCanHaveErrors($name, $errorBag);
    }

    public function viewName(): ?string
    {
        return 'components.forms.inputs.textarea';
    }
}
