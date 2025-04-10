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
        public string $method = 'POST',
        public bool $hasFiles = false,
        public ?bool $novalidate = null,
    ) {
        $this->validFormMethod();

        if ($this->novalidate === null) {
            $this->novalidate = $this->config('all_forms_with_novalidate');
        }
    }

    public function viewName(): ?string
    {
        return 'components.forms.form';
    }
}
