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

    /**
     * Bootstrap color variant of the alert. `null` means no variant applied.
     *
     * @var 'primary'|'secondary'|'success'|'danger'|'warning'|'info'|'light'|'dark'|null
     */
    public ?string $variant = null;

    /** Add a dismiss (close) button to the alert. */
    public bool $dismissible = false;

    /** Title displayed at the top of the alert. */
    public ?string $title = null;

    /** Icon displayed in the alert (format defined by `alert_icon_format`). */
    public ?string $icon = null;

    /** Display the alert. Defaults to `true`. */
    public bool $show = true;

    /** Force-hide the alert (takes precedence over `show`). */
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
