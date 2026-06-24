<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\CanHaveErrors;

class Error extends BladeComponent
{
    use CanHaveErrors;

    /**
     * @param  string  $field  Name of the field whose validation errors are displayed.
     * @param  string  $bag  Name of the error bag to use. Defaults to `default`.
     */
    public function __construct(
        public string $field,
        public string $bag = 'default',
    ) {
        $this->bootCanHaveErrors($field, $bag);
    }

    public function viewName(): ?string
    {
        return 'components.forms.error';
    }
}
