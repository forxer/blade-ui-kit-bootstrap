<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use BladeUIKitBootstrap\Concerns\CanHaveErrors;
use BladeUIKit\Components\Forms\Inputs\Input as BukInput;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;

class Input extends BukInput
{
    use CanHaveErrors;

    public function __construct(ViewErrorBag $errors, string $name, string $id = null, string $type = 'text', ?string $value = '', ?string $errorBag = null)
    {
        parent::__construct($name, $id, $type, $value, $errorBag);

        $this->bootCanHaveErrors($errors, $name, $errorBag);
    }

    public function render(): View
    {
        return view('blade-ui-kit-bootstrap::components.forms.inputs.input');
    }
}
