<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions\Back;

use Illuminate\Support\Str;

class BackHome extends Back
{
    protected function initAttributes(): void
    {
        $this->variant = 'primary';

        if ($this->text === null) {
            $this->text = Str::ucfirst(trans('back.home'));
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.back.back-home';
    }
}
