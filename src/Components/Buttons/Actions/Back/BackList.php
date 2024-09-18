<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions\Back;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class BackList extends LinkButton
{
    protected function initAttributes(): void
    {
        $this->variant ??= 'secondary';

        $this->text ??= Str::ucfirst(trans('back.list'));

        if ($this->confirm !== null) {
            $this->confirmId = 'back-list-'.($this->confirmId ?? Str::random(32));
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.back.back-list';
    }
}
