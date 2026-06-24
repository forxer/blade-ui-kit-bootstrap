<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use BladeUIKitBootstrap\Enums\HttpMethod;
use InvalidArgumentException;

trait FormMethod
{
    private const DEFAULT_FORM_METHOD = 'POST';

    public function formMethodValue(): string
    {
        return \in_array($this->method, ['POST', 'PUT', 'PATCH', 'DELETE']) ? 'POST' : 'GET';
    }

    private function validFormMethod(): void
    {
        $this->method ??= self::DEFAULT_FORM_METHOD;

        $this->method = strtoupper(trim($this->method));

        if (! \in_array($this->method, HttpMethod::values(), true)) {
            throw new InvalidArgumentException(\sprintf(
                'The HTTP method "%s" is not allowed. Allowed method are: %s.',
                e($this->method),
                implode(', ', HttpMethod::values())
            ));
        }
    }
}
