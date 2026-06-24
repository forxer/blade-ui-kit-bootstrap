<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Enums;

use BladeUIKitBootstrap\Enums\Concerns\HasValues;

enum HttpMethod: string
{
    use HasValues;

    case Get = 'GET';
    case Post = 'POST';
    case Put = 'PUT';
    case Patch = 'PATCH';
    case Delete = 'DELETE';
}
