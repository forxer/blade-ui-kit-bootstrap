<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Components\Alerts\Alert;
use BladeUIKitBootstrap\Components\Badges\Badge;
use BladeUIKitBootstrap\Components\Buttons\FormButton;
use BladeUIKitBootstrap\Components\Buttons\HelpInfo;
use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use BladeUIKitBootstrap\Components\Buttons\SimpleButton;
use BladeUIKitBootstrap\Components\Modals\Form as ModalForm;
use BladeUIKitBootstrap\Components\Modals\Modal;
use BladeUIKitBootstrap\Enums\AlertVariant;
use BladeUIKitBootstrap\Enums\BadgeVariant;
use BladeUIKitBootstrap\Enums\BtnSize;
use BladeUIKitBootstrap\Enums\BtnType;
use BladeUIKitBootstrap\Enums\BtnVariant;
use BladeUIKitBootstrap\Enums\HttpMethod;
use BladeUIKitBootstrap\Enums\ModalSize;

dataset('constrained_properties', [
    'SimpleButton::variant' => [SimpleButton::class, 'variant', BtnVariant::class],
    'SimpleButton::size' => [SimpleButton::class, 'size', BtnSize::class],
    'SimpleButton::type' => [SimpleButton::class, 'type', BtnType::class],
    'FormButton::variant' => [FormButton::class, 'variant', BtnVariant::class],
    'FormButton::size' => [FormButton::class, 'size', BtnSize::class],
    'FormButton::type' => [FormButton::class, 'type', BtnType::class],
    'FormButton::method' => [FormButton::class, 'method', HttpMethod::class],
    'LinkButton::variant' => [LinkButton::class, 'variant', BtnVariant::class],
    'LinkButton::size' => [LinkButton::class, 'size', BtnSize::class],
    'HelpInfo::variant' => [HelpInfo::class, 'variant', BtnVariant::class],
    'HelpInfo::size' => [HelpInfo::class, 'size', BtnSize::class],
    'Alert::variant' => [Alert::class, 'variant', AlertVariant::class],
    'Badge::variant' => [Badge::class, 'variant', BadgeVariant::class],
    'Modal::size' => [Modal::class, 'size', ModalSize::class],
    'ModalForm::size' => [ModalForm::class, 'size', ModalSize::class],
]);

it('documents every allowed value in the @var docblock', function (string $class, string $property, string $enum) {
    $doc = (new ReflectionProperty($class, $property))->getDocComment();

    expect($doc)->toBeString("Missing docblock on {$class}::\${$property}");

    foreach ($enum::values() as $value) {
        expect($doc)->toContain("'{$value}'");
    }
})->with('constrained_properties');
