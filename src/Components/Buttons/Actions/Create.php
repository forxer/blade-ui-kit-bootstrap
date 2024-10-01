<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Create extends LinkButton
{
    protected function initAttributes(): void
    {
        $this->variant ??= 'primary';

        $this->confirmVariant ??= 'variant';

        $this->text ??= Str::ucfirst(trans('action.add'));

        if ($this->confirm !== null) {
            $this->confirmId = 'create-'.($this->confirmId ?? Str::random(32));
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.create';
    }
}
