<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Badges;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\BadgeVariant;

class Badge extends BladeComponent
{
    use BadgeVariant;

    public ?string $variant = null;

    public bool $pill = false;

    public bool $show = true;

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
