<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Archive extends FormButton
{
    protected function initAttributes(): void
    {
        $this->method ??= 'PATCH';
        $this->variant = 'danger';

        if ($this->text === null) {
            $this->text = Str::ucfirst(trans('action.archive'));
        }

        if ($this->formId === null) {
            $this->formId = 'archive-'.Str::random(32);
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.archive';
    }
}
