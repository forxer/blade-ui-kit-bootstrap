<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use LogicException;

trait BtnIcons
{
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

        $btnStartIconFormat = $this->config('btn_start_icon_format');

        if ($btnStartIconFormat === null) {
            throw new LogicException('In order to use the "icon" and/or "start-icon" attributes you must have previously defined a "btn_start_icon_format" format in the configuration file.');
        }

        $this->startIcon = \sprintf($btnStartIconFormat, $this->startIcon);
    }

    /**
     * @throws LogicException
     */
    private function validBtnEndIcon(): void
    {
        if ($this->endIcon === null) {
            return;
        }

        $btnEndIconFormat = $this->config('btn_end_icon_format');

        if ($btnEndIconFormat === null) {
            throw new LogicException('In order to use the "end-icon" attribute you must have previously defined a "btn_end_icon_format" format in the configuration file.');
        }

        $this->endIcon = \sprintf($btnEndIconFormat, $this->endIcon);
    }
}
