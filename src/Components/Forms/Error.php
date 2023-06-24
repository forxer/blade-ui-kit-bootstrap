<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\CanHaveErrors;

class Error extends BladeComponent
{
    use CanHaveErrors;

    /** @var string */
    public $field;

    /** @var string */
    public $bag;

    public function __construct(string $field, string $bag = 'default')
    {
        $this->bootCanHaveErrors($field, $bag);
    }

    public function viewName(): string
    {
        return 'components.forms.error';
    }
}
