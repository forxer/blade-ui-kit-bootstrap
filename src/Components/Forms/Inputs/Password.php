<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;

class Password extends Input
{
    public function __construct(ViewErrorBag $errors, string $name = 'password', string $id = null, ?string $errorBag = null)
    {
        parent::__construct($errors, $name, $id, 'password', null, $errorBag);
    }

    public function render(): View
    {
        return view('blade-ui-kit-bootstrap::components.forms.inputs.password');
    }
}
