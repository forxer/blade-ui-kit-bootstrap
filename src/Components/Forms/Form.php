<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKit\Components\Forms\Form as BukForm;
use Illuminate\Contracts\View\View;

class Form extends BukForm
{
    /** @var bool */
    public $novalidate;

    public function __construct(string $action = null, string $method = 'POST', bool $hasFiles = false, bool $novalidate = true)
    {
        parent::__construct($action, $method, $hasFiles);

        $this->novalidate = $novalidate;
    }

    public function render(): View
    {
        return view('blade-ui-kit-bootstrap::components.forms.form');
    }
}
