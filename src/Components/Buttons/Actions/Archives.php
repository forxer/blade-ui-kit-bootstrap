<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Archives extends LinkButton
{
    protected function initAttributes(): void
    {
        $this->variant = 'secondary';

        if ($this->text === null) {
            $this->text = Str::ucfirst(trans('misc.archives'));
        }

        if ($this->confirm !== null && $this->confirmId === null) {
            $this->confirmId = 'archives-'.Str::random(32);
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.archives';
    }
}
