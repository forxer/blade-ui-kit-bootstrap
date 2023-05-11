<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKitBootstrap\Concerns\HasBootstrapVersion;
use BladeUIKit\Components\Forms\Label as BukLabel;
use Illuminate\Contracts\View\View;

class Label extends BukLabel
{
    use HasBootstrapVersion;

    public function __construct(string $for)
    {
        parent::__construct($for);
    }

    public function render(): View
    {
        return view($this->viewPath('components.forms.label'));
    }
}
