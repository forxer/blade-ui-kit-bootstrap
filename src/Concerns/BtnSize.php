<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use InvalidArgumentException;

trait BtnSize
{
    private const ALLOWED_BUTTON_SIZE = [
        'lg',
        'sm',
    ];

    private function validBtnSize(?string $size = null, bool $lg = false, bool $sm = false): ?string
    {
        if ($size !== null) {
            $size = strtolower(trim($size));
        } elseif ($lg) {
            $size = 'lg';
        } elseif ($sm) {
            $size = 'sm';
        } else {
            return null;
        }

        if (! \in_array($size, self::ALLOWED_BUTTON_SIZE)) {
            throw new InvalidArgumentException(sprintf(
                'The button size "%s" is not allowed. Allowed size are: %s.',
                e($size),
                implode(', ', self::ALLOWED_BUTTON_SIZE)
            ));
        }

        return $size;
    }
}
