<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use InvalidArgumentException;

trait BtnType
{
    private const ALLOWED_BUTTON_TYPE = [
        'button',
        'reset',
        'submit',
    ];

    private function validBtnType(string $type): string
    {
        $type = strtolower(trim($type));

        if (! \in_array($type, self::ALLOWED_BUTTON_TYPE)) {
            throw new InvalidArgumentException(sprintf(
                'The button type "%s" is not allowed. Allowed type are: %s.',
                e($type),
                implode(', ', self::ALLOWED_BUTTON_TYPE)
            ));
        }

        return $type;
    }
}
