<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKitBootstrap\Components\BladeComponent;

class Label extends BladeComponent
{
    public function __construct(
        public string $for,
    ) {}

    public function fallback(): string
    {
        return str($this->for)->replace('_', ' ')->ucfirst->toString();
    }

    public function viewName(): ?string
    {
        return 'components.forms.label';
    }
}
