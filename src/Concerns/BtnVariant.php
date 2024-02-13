<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use InvalidArgumentException;

trait BtnVariant
{
    public string $variant = 'primary';

    private const ALLOWED_BS4_VARIANTS = [
        'primary',
        'default',
        'success',
        'info',
        'warning',
        'danger',
    ];

    private const ALLOWED_BS5_VARIANTS = [
        'primary',
        'secondary',
        'success',
        'info',
        'warning',
        'danger',
        'light',
    ];

    private function validBtnVariant(string $variant): string
    {
        $allowedVariants = self::ALLOWED_BS5_VARIANTS;

        if (\app('config')->get('blade-ui-kit-bootstrap.boostrap_version') === 'bootstrap-4') {
            $allowedVariants = self::ALLOWED_BS4_VARIANTS;
        }

        if (! \in_array($variant, $allowedVariants)) {
            throw new InvalidArgumentException(\sprintf(
                'The variant "%s" is not allowed. Allowed variant are: %s.',
                e($variant),
                \implode(', ', $allowedVariants)
            ));
        }

        return $variant;
    }
}
