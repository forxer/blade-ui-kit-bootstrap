<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Enums;

use BladeUIKitBootstrap\Enums\Concerns\HasValues;

enum BadgeVariant: string
{
    use HasValues;

    case Primary = 'primary';
    case Secondary = 'secondary';
    case Success = 'success';
    case Danger = 'danger';
    case Warning = 'warning';
    case Info = 'info';
    case Light = 'light';
    case Dark = 'dark';
}
