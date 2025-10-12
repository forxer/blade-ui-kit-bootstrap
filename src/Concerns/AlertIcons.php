<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use LogicException;

trait AlertIcons
{
    /**
     * @throws LogicException
     */
    private function validAlertIcon(): void
    {
        if ($this->icon === null) {
            return;
        }

        $alertIconFormat = $this->config('alert_icon_format');

        if ($alertIconFormat === null) {
            throw new LogicException('In order to use the "icon" attribute you must have previously defined an "alert_icon_format" format in the configuration file.');
        }

        $this->icon = \sprintf($alertIconFormat, $this->icon);
    }
}
