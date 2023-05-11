<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKitBootstrap\Concerns\CanHaveErrors;
use BladeUIKitBootstrap\Concerns\HasBootstrapVersion;
use BladeUIKit\Components\BladeComponent;
use Illuminate\View\View;

class Error extends BladeComponent
{
    use CanHaveErrors;
    use HasBootstrapVersion;

    public function __construct(string $field, string $bag = 'default')
    {
        $this->bootCanHaveErrors($field, $bag);
    }

    public function render(): View
    {
        return view($this->viewPath('components.forms.error'));
    }
}
