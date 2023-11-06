<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Modals;

class Confirm extends Modal
{
    public function __construct(
        string $id,
        string $title,
        bool $dismissable = true
    ) {
        parent::__construct(
            id: $id,
            title: $title,
            dismissable: $dismissable,
        );
    }

    public function viewName(): string
    {
        return 'components.modals.confirm';
    }
}
