<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap;

use BladeUIKitBootstrap\Components\Buttons;
use BladeUIKitBootstrap\Components\Buttons\Actions;
use BladeUIKitBootstrap\Components\Forms;
use BladeUIKitBootstrap\Components\Forms\Inputs;
use BladeUIKitBootstrap\Components\Modals;

class DefaultComponents
{
    /**
     * The current components.
     */
    protected array $components;

    /**
     * Create a new default component collection.
     */
    public function __construct(?array $components = null)
    {
        $this->components = $components ?? [
            // Buttons
            'btn' => Buttons\SimpleButton::class,
            'form-button' => Buttons\FormButton::class,
            'link-button' => Buttons\LinkButton::class,
            'help-info' => Buttons\HelpInfo::class,

            // Actions buttons
            'btn-back' => Actions\Back\Back::class,
            'btn-back-list' => Actions\Back\BackList::class,
            'btn-back-home' => Actions\Back\BackHome::class,
            'btn-archive' => Actions\Archive::class,
            'btn-archives' => Actions\Archives::class,
            'btn-cancel' => Actions\Cancel::class,
            'btn-copy' => Actions\Copy::class,
            'btn-create' => Actions\Create::class,
            'btn-delete' => Actions\Delete::class,
            'btn-destroy' => Actions\Destroy::class,
            'btn-disable' => Actions\Disable::class,
            'btn-disabled' => Actions\Disabled::class,
            'btn-edit' => Actions\Edit::class,
            'btn-email' => Actions\Email::class,
            'btn-enable' => Actions\Enable::class,
            'btn-enabled' => Actions\Enabled::class,
            'btn-logout' => Actions\Logout::class,
            'btn-confirm-modal-yes' => Actions\Modal\ConfirmYes::class,
            'btn-confirm-modal-no' => Actions\Modal\ConfirmNo::class,
            'btn-move-down' => Actions\MoveDown::class,
            'btn-move-up' => Actions\MoveUp::class,
            'btn-phone' => Actions\Phone::class,
            'btn-preview' => Actions\Preview::class,
            'btn-recycle-bin' => Actions\RecycleBin::class,
            'btn-restore' => Actions\Restore::class,
            'btn-save' => Actions\Save::class,
            'btn-show' => Actions\Show::class,
            'btn-website' => Actions\Website::class,

            // Forms
            'form' => Forms\Form::class,
            'label' => Forms\Label::class,
            'error' => Forms\Error::class,

            // Inputs
            'input' => Inputs\Input::class,
            'text' => Inputs\Text::class,
            'textarea' => Inputs\Textarea::class,
            'select' => Inputs\Select::class,
            'password' => Inputs\Password::class,
            'email' => Inputs\Email::class,
            'date' => Inputs\Date::class,
            'time' => Inputs\Time::class,
            'hidden' => Inputs\Hidden::class,

            // Modals
            'modal' => Modals\Modal::class,
            'confirm-modal' => Modals\Confirm::class,
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
