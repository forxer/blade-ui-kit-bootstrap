<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Disable extends FormButton
{
    protected function initAttributes(): void
    {
        $this->method ??= 'PATCH';

        $this->variant ??= 'warning';

        $this->confirmVariant ??= 'warning';

        $this->text ??= Str::ucfirst(trans('action.disable'));

        $this->formId = 'disable-'.($this->formId ?? Str::random(32));
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.disable';
    }
}
