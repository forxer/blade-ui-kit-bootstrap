<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use InvalidArgumentException;

trait AlertVariant
{
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

    private function validAlertVariant(): void
    {
        if ($this->variant === null) {
            return;
        }

        if (! \in_array($this->variant, self::ALLOWED_VARIANTS)) {
            throw new InvalidArgumentException(\sprintf(
                'The alert variant "%s" is not allowed. Allowed alert variant are: %s.',
                e($this->variant),
                implode(', ', self::ALLOWED_VARIANTS)
            ));
        }
    }
}
