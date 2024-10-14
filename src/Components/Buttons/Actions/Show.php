<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Show extends LinkButton
{
    protected function initAttributes(): void
    {
        $this->variant ??= 'info';

        $this->text ??= Str::ucfirst(trans('action.show'));

        if ($this->confirm !== null) {
            $this->confirmVariant ??= 'info';
            $this->confirmId = 'show-'.($this->confirmId ?? Str::random(32));
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.show';
    }
}
