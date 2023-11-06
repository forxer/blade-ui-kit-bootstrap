<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use InvalidArgumentException;

trait FormMethod
{
    public string $method = 'POST';

    private const ALLOWED_FORM_METHOD = [
        'GET',
        'POST',
        'PUT',
        'PATCH',
        'DELETE',
    ];

    public function formMethodValue(): string
    {
        return \in_array($this->method, ['POST', 'PUT', 'PATCH', 'DELETE']) ? 'POST' : 'GET';
    }

    private function validFormMethod(string $method): string
    {
        $method = \strtoupper(\trim($method));

        if (! \in_array($method, self::ALLOWED_FORM_METHOD)) {
            throw new InvalidArgumentException(\sprintf(
                'The HTTP method "%s" is not allowed. Allowed method are: %s.',
                e($method),
                \implode(', ', self::ALLOWED_FORM_METHOD)
            ));
        }

        return $method;
    }
}
