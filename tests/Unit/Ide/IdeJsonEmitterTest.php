<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Components\Buttons\SimpleButton;
use BladeUIKitBootstrap\Ide\Emitters\IdeJsonEmitter;

it('maps tag names to component classes', function (): void {
    $out = IdeJsonEmitter::emit(['x-btn' => SimpleButton::class]);

    expect($out['$schema'])->toContain('laravel-ide.com')
        ->and($out['blade']['components'])->toBe([
            ['name' => 'x-btn', 'class' => SimpleButton::class],
        ]);
});
