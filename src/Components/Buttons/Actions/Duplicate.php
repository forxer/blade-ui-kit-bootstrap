<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Duplicate extends LinkButton
{
    protected function initAttributes(): void
    {
        $this->variant ??= 'warning';

        $this->text ??= Str::ucfirst(trans('action.duplicate'));

        if ($this->confirm !== null) {
            $this->confirmVariant ??= 'warning';
            $this->confirmId = 'duplicate-'.($this->confirmId ?? Str::random(32));
        }

        parent::initAttributes();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.duplicate';
    }
}
