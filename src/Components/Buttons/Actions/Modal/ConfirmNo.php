<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions\Modal;

use BladeUIKitBootstrap\Components\Buttons\SimpleButton;

class ConfirmNo extends SimpleButton
{
    protected function initAttributes(): void
    {
        $this->variant ??= 'secondary';

        $this->text ??= trans('blade-ui-kit-bootstrap::modal.no');

        parent::initAttributes();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.modal.confirm-no';
    }
}
