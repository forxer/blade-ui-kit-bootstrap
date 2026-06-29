<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap;

use BladeUIKitBootstrap\Commands\IdeCommand;
use BladeUIKitBootstrap\Commands\MakeComponent;
use Forxer\BladeComponentsIdeHelper\Attributes\PropertiesAndConstructorSurface;
use Forxer\BladeComponentsIdeHelper\Definition\ComponentDefinition;
use Forxer\BladeComponentsIdeHelper\Definition\IdeTarget;
use Forxer\BladeComponentsIdeHelper\Registry\IdeTargetRegistry;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-ui-kit-bootstrap.php', 'blade-ui-kit-bootstrap');
    }

    public function boot(): void
    {
        $this->bootResources();
        $this->bootBladeComponents();
        $this->bootTestRoutes();

        if ($this->app->runningInConsole()) {
            $this->configurePublishing();
            $this->configureCommands();
            IdeTargetRegistry::register(self::ideTarget());
        }
    }

    public static function defaultComponents(): DefaultComponents
    {
        return new DefaultComponents();
    }

    public static function ideTarget(): IdeTarget
    {
        return new IdeTarget(
            definition: new ComponentDefinition(
                components: config('blade-ui-kit-bootstrap.components', []),
                prefix: (string) config('blade-ui-kit-bootstrap.prefix', ''),
                attributeSurface: new PropertiesAndConstructorSurface(),
            ),
            fileBaseName: 'blade-ui-kit-bootstrap',
        );
    }

    private function bootResources(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'blade-ui-kit-bootstrap');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blade-ui-kit-bootstrap');
    }

    private function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade): void {
            $prefix = config('blade-ui-kit-bootstrap.prefix', '');

            foreach (config('blade-ui-kit-bootstrap.components', []) as $alias => $component) {
                $blade->component($component, $alias, $prefix);
            }
        });
    }

    private function bootTestRoutes(): void
    {
        if (config('blade-ui-kit-bootstrap.enable_test_routes', false)) {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        }
    }

    private function configurePublishing(): void
    {
        // config
        $this->publishes([
            __DIR__.'/../config/blade-ui-kit-bootstrap.stub' => $this->app->configPath('blade-ui-kit-bootstrap.php'),
        ], 'blade-ui-kit-bootstrap-config');

        // views
        $this->publishes([
            __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/blade-ui-kit-bootstrap'),
        ], 'blade-ui-kit-bootstrap-views');

        // translations
        $this->publishes([
            __DIR__.'/../lang/' => $this->app->langPath('/vendor/blade-ui-kit-bootstrap'),
        ], 'blade-ui-kit-bootstrap-translations');
    }

    private function configureCommands(): void
    {
        $this->commands([
            IdeCommand::class,
            MakeComponent::class,
        ]);
    }
}
