<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use BladeUIKitBootstrap\Components\Forms\Concerns\CanHaveError;
use BladeUIKit\Components\Forms\Inputs\Input as BukInput;
use Illuminate\Contracts\View\View;

class Input extends BukInput
{
    use CanHaveError;

    public function __construct(string $name, string $id = null, string $type = 'text', ?string $value = '', ?string $errorBag = null)
    {
        parent::__construct($name, $id, $type, $value);

        $this->errorField($name);
        $this->errorBag($errorBag);
    }

    public function render(): View
    {
        return view('blade-ui-kit-bootstrap::components.forms.inputs.input');
    }
}
