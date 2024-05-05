<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use BladeUIKitBootstrap\Enums\BootstrapVersion;
use InvalidArgumentException;

trait BtnVariant
{
    private const ALLOWED_BS4_VARIANTS = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
        'link',
    ];

    private const ALLOWED_BS5_VARIANTS = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
        'link',
        'outline-primary',
        'outline-secondary',
        'outline-success',
        'outline-danger',
        'outline-warning',
        'outline-info',
        'outline-light',
        'outline-dark',
    ];

    private function validBtnVariant(string $variant, bool $outline, bool $noOutline): string
    {
        static $allButtonsOutline = null;

        $allowedVariants = self::ALLOWED_BS4_VARIANTS;

        if ($this->config('boostrap_version') === BootstrapVersion::V5) {
            $allowedVariants = self::ALLOWED_BS5_VARIANTS;

            if ($allButtonsOutline === null) {
                $allButtonsOutline = $this->config('all_buttons_outline');
            }

            if ($noOutline === false && ($allButtonsOutline === true || $outline)) {
                $variant = 'outline-'.$variant;
            }
        }

        if (! \in_array($variant, $allowedVariants)) {
            throw new InvalidArgumentException(sprintf(
                'The variant "%s" is not allowed. Allowed variant are: %s.',
                e($variant),
                implode(', ', $allowedVariants)
            ));
        }

        return $variant;
    }
}
