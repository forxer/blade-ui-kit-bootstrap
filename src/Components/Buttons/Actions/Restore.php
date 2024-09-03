<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Restore extends FormButton
{
    protected function initAttributes(): void
    {
        $this->method ??= 'PATCH';
        $this->variant ??= 'warning';

        $this->text ??= Str::ucfirst(trans('action.restore'));

        $this->formId ??= 'restore-'.Str::random(32);
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.restore';
    }
}
