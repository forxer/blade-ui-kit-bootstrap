<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use InvalidArgumentException;

trait BadgeVariant
{
    private const DEFAULT_VARIANT = 'primary';

    private const ALLOWED_VARIANTS = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
    ];

    private function validBadgeVariant(): void
    {
        $this->variant ??= self::DEFAULT_VARIANT;

        if (! \in_array($this->variant, self::ALLOWED_VARIANTS)) {
            throw new InvalidArgumentException(\sprintf(
                'The badge variant "%s" is not allowed. Allowed badge variant are: %s.',
                e($this->variant),
                implode(', ', self::ALLOWED_VARIANTS)
            ));
        }
    }
}
