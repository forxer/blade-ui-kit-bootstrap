<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use LogicException;

trait AlertIcons
{
    /**
     * Configuration value for alert icon format.
     * Uses property hook to cache the configuration value.
     */
    private ?string $alertIconFormat {
        get => $this->config('alert_icon_format');
    }

    /**
     * @throws LogicException
     */
    private function validAlertIcon(): void
    {
        if ($this->icon === null) {
            return;
        }

        if ($this->alertIconFormat === null) {
            throw new LogicException('In order to use the "icon" attribute you must have previously defined an "alert_icon_format" format in the configuration file.');
        }

        $this->icon = \sprintf($this->alertIconFormat, $this->icon);
    }
}
