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

        $this->text ??= Str::ucfirst(trans('action.archive'));

        $this->formId = 'archive-'.($this->formId ?? Str::random(32));
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.archive';
    }
}
