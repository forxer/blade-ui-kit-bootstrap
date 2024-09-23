<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions\Modal;

use BladeUIKitBootstrap\Components\Buttons\SimpleButton;
use Illuminate\Support\Str;

class ConfirmNo extends SimpleButton
{
    protected function initAttributes(): void
    {
        $this->variant ??= 'secondary';

        $this->text ??= Str::ucfirst(trans('blade-ui-kit-bootstrap::modal.no'));
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.modal.confirm-no';
    }
}
