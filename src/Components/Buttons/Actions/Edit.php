<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Edit extends LinkButton
{
    protected function initAttributes(): void
    {
        $this->variant ??= 'primary';

        $this->text ??= Str::ucfirst(trans('action.edit'));

        if ($this->confirm !== null) {
            $this->confirmId = 'edit-'.($this->confirmId ?? Str::random(32));
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.edit';
    }
}
