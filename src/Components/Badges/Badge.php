<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Badges;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\BadgeVariant;

class Badge extends BladeComponent
{
    use BadgeVariant;

    public function __construct(
        public ?string $variant = null,
        public bool $pill = false,
        public bool $show = true,
        public bool $hide = false,
    ) {
        $this->onConstructing();
        $this->initAttributes();

        if (! $this->show || $this->hide) {
            return;
        }

        $this->validBadgeVariant();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.badges.badge';
    }
}
