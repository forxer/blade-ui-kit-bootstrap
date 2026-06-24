<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use BladeUIKitBootstrap\Enums\BootstrapVersion;
use BladeUIKitBootstrap\Enums\BtnVariant as BtnVariantEnum;
use InvalidArgumentException;

trait BtnVariant
{
    /**
     * Virtual property providing typed access to the 'all_buttons_outline' configuration.
     * The actual configuration is cached in BladeComponent::$configCache.
     */
    private bool $allButtonsOutline {
        get => $this->config('all_buttons_outline');
    }

    private const DEFAULT_VARIANT = 'primary';

    private function validBtnVariant(): void
    {
        $this->variant ??= self::DEFAULT_VARIANT;

        $allowedVariants = BtnVariantEnum::valuesForV4();

        if ($this->config('bootstrap_version') === BootstrapVersion::V5) {
            $allowedVariants = BtnVariantEnum::values();

            if ($this->noOutline === false && ($this->allButtonsOutline || $this->outline)) {
                $this->variant = 'outline-'.$this->variant;
            }
        }

        if (! \in_array($this->variant, $allowedVariants, true)) {
            throw new InvalidArgumentException(\sprintf(
                'The button variant "%s" is not allowed. Allowed button variant are: %s.',
                e($this->variant),
                implode(', ', $allowedVariants)
            ));
        }
    }
}
