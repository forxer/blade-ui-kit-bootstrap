<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class RecycleBin extends LinkButton
{
    protected function initAttributes(): void
    {
        $this->variant ??= 'secondary';

        $this->text ??= Str::ucfirst(trans('misc.recycle_bin'));

        if ($this->confirm !== null) {
            $this->confirmId = 'recycle-bin-'.($this->confirmId ?? Str::random(32));
        }
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.recycle-bin';
    }
}
