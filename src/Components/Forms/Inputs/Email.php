<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;

class Email extends Input
{
    public function __construct(ViewErrorBag $errors, string $name = 'email', string $id = null, ?string $value = '', ?string $errorBag = null)
    {
        parent::__construct($errors, $name, $id, 'email', $value, $errorBag);
    }

    public function render(): View
    {
        return view('blade-ui-kit-bootstrap::components.forms.inputs.email');
    }
}
