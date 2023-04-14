<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKit\Components\Forms\Label as BukLabel;
use Illuminate\Contracts\View\View;

class Label extends BukLabel
{
    public function __construct(string $for)
    {
        parent::__construct($for);
    }

    public function render(): View
    {
        return view('blade-ui-kit-bootstrap::components.forms.label');
    }
}
