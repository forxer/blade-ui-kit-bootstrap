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

        if ($this->confirm !== null) {
            $this->confirmId = 'back-home-'.($this->confirmId ?? Str::random(32));
        }
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.back.back-home';
    }
}
