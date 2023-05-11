<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use BladeUIKitBootstrap\Concerns\CanHaveErrors;
use BladeUIKitBootstrap\Concerns\HasBootstrapVersion;
use BladeUIKit\Components\Forms\Inputs\Textarea as BukTextarea;
use Illuminate\Contracts\View\View;

class Textarea extends BukTextarea
{
    use CanHaveErrors;
    use HasBootstrapVersion;

    public function __construct(string $name, string $id = null, $rows = 3, ?string $errorBag = null)
    {
        parent::__construct($name, $id, $rows);

        $this->bootCanHaveErrors($name, $errorBag);
    }

    public function render(): View
    {
        return view($this->viewPath('components.forms.inputs.textarea'));
    }
}
