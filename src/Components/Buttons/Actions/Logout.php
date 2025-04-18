<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Logout extends FormButton
{
    protected function initAttributes(): void
    {
        $this->method ??= 'POST';

        $this->variant ??= 'secondary';

        $this->text ??= Str::ucfirst(trans('action.logout'));

        $this->formId = 'logout-'.($this->formId ?? Str::random(32));
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.logout';
    }
}
