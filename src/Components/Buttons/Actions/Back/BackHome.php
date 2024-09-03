<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions\Back;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class BackHome extends LinkButton
{
    protected function initAttributes(): void
    {
        $this->variant ??= 'primary';

        $this->text ??= Str::ucfirst(trans('back.home'));

        if ($this->confirm !== null && $this->confirmId === null) {
            $this->confirmId = 'back-'.Str::random(32);
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.back.back-home';
    }
}
