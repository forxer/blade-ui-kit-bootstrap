<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use LogicException ;

trait BtnIcons
{
    /**
     * @throws LogicException
     */
    private function validBtnStartIcon(?string $icon = null, ?string $startIcon = null): ?string
    {
        $iconName = $startIcon ?? $icon ?? null;

        if ($iconName === null) {
            return null;
        }

        $btnStartIconFormat = $this->config('btn_start_icon_format');

        if ($btnStartIconFormat === null && $iconName !== null) {
            throw new LogicException('In order to use the "icon" and/or "start-icon" attributes you must have previously defined a "btn_start_icon_format" format in the configuration file.');
        }

        return sprintf($btnStartIconFormat, $iconName);
    }

    /**
     * @throws LogicException
     */
    private function validBtnEndIcon(?string $endIcon = null): ?string
    {
        $iconName = $endIcon ?? null;

        if ($iconName === null) {
            return null;
        }

        $btnEndIconFormat = $this->config('btn_end_icon_format');

        if ($btnEndIconFormat === null && $iconName !== null) {
            throw new LogicException('In order to use the "end-icon" attribute you must have previously defined a "btn_end_icon_format" format in the configuration file.');
        }

        return sprintf($btnEndIconFormat, $iconName);
    }
}
