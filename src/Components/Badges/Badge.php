<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Badges;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\BadgeVariant;

class Badge extends BladeComponent
{
    use BadgeVariant;

    /**
     * Bootstrap color variant of the badge. Defaults to `primary`.
     *
     * @var 'primary'|'secondary'|'success'|'danger'|'warning'|'info'|'light'|'dark'|null
     */
    public ?string $variant = null;

    /** Pill style (rounded corners). */
    public bool $pill = false;

    /** Display the badge. Defaults to `true`. */
    public bool $show = true;

    /** Force-hide the badge (takes precedence over `show`). */
    public bool $hide = false;

    protected function initAttributes(): void
    {
        if (! $this->show || $this->hide) {
            return;
        }

        $this->validBadgeVariant();
    }

    public function viewName(): ?string
    {
        return 'components.badges.badge';
    }
}
