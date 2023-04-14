<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKitBootstrap\Concerns\CanHaveErrors;
use BladeUIKit\Components\BladeComponent;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\View;

class Error extends BladeComponent
{
    use CanHaveErrors;

    public function __construct(ViewErrorBag $errors, string $field, string $bag = 'default')
    {
        $this->bootCanHaveErrors($errors, $field, $bag);
    }

    public function render(): View
    {
        return view('blade-ui-kit-bootstrap::components.forms.error');
    }
}
