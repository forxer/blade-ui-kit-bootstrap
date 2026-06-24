<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Enums;

use BladeUIKitBootstrap\Enums\Concerns\HasValues;

enum BtnSize: string
{
    use HasValues;

    case Large = 'lg';
    case Small = 'sm';
}
