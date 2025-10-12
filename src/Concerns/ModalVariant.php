<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use InvalidArgumentException;

trait ModalVariant
{
    /**
     * Configuration value for all modals outline setting.
     * Uses property hook to cache the configuration value.
     */
    private bool $allModalsOutline {
        get => $this->config('all_modal_outline');
    }

    private const ALLOWED_VARIANTS = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'outline-primary',
        'outline-secondary',
        'outline-success',
        'outline-danger',
        'outline-warning',
        'outline-info',
    ];

    private function validModalVariant(): void
    {
        if ($this->variant === null) {
            return;
        }

        if ($this->noOutline === false && ($this->allModalsOutline || $this->outline)) {
            $this->variant = 'outline-'.$this->variant;
        }

        if (! \in_array($this->variant, self::ALLOWED_VARIANTS)) {
            throw new InvalidArgumentException(\sprintf(
                'The modal variant "%s" is not allowed. Allowed modal variant are: %s.',
                e($this->variant),
                implode(', ', self::ALLOWED_VARIANTS)
            ));
        }
    }
}
