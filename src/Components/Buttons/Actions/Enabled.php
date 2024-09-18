<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Enabled extends FormButton
{
    protected function initAttributes(): void
    {
        $this->method ??= 'PATCH';

        $this->variant ??= 'success';

        $this->text ??= Str::ucfirst(trans('status.enabled'));

        $this->formId = 'disable-'.($this->formId ?? Str::random(32));
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.enabled';
    }
}
