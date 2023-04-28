<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use BladeUIKitBootstrap\Concerns\CanHaveErrors;
use BladeUIKit\Components\Forms\Inputs\Textarea as BukTextarea;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;

class Textarea extends BukTextarea
{
    use CanHaveErrors;

    public function __construct(string $name, string $id = null, $rows = 3, ?string $errorBag = null)
    {
        parent::__construct($name, $id, $rows);

        $this->bootCanHaveErrors($name, $errorBag);
    }

    public function render(): View
    {
        return view('blade-ui-kit-bootstrap::components.forms.inputs.textarea');
    }
}
