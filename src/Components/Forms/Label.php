<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKitBootstrap\Components\BladeComponent;
use Illuminate\Support\Str;

class Label extends BladeComponent
{
    public function __construct(
        public string $for,
    ) {
    }

    public function fallback(): string
    {
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }

    public function viewName(): string
    {
        return 'components.forms.label';
    }
}
