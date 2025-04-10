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

        $this->confirmVariant ??= 'warning';

        $this->text ??= Str::ucfirst(trans('action.enable'));

        $this->formId = 'enable-'.($this->formId ?? Str::random(32));
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.enable';
    }
}
