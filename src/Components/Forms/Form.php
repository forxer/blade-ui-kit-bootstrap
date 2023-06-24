<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKitBootstrap\Components\BladeComponent;

class Form extends BladeComponent
{
    /** @var string|null */
    public $action;

    /** @var string */
    public $method;

    /** @var bool */
    public $hasFiles;

    /** @var bool */
    public bool $novalidate;

    public function __construct(string $action = null, string $method = 'POST', bool $hasFiles = false, bool $novalidate = true)
    {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->hasFiles = $hasFiles;
        $this->novalidate = $novalidate;
    }

    public function viewName(): string
    {
        return 'components.forms.form';
    }
}
