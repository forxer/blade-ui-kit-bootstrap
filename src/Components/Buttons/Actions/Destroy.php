<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Destroy extends FormButton
{
    protected function initAttributes(): void
    {
        $this->method = 'DELETE';
        $this->variant = 'danger';

        if ($this->text === null) {
            $this->text = Str::ucfirst(trans('action.delete'));
        }

        if ($this->formId === null) {
            $this->formId = 'destroy-'.Str::random(32);
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.destroy';
    }
}
