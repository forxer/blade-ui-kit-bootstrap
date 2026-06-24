<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Enums;

use BladeUIKitBootstrap\Enums\Concerns\HasValues;

enum ModalSize: string
{
    use HasValues;

    case Small = 'sm';
    case Large = 'lg';
    case ExtraLarge = 'xl';
}
