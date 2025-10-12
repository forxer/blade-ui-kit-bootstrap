<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use InvalidArgumentException;

trait AlertVariant
{
    /**
     * Configuration value for all alerts outline setting.
     * Uses property hook to cache the configuration value.
     */
    private bool $allAlertsOutline {
        get => $this->config('all_alerts_outline');
    }

    private const ALLOWED_VARIANTS = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
        'outline-primary',
        'outline-secondary',
        'outline-success',
        'outline-danger',
        'outline-warning',
        'outline-info',
        'outline-light',
        'outline-dark',
    ];

    private function validAlertVariant(): void
    {
        if ($this->variant === null) {
            return;
        }

        if ($this->noOutline === false && ($this->allAlertsOutline || $this->outline)) {
            $this->variant = 'outline-'.$this->variant;
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
