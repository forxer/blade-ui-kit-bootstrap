<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use BladeUIKitBootstrap\Concerns\HasBootstrapVersion;
use Illuminate\Contracts\View\View;

class Date extends Input
{
    use HasBootstrapVersion;

    public function __construct(string $name, string $id = null, ?string $value = '', ?string $errorBag = null)
    {
        parent::__construct($name, $id, 'date', $value, $errorBag);
    }

    public function render(): View
    {
        return view($this->viewPath('components.forms.inputs.date'));
    }
}
