<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions\Modal;

use BladeUIKitBootstrap\Components\Buttons\SimpleButton;

class ConfirmYes extends SimpleButton
{
    protected function initAttributes(): void
    {
        $this->variant ??= 'success';

        $this->text ??= trans('blade-ui-kit-bootstrap::modal.yes');

        parent::initAttributes();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.modal.confirm-yes';
    }
}
