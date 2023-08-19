<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\CanHaveErrors;

class Error extends BladeComponent
{
    use CanHaveErrors;

    public function __construct(
        public string $field,
        public string $bag = 'default'
    ) {
        $this->bootCanHaveErrors($field, $bag);
    }

    public function viewName(): string
    {
        return 'components.forms.error';
    }
}
