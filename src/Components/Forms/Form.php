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
        public string $method = 'POST',
        public ?bool $novalidate = null,
    ) {
        $this->method = $this->validFormMethod($method);

        $this->novalidate = $novalidate ?? $this->config('all_forms_with_novalidate');
    }

    public function viewName(): string
    {
        return 'components.forms.form';
    }
}
