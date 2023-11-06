<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\FormMethod;

class Form extends BladeComponent
{
    use FormMethod;

    public function __construct(
        public string $action,
        public bool $hasFiles = false,
        public bool $novalidate = true,
        string $method = 'POST',
    ) {
        $this->method = $this->validFormMethod($method);
    }

    public function viewName(): string
    {
        return 'components.forms.form';
    }
}
