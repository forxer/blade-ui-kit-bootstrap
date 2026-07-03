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

    /** Icon displayed in the alert (format defined by `alert_icon_format`). */
    public ?string $icon = null;

    /** Display the alert. Defaults to `true`. */
    public bool $show = true;

    /** Force-hide the alert (takes precedence over `show`). */
    public bool $hide = false;

    /**
     * The `title` content property is declared as a constructor parameter — not a bare public
     * property — on purpose: Blade applies `sanitizeComponentAttribute()` (i.e. `e()`) to bound
     * attributes that are NOT constructor parameters. Since the title is rendered raw (`{!! !!}`)
     * so the caller can pass HTML, keeping it a constructor parameter preserves the "caller
     * escapes" contract and avoids the double escaping that would otherwise occur for pre-escaped
     * or HTML content.
     *
     * @param  string|null  $title  Title displayed at the top of the alert (raw HTML allowed).
     */
    public function __construct(
        public ?string $title = null,
    ) {}

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
