<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Enums;

use BladeUIKitBootstrap\Enums\Concerns\HasValues;

enum BtnVariant: string
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
    case Link = 'link';
    case OutlinePrimary = 'outline-primary';
    case OutlineSecondary = 'outline-secondary';
    case OutlineSuccess = 'outline-success';
    case OutlineDanger = 'outline-danger';
    case OutlineWarning = 'outline-warning';
    case OutlineInfo = 'outline-info';
    case OutlineLight = 'outline-light';
    case OutlineDark = 'outline-dark';

    /**
     * Variants available in Bootstrap 4 (no outline-* variants).
     *
     * @return list<string>
     */
    public static function valuesForV4(): array
    {
        return array_values(array_filter(
            self::values(),
            static fn (string $value): bool => ! str_starts_with($value, 'outline-')
        ));
    }
}
