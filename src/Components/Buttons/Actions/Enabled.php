<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Enabled extends FormButton
{
    protected function initAttributes(): void
    {
        $this->method = 'PATCH';
        $this->variant = 'success';

        if ($this->text === null) {
            $this->text = Str::ucfirst(trans('status.enabled'));
        }

        if ($this->formId === null) {
            $this->formId = 'disable-'.Str::random(32);
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.enabled';
    }
}
