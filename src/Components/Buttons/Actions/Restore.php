<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Restore extends FormButton
{
    protected function initAttributes(): void
    {
        $this->method = 'PATCH';
        $this->variant = 'warning';

        if ($this->text === null) {
            $this->text = Str::ucfirst(trans('action.restore'));
        }

        if ($this->formId === null) {
            $this->formId = 'restore-'.Str::random(32);
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.restore';
    }
}
