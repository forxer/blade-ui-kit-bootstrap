<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Delete extends FormButton
{
    protected function initAttributes(): void
    {
        $this->method ??= 'PATCH';
        $this->variant ??= 'danger';

        $this->text ??= Str::ucfirst(trans('action.delete'));

        $this->formId ??= 'delete-'.Str::random(32);
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.delete';
    }
}
