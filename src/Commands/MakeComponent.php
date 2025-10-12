<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Commands;

use BladeUIKitBootstrap\DefaultComponents;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeComponent extends Command
{
    protected $signature = 'make:blade-ui-kit-bs-component
                            {name : The name of the component class}
                            {--extends= : The default component to extend (alias or full class name)}
                            {--force : Overwrite the component if it already exists}';

    protected $description = 'Create a new Blade UI Kit Bootstrap component class';

    protected Filesystem $files;

    protected array $availableComponents;

    public function handle(Filesystem $files): int
    {
        $this->files = $files;
        $this->availableComponents = (new DefaultComponents())->components();

        $name = $this->argument('name');
        $extends = $this->option('extends');

        // Validate that extends option is provided
        if (! $extends) {
            $this->error('You must specify a component to extend using --extends option.');
            $this->line('');
            $this->showAvailableComponents();

            return self::FAILURE;
        }

        // Resolve the parent class
        $parentClass = $this->resolveParentClass($extends);

        if (\in_array($parentClass, [null, '', '0'], true)) {
            $this->error(\sprintf("Component '%s' not found.", $extends));
            $this->line('');
            $this->showAvailableComponents();

            return self::FAILURE;
        }

        // Generate the component
        $path = $this->getPath($name, $parentClass);
        $namespace = $this->getNamespace($parentClass);
        $fullClassName = $namespace.'\\'.$name;

        if ($this->files->exists($path) && ! $this->option('force')) {
            $this->error(\sprintf('Component [%s] already exists!', $name));

            return self::FAILURE;
        }

        $this->makeDirectory($path);

        $this->files->put($path, $this->buildClass($name, $parentClass));

        $this->components->info(\sprintf('Component [%s] created successfully.', $fullClassName));

        // Optionally create a view file
        if ($this->confirm('Do you want to create a corresponding view file?', false)) {
            $this->createView($name, $parentClass);
        }

        $this->line('');
        $this->line('You can now register your component in config/blade-ui-kit-bootstrap.php:');
        $this->line('');
        $this->line('Option 1 - Add as a new component:');
        $this->line('');
        $this->line("    'components' => ServiceProvider::defaultComponents()");
        $this->line("        ->merge([");
        $this->line(\sprintf("            '%s' => \\%s::class,", $this->getComponentAlias($name, $parentClass), $fullClassName));
        $this->line("        ])");
        $this->line("        ->components(),");
        $this->line('');
        $this->line('Option 2 - Replace an existing component:');
        $this->line('');
        $this->line("    'components' => ServiceProvider::defaultComponents()");
        $this->line("        ->replace([");
        $this->line(\sprintf("            '%s' => \\%s::class,", $this->getOriginalAlias($extends), $fullClassName));
        $this->line("        ])");
        $this->line("        ->components(),");
        $this->line('');

        return self::SUCCESS;
    }

    protected function resolveParentClass(string $extends): ?string
    {
        // Check if it's an alias
        if (isset($this->availableComponents[$extends])) {
            return $this->availableComponents[$extends];
        }

        // Check if it's a full class name that exists
        if (class_exists($extends)) {
            return $extends;
        }

        return null;
    }

    protected function getPath(string $name, string $parentClass): string
    {
        $name = Str::studly($name);
        $subPath = $this->getSubPath($parentClass);

        if ($subPath) {
            return app_path(\sprintf('View/Components/%s/%s.php', $subPath, $name));
        }

        return app_path(\sprintf('View/Components/%s.php', $name));
    }

    protected function getSubPath(string $parentClass): string
    {
        // Extract the path after "BladeUIKitBootstrap\Components\"
        $baseNamespace = 'BladeUIKitBootstrap\\Components\\';

        if (! str_starts_with($parentClass, $baseNamespace)) {
            return '';
        }

        $relativePath = substr($parentClass, strlen($baseNamespace));

        // Remove the class name to get only the directory structure
        $parts = explode('\\', $relativePath);
        array_pop($parts); // Remove class name

        return implode('/', $parts);
    }

    protected function getNamespace(string $parentClass): string
    {
        $subPath = $this->getSubPath($parentClass);

        if ($subPath) {
            $namespaceSubPath = str_replace('/', '\\', $subPath);

            return 'App\\View\\Components\\'.$namespaceSubPath;
        }

        return 'App\\View\\Components';
    }

    protected function makeDirectory(string $path): void
    {
        $directory = \dirname($path);

        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }
    }

    protected function buildClass(string $name, string $parentClass): string
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $parentClass)
            ->replaceClass($stub, $name)
            ->replaceParentClass($stub, $parentClass);
    }

    protected function getStub(): string
    {
        return __DIR__.'/../../stubs/component.stub';
    }

    protected function replaceNamespace(string &$stub, string $parentClass): static
    {
        $namespace = $this->getNamespace($parentClass);
        $stub = str_replace('{{ namespace }}', $namespace, $stub);

        return $this;
    }

    protected function replaceClass(string &$stub, string $name): static
    {
        $class = Str::studly($name);

        $stub = str_replace('{{ class }}', $class, $stub);

        return $this;
    }

    protected function replaceParentClass(string &$stub, string $parentClass): string
    {
        $shortName = class_basename($parentClass);

        $stub = str_replace('{{ parentClassImport }}', $parentClass, $stub);
        $stub = str_replace('{{ parentClass }}', $shortName, $stub);

        return $stub;
    }

    protected function createView(string $name, string $parentClass): void
    {
        $viewName = Str::kebab($name);
        $subPath = $this->getSubPath($parentClass);

        if ($subPath) {
            $viewSubPath = str_replace('\\', '/', Str::kebab(str_replace('/', '-', $subPath)));
            $viewPath = resource_path(\sprintf('views/components/%s/%s.blade.php', $viewSubPath, $viewName));
            $displayPath = \sprintf('resources/views/components/%s/%s.blade.php', $viewSubPath, $viewName);
        } else {
            $viewPath = resource_path(\sprintf('views/components/%s.blade.php', $viewName));
            $displayPath = \sprintf('resources/views/components/%s.blade.php', $viewName);
        }

        if ($this->files->exists($viewPath) && ! $this->option('force')) {
            $this->warn(\sprintf('View [%s] already exists!', $displayPath));

            return;
        }

        $this->makeDirectory($viewPath);

        $viewStub = $this->files->get(__DIR__.'/../../stubs/component.view.stub');

        $this->files->put($viewPath, $viewStub);

        $this->components->info(\sprintf('View [%s] created successfully.', $displayPath));
    }

    protected function getComponentAlias(string $name, string $parentClass): string
    {
        $subPath = $this->getSubPath($parentClass);

        if ($subPath) {
            $aliasSubPath = str_replace('/', '.', Str::kebab(str_replace('\\', '/', $subPath)));

            return $aliasSubPath.'.'.Str::kebab($name);
        }

        return Str::kebab($name);
    }

    protected function getOriginalAlias(string $extends): string
    {
        // If it's already an alias, return it
        if (isset($this->availableComponents[$extends])) {
            return $extends;
        }

        // Otherwise, try to find the alias for this class
        $alias = array_search($extends, $this->availableComponents, true);

        return $alias !== false ? $alias : Str::kebab(class_basename($extends));
    }

    protected function showAvailableComponents(): void
    {
        $this->line('Available components to extend:');
        $this->line('');

        $groups = [
            'Buttons' => ['btn', 'form-button', 'link-button', 'help-info'],
            'Action Buttons' => [
                'btn-back', 'btn-back-list', 'btn-back-home', 'btn-archive', 'btn-archives',
                'btn-cancel', 'btn-copy', 'btn-create', 'btn-delete', 'btn-destroy',
                'btn-disable', 'btn-disabled', 'btn-edit', 'btn-email', 'btn-enable',
                'btn-enabled', 'btn-logout', 'btn-confirm-modal-yes', 'btn-confirm-modal-no',
                'btn-move-down', 'btn-move-up', 'btn-phone', 'btn-preview',
                'btn-recycle-bin', 'btn-restore', 'btn-save', 'btn-show', 'btn-website',
            ],
            'Forms' => ['form', 'label', 'error'],
            'Inputs' => ['input', 'text', 'textarea', 'select', 'password', 'email', 'date', 'time', 'hidden'],
            'Modals' => ['modal', 'confirm-modal', 'form-modal'],
        ];

        foreach ($groups as $group => $components) {
            $this->line(\sprintf('<fg=yellow>%s:</>', $group));

            foreach ($components as $alias) {
                if (isset($this->availableComponents[$alias])) {
                    $class = $this->availableComponents[$alias];
                    $this->line(\sprintf('  <fg=green>%s</> → %s', $alias, $class));
                }
            }

            $this->line('');
        }
    }
}
