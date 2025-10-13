<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use LogicException;

trait BtnIcons
{
    /**
     * Virtual property providing typed access to the 'btn_start_icon_format' configuration.
     * The actual configuration is cached in BladeComponent::$configCache.
     */
    private ?string $btnStartIconFormat {
        get => $this->config('btn_start_icon_format');
    }

    /**
     * Virtual property providing typed access to the 'btn_end_icon_format' configuration.
     * The actual configuration is cached in BladeComponent::$configCache.
     */
    private ?string $btnEndIconFormat {
        get => $this->config('btn_end_icon_format');
    }

    /**
     * @throws LogicException
     */
    private function validBtnStartIcon(): void
    {
        if ($this->startIcon === null && $this->icon !== null) {
            $this->startIcon = $this->icon;
        }

        if ($this->startIcon === null) {
            return;
        }

        if ($this->btnStartIconFormat === null) {
            throw new LogicException('In order to use the "icon" and/or "start-icon" attributes you must have previously defined a "btn_start_icon_format" format in the configuration file.');
        }

        $this->startIcon = \sprintf($this->btnStartIconFormat, $this->startIcon);
    }

    /**
     * @throws LogicException
     */
    private function validBtnEndIcon(): void
    {
        if ($this->endIcon === null) {
            return;
        }

        if ($this->btnEndIconFormat === null) {
            throw new LogicException('In order to use the "end-icon" attribute you must have previously defined a "btn_end_icon_format" format in the configuration file.');
        }

        $this->endIcon = \sprintf($this->btnEndIconFormat, $this->endIcon);
    }
}
