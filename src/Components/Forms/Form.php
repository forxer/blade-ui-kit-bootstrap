<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\HasFormMethod;

class Form extends BladeComponent
{
    use HasFormMethod;

    public function __construct(
        public ?string $action = null,
        string $method = 'POST',
        public bool $hasFiles = false,
        public bool $novalidate = true
    ) {
        $this->method = $this->validFormMethod($method);
    }

    public function viewName(): string
    {
        return 'components.forms.form';
    }
}
