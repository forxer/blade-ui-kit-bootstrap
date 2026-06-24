<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use BladeUIKitBootstrap\Enums\AlertVariant as AlertVariantEnum;
use InvalidArgumentException;

trait AlertVariant
{
    private function validAlertVariant(): void
    {
        if ($this->variant === null) {
            return;
        }

        if (! \in_array($this->variant, AlertVariantEnum::values(), true)) {
            throw new InvalidArgumentException(\sprintf(
                'The alert variant "%s" is not allowed. Allowed alert variant are: %s.',
                e($this->variant),
                implode(', ', AlertVariantEnum::values())
            ));
        }
    }
}
