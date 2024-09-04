<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class MoveDown extends FormButton
{
    protected function initAttributes(): void
    {
        $this->method ??= 'PATCH';

        $this->variant ??= 'secondary';

        $this->text ??= Str::ucfirst(trans('action.down'));

        $this->formId ??= 'move-down-'.Str::random(32);
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.move-down';
    }
}
