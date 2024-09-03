<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions\Back;

use Illuminate\Support\Str;

class BackList extends Back
{
    protected function initAttributes(): void
    {
        $this->variant = 'secondary';

        $this->text ??= Str::ucfirst(trans('back.list'));
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.back.back-list';
    }
}
