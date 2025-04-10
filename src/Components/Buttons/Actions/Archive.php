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

        $this->variant ??= 'danger';

        $this->confirmVariant ??= 'warning';

        $this->text ??= Str::ucfirst(trans('action.archive'));

        $this->formId = 'archive-'.($this->formId ?? Str::random(32));
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.archive';
    }
}
