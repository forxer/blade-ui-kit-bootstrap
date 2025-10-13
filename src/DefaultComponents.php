<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap;

use BladeUIKitBootstrap\Components\Alerts\Alert;
use BladeUIKitBootstrap\Components\Badges\Badge;
use BladeUIKitBootstrap\Components\Buttons\Actions\Archive;
use BladeUIKitBootstrap\Components\Buttons\Actions\Archives;
use BladeUIKitBootstrap\Components\Buttons\Actions\Back\Back;
use BladeUIKitBootstrap\Components\Buttons\Actions\Back\BackHome;
use BladeUIKitBootstrap\Components\Buttons\Actions\Back\BackList;
use BladeUIKitBootstrap\Components\Buttons\Actions\Cancel;
use BladeUIKitBootstrap\Components\Buttons\Actions\Copy;
use BladeUIKitBootstrap\Components\Buttons\Actions\Create;
use BladeUIKitBootstrap\Components\Buttons\Actions\Delete;
use BladeUIKitBootstrap\Components\Buttons\Actions\Destroy;
use BladeUIKitBootstrap\Components\Buttons\Actions\Disable;
use BladeUIKitBootstrap\Components\Buttons\Actions\Disabled;
use BladeUIKitBootstrap\Components\Buttons\Actions\Edit;
use BladeUIKitBootstrap\Components\Buttons\Actions\Email;
use BladeUIKitBootstrap\Components\Buttons\Actions\Enable;
use BladeUIKitBootstrap\Components\Buttons\Actions\Enabled;
use BladeUIKitBootstrap\Components\Buttons\Actions\Logout;
use BladeUIKitBootstrap\Components\Buttons\Actions\Modal\ConfirmNo;
use BladeUIKitBootstrap\Components\Buttons\Actions\Modal\ConfirmYes;
use BladeUIKitBootstrap\Components\Buttons\Actions\MoveDown;
use BladeUIKitBootstrap\Components\Buttons\Actions\MoveUp;
use BladeUIKitBootstrap\Components\Buttons\Actions\Phone;
use BladeUIKitBootstrap\Components\Buttons\Actions\Preview;
use BladeUIKitBootstrap\Components\Buttons\Actions\RecycleBin;
use BladeUIKitBootstrap\Components\Buttons\Actions\Restore;
use BladeUIKitBootstrap\Components\Buttons\Actions\Save;
use BladeUIKitBootstrap\Components\Buttons\Actions\Show;
use BladeUIKitBootstrap\Components\Buttons\Actions\Website;
use BladeUIKitBootstrap\Components\Buttons\FormButton;
use BladeUIKitBootstrap\Components\Buttons\HelpInfo;
use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use BladeUIKitBootstrap\Components\Buttons\SimpleButton;
use BladeUIKitBootstrap\Components\Forms\Error;
use BladeUIKitBootstrap\Components\Forms\Form;
use BladeUIKitBootstrap\Components\Forms\Inputs;
use BladeUIKitBootstrap\Components\Forms\Inputs\Checkbox;
use BladeUIKitBootstrap\Components\Forms\Inputs\Date;
use BladeUIKitBootstrap\Components\Forms\Inputs\Hidden;
use BladeUIKitBootstrap\Components\Forms\Inputs\Input;
use BladeUIKitBootstrap\Components\Forms\Inputs\Password;
use BladeUIKitBootstrap\Components\Forms\Inputs\Select;
use BladeUIKitBootstrap\Components\Forms\Inputs\Text;
use BladeUIKitBootstrap\Components\Forms\Inputs\Textarea;
use BladeUIKitBootstrap\Components\Forms\Inputs\Time;
use BladeUIKitBootstrap\Components\Forms\Label;
use BladeUIKitBootstrap\Components\Modals;
use BladeUIKitBootstrap\Components\Modals\Confirm;
use BladeUIKitBootstrap\Components\Modals\Modal;

class DefaultComponents
{
    /**
     * The current components array.
     * Public read access, private write access for immutability.
     */
    public private(set) array $components;

    /**
     * Create a new default component collection.
     */
    public function __construct(?array $components = null)
    {
        $this->components = $components ?? [
            // Buttons
            'btn' => SimpleButton::class,
            'form-button' => FormButton::class,
            'link-button' => LinkButton::class,
            'help-info' => HelpInfo::class,

            // Actions buttons
            'btn-back' => Back::class,
            'btn-back-list' => BackList::class,
            'btn-back-home' => BackHome::class,
            'btn-archive' => Archive::class,
            'btn-archives' => Archives::class,
            'btn-cancel' => Cancel::class,
            'btn-copy' => Copy::class,
            'btn-create' => Create::class,
            'btn-delete' => Delete::class,
            'btn-destroy' => Destroy::class,
            'btn-disable' => Disable::class,
            'btn-disabled' => Disabled::class,
            'btn-edit' => Edit::class,
            'btn-email' => Email::class,
            'btn-enable' => Enable::class,
            'btn-enabled' => Enabled::class,
            'btn-logout' => Logout::class,
            'btn-confirm-modal-yes' => ConfirmYes::class,
            'btn-confirm-modal-no' => ConfirmNo::class,
            'btn-move-down' => MoveDown::class,
            'btn-move-up' => MoveUp::class,
            'btn-phone' => Phone::class,
            'btn-preview' => Preview::class,
            'btn-recycle-bin' => RecycleBin::class,
            'btn-restore' => Restore::class,
            'btn-save' => Save::class,
            'btn-show' => Show::class,
            'btn-website' => Website::class,

            // Alerts
            'alert' => Alert::class,

            // Badges
            'badge' => Badge::class,

            // Forms
            'form' => Form::class,
            'label' => Label::class,
            'error' => Error::class,

            // Inputs
            'input' => Input::class,
            'text' => Text::class,
            'textarea' => Textarea::class,
            'select' => Select::class,
            'checkbox' => Checkbox::class,
            'password' => Password::class,
            'email' => Inputs\Email::class,
            'date' => Date::class,
            'time' => Time::class,
            'hidden' => Hidden::class,

            // Modals
            'modal' => Modal::class,
            'confirm-modal' => Confirm::class,
            'form-modal' => Modals\Form::class,
        ];
    }

    /**
     * Disable the given components by alias name.
     */
    public function except(array $components): static
    {
        $current = $this->components;

        foreach ($components as $alias) {
            if (\array_key_exists($alias, $current)) {
                unset($current[$alias]);
            }
        }

        return new static($current);
    }

    /**
     * Replace the given components with other components classes.
     */
    public function replace(array $replacements): static
    {
        $current = $this->components;

        foreach ($replacements as $alias => $component) {
            if (\array_key_exists($alias, $current)) {
                $current[$alias] = $component;
            }
        }

        return new static($current);
    }

    /**
     * Replace the given components alias with others.
     */
    public function replaceAlias(array $replacements): static
    {
        $current = $this->components;

        foreach ($replacements as $from => $to) {
            if (\array_key_exists($from, $current)) {
                $current[$to] = $current[$from];
                unset($current[$from]);
            }
        }

        return new static($current);
    }

    /**
     * Merge the given components into the component collection.
     */
    public function merge(array $components): static
    {
        $this->components = array_merge($this->components, $components);

        return new static($this->components);
    }

    /**
     * Return components array.
     */
    public function components(): array
    {
        return $this->components;
    }
}
