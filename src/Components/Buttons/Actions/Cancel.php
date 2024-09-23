<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\SimpleButton;
use Illuminate\Support\Str;

class Cancel extends SimpleButton
{
    protected function initAttributes(): void
    {
        $this->type ??= 'button';

        $this->variant ??= 'secondary';

        $this->text ??= Str::ucfirst(trans('action.cancel'));

        if ($this->confirm !== null) {
            $this->confirmId = 'cancel-'.($this->confirmId ?? Str::random(32));
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.cancel';
    }
}
