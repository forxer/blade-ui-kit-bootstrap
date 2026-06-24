<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use BladeUIKitBootstrap\Enums\ModalSize as ModalSizeEnum;
use InvalidArgumentException;

trait ModalSize
{
    private function validModalSize(): void
    {
        if ($this->size === null) {
            return;
        }

        $this->size = strtolower(trim($this->size));

        if (! \in_array($this->size, ModalSizeEnum::values(), true)) {
            throw new InvalidArgumentException(\sprintf(
                'The modal size "%s" is not allowed. Allowed size are: %s.',
                e($this->size),
                implode(', ', ModalSizeEnum::values())
            ));
        }
    }
}
