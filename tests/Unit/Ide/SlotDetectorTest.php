<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Components\Alerts\Alert;
use BladeUIKitBootstrap\Components\Forms\Inputs\Text;
use BladeUIKitBootstrap\Ide\SlotDetector;

it('detects a slot-bearing component view', function (): void {
    expect(SlotDetector::hasSlot(Alert::class, 'bootstrap-5'))->toBeTrue();
});

it('reports no slot for an input component (required constructor arg handled)', function (): void {
    expect(SlotDetector::hasSlot(Text::class, 'bootstrap-5'))->toBeFalse();
});
