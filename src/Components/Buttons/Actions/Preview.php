<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Preview extends LinkButton
{
    protected function initAttributes(): void
    {
        $this->variant ??= 'info';

        $this->text ??= Str::ucfirst(trans('action.preview'));

        if ($this->confirm !== null) {
            $this->confirmVariant ??= 'info';
            $this->confirmId = 'preview-'.($this->confirmId ?? Str::random(32));
        }
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.preview';
    }
}
