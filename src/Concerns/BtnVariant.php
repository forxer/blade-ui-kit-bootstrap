<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use BladeUIKitBootstrap\Enums\BootstrapVersion;
use InvalidArgumentException;

trait BtnVariant
{
    private const DEFAULT_VARIANT = 'primary';

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

    private function validBtnVariant(): void
    {
        static $allButtonsOutline = null;

        $this->variant ??= self::DEFAULT_VARIANT;

        $allowedVariants = self::ALLOWED_BS4_VARIANTS;

        if ($this->config('boostrap_version') === BootstrapVersion::V5) {
            $allowedVariants = self::ALLOWED_BS5_VARIANTS;

            if ($allButtonsOutline === null) {
                $allButtonsOutline = $this->config('all_buttons_outline');
            }

            if ($this->noOutline === false && ($allButtonsOutline === true || $this->outline)) {
                $this->variant = 'outline-'.$this->variant;
            }
        }

        if (! \in_array($this->variant, $allowedVariants)) {
            throw new InvalidArgumentException(\sprintf(
                'The variant "%s" is not allowed. Allowed variant are: %s.',
                e($this->variant),
                implode(', ', $allowedVariants)
            ));
        }
    }
}
