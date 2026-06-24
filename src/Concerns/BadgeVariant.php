<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use BladeUIKitBootstrap\Enums\BadgeVariant as BadgeVariantEnum;
use InvalidArgumentException;

trait BadgeVariant
{
    private const DEFAULT_VARIANT = 'primary';

    private function validBadgeVariant(): void
    {
        $this->variant ??= self::DEFAULT_VARIANT;

        if (! \in_array($this->variant, BadgeVariantEnum::values(), true)) {
            throw new InvalidArgumentException(\sprintf(
                'The badge variant "%s" is not allowed. Allowed badge variant are: %s.',
                e($this->variant),
                implode(', ', BadgeVariantEnum::values())
            ));
        }
    }
}
