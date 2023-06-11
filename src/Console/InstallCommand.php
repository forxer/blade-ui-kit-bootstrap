<?php

namespace BladeUIKitBootstrap\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command
{
    protected $signature = 'blade-ui-kit-bootstrap:install';

    protected $description = 'Install Blade UI Kit Bootstrap requirements';

    protected Filesystem $filesystem;

    protected array $classsesReplacement = [
        'Components\Buttons\FormButton::class' => 'BladeUIKitBootstrap\Components\Buttons\FormButton::class',
        'Components\Buttons\Logout::class' => 'BladeUIKitBootstrap\Components\Buttons\Logout::class',
        'Components\Forms\Inputs\Email::class' => 'BladeUIKitBootstrap\Components\Forms\Inputs\Email::class',
        'Components\Forms\Error::class' => 'BladeUIKitBootstrap\Components\Forms\Error::class',
        'Components\Forms\Form::class' => 'BladeUIKitBootstrap\Components\Forms\Form::class',
        'Components\Forms\Inputs\Input::class' => 'BladeUIKitBootstrap\Components\Forms\Inputs\Input::class',
        'Components\Forms\Label::class' => 'BladeUIKitBootstrap\Components\Forms\Label::class',
        'Components\Forms\Inputs\Password::class' => 'BladeUIKitBootstrap\Components\Forms\Inputs\Password::class',
        'Components\Forms\Inputs\Textarea::class' => 'BladeUIKitBootstrap\Components\Forms\Inputs\Textarea::class',
    ];

    public function handle(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;

        $this->info('Installing Blade UI Kit Bootstrap');

        $bukConfigFile = config_path('/blade-ui-kit.php');
        $bukBsConfigFile = config_path('/blade-ui-kit-bootstrap');

        if ($this->filesystem->missing($bukConfigFile)) {
            $this->warn('The Blade UI Kit configuration file is not published, we need it. We will publish it for you.');

            $this->call('vendor:publish', [
                '--tag' => 'blade-ui-kit-config'
            ]);

            $this->info('The Blade UI Kit configuration file has been published.');
        }

        if ($this->filesystem->missing($bukBsConfigFile)) {
            $this->warn('The Blade UI Kit Bootstrap configuration file is not published. We will publish it for you.');

            $this->call('vendor:publish', [
                '--tag' => 'blade-ui-kit-bootstrap-config'
            ]);

            $this->info('The Blade UI Kit Bootstrap configuration file has been published.');
        }

        $this->comment('Replace classes in Blade UI Kit configuration file by those of this package.');

        $this->filesystem->replaceInFile(
            array_keys($this->classsesReplacement),
            array_values($this->classsesReplacement),
            $bukConfigFile
        );

        $this->info('Blade UI Kit Bootstrap installed');
    }
}
