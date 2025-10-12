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

    public function __construct(
        public ?string $variant = null,
        public bool $outline = false,
        public bool $noOutline = false,
        public bool $dismissible = false,
        public ?string $title = null,
        public ?string $icon = null,
        public bool $show = true,
        public bool $hide = false,
    ) {
        $this->onConstructing();
        $this->initAttributes();

        if (! $this->show || $this->hide) {
            return;
        }

        $this->validAlertVariant();
        $this->validAlertIcon();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.alerts.alert';
    }
}
