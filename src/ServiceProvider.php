<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap;

use BladeUIKit\Components\BladeComponent;
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

        if ($this->app->runningInConsole()) {
            $this->configurePublishing();
        }
    }

    public static function defaultComponents(): DefaultComponents
    {
        return new DefaultComponents();
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

            /** @var BladeComponent $component */
            foreach (config('blade-ui-kit-bootstrap.components', []) as $alias => $component) {
                $blade->component($component, $alias, $prefix);
            }
        });
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
}
