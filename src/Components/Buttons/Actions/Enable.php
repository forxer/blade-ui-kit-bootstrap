<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Enable extends FormButton
{
    protected function initAttributes(): void
    {
        $this->method ??= 'PATCH';

        $this->variant ??= 'success';

        $this->text ??= Str::ucfirst(trans('action.enable'));

        $this->formId ??= 'enable-'.Str::random(32);
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.enable';
    }
}
