<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKitBootstrap\Concerns\HasBootstrapVersion;
use BladeUIKit\Components\Forms\Form as BukForm;
use Illuminate\Contracts\View\View;

class Form extends BukForm
{
    use HasBootstrapVersion;

    /** @var bool */
    public $novalidate;

    public function __construct(string $action = null, string $method = 'POST', bool $hasFiles = false, bool $novalidate = true)
    {
        parent::__construct($action, $method, $hasFiles);

        $this->novalidate = $novalidate;
    }

    public function render(): View
    {
        return view($this->viewPath('components.forms.form'));
    }
}
