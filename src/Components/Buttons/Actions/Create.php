<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Create extends LinkButton
{
    protected function initAttributes(): void
    {
        $this->variant = 'primary';

        if ($this->text === null) {
            $this->text = Str::ucfirst(trans('action.add'));
        }

        if ($this->confirm !== null && $this->confirmId === null) {
            $this->confirmId = 'create-'.Str::random(32);
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.create';
    }
}
