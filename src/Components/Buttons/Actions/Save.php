<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\SimpleButton;
use Illuminate\Support\Str;

class Save extends SimpleButton
{
    protected function initAttributes(): void
    {
        $this->type ??= 'submit';

        $this->variant ??= 'success';

        $this->text ??= Str::ucfirst(trans('action.save'));

        if ($this->confirm !== null) {
            $this->confirmVariant ??= 'success';
            $this->confirmId = 'save-'.($this->confirmId ?? Str::random(32));
        }
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.save';
    }
}
