<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Modals;

class Confirm extends Modal
{
    public function __construct(
        public string $title,
        public bool $dismissable = true
    ) {
        parent::__construct('confirmModal', $title, $dismissable);
    }

    public function viewName(): string
    {
        return 'components.modals.confirm';
    }
}
