<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Destroy extends FormButton
{
    protected function initAttributes(): void
    {
        $this->method ??= 'DELETE';

        $this->variant ??= 'danger';

        $this->confirmVariant ??= 'danger';

        $this->text ??= Str::ucfirst(trans('action.delete'));

        $this->formId = 'destroy-'.($this->formId ?? Str::random(32));
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.destroy';
    }
}
