<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Enums;

use BladeUIKitBootstrap\Enums\Concerns\HasValues;

enum BtnType: string
{
    use HasValues;

    case Button = 'button';
    case Reset = 'reset';
    case Submit = 'submit';
}
