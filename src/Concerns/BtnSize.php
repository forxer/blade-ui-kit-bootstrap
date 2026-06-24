<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use BladeUIKitBootstrap\Enums\BtnSize as BtnSizeEnum;
use InvalidArgumentException;

trait BtnSize
{
    private function validBtnSize(): void
    {
        if ($this->size !== null) {
            $this->size = strtolower(trim($this->size));
        } elseif ($this->lg) {
            $this->size = 'lg';
        } elseif ($this->sm) {
            $this->size = 'sm';
        } else {
            $this->size = null;

            return;
        }

        if (! \in_array($this->size, BtnSizeEnum::values(), true)) {
            throw new InvalidArgumentException(\sprintf(
                'The button size "%s" is not allowed. Allowed size are: %s.',
                e($this->size),
                implode(', ', BtnSizeEnum::values())
            ));
        }
    }
}
