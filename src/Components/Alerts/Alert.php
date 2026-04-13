<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Alerts;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\AlertIcons;
use BladeUIKitBootstrap\Concerns\AlertVariant;

class Alert extends BladeComponent
{
    use AlertIcons;
    use AlertVariant;

    public ?string $variant = null;

    public bool $dismissible = false;

    public ?string $title = null;

    public ?string $icon = null;

    public bool $show = true;

    public bool $hide = false;

    protected function initAttributes(): void
    {
        if (! $this->show || $this->hide) {
            return;
        }

        $this->validAlertVariant();
        $this->validAlertIcon();
    }

    public function viewName(): ?string
    {
        return 'components.alerts.alert';
    }
}
