<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\CanHaveErrors;

class Textarea extends BladeComponent
{
    use CanHaveErrors;

    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var int */
    public $rows;

    public function __construct(string $name, string $id = null, $rows = 3, ?string $errorBag = null)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->rows = $rows;

        $this->bootCanHaveErrors($name, $errorBag);
    }

    public function viewName(): string
    {
        return 'components.forms.inputs.textarea';
    }
}
