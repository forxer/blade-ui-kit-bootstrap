<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use InvalidArgumentException;

trait BtnType
{
    private const DEFAULT_BUTTON_TYPE = 'button';

    private const DEFAULT_FORM_BUTTON_TYPE = 'submit';

    private const ALLOWED_BUTTON_TYPE = [
        'button',
        'reset',
        'submit',
    ];

    private function validBtnType(string $default): void
    {
        $this->type ??= self::DEFAULT_BUTTON_TYPE;

        $this->type = strtolower(trim($this->type));

        if (! \in_array($this->type, self::ALLOWED_BUTTON_TYPE)) {
            throw new InvalidArgumentException(\sprintf(
                'The button type "%s" is not allowed. Allowed type are: %s.',
                e($this->type),
                implode(', ', self::ALLOWED_BUTTON_TYPE)
            ));
        }
    }
}
