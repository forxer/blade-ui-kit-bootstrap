<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use BladeUIKitBootstrap\Enums\BtnType as BtnTypeEnum;
use InvalidArgumentException;

trait BtnType
{
    private const DEFAULT_BUTTON_TYPE = 'button';

    private function validBtnType(): void
    {
        $this->type ??= self::DEFAULT_BUTTON_TYPE;

        $this->type = strtolower(trim($this->type));

        if (! \in_array($this->type, BtnTypeEnum::values(), true)) {
            throw new InvalidArgumentException(\sprintf(
                'The button type "%s" is not allowed. Allowed type are: %s.',
                e($this->type),
                implode(', ', BtnTypeEnum::values())
            ));
        }
    }
}
