<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Commands;

use BladeUIKitBootstrap\Ide\ComponentIntrospector;
use BladeUIKitBootstrap\Ide\Emitters\HtmlDataEmitter;
use BladeUIKitBootstrap\Ide\Emitters\IdeJsonEmitter;
use BladeUIKitBootstrap\Ide\Emitters\SnippetsEmitter;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

use function Laravel\Prompts\info;
use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\note;
use function Laravel\Prompts\text;

class IdeCommand extends Command
{
    protected $signature = 'blade-ui-kit-bs:ide
                            {--output= : Output directory for the VS Code files (default: .vscode)}
                            {--ide-output= : Output directory for ide.json (default: ide-helper/blade-ui-kit-bootstrap)}
                            {--snippets : Generate the VS Code snippets file}
                            {--json : Generate the VS Code Custom Data file}
                            {--ide-json : Generate the PhpStorm/Laravel Idea ide.json file}';

    protected $description = 'Generate IDE metadata (snippets, VS Code Custom Data, PhpStorm) for the components';

    /** @var list<string> */
    private const array ALL_FORMATS = ['snippets', 'json', 'ide-json'];

    private const array FILENAMES = [
        'snippets' => 'blade-ui-kit-bootstrap.code-snippets',
        'json' => 'blade-ui-kit-bootstrap.html-data.json',
        // PhpStorm / Laravel Idea only reads files named exactly `ide.json`. It scans the
        // project recursively and merges every `ide.json` it finds, so this one lives in a
        // package-owned subfolder: it never collides with an app's own root `ide.json`, and
        // is always safe to overwrite on regeneration.
        'ide-json' => 'ide.json',
    ];

    private const string DEFAULT_IDE_DIRECTORY = 'ide-helper/blade-ui-kit-bootstrap';

    public function handle(Filesystem $files): int
    {
        $formats = $this->resolveFormats();

        $vscodeDirectory = array_intersect($formats, ['snippets', 'json']) !== [] ? $this->resolveDirectory() : null;
        $ideDirectory = \in_array('ide-json', $formats, true) ? $this->resolveIdeDirectory() : null;

        $components = config('blade-ui-kit-bootstrap.components', []);
        $prefix = (string) config('blade-ui-kit-bootstrap.prefix', '');
        $version = config('blade-ui-kit-bootstrap.bootstrap_version')->value;

        $model = new ComponentIntrospector($prefix, $version)->introspect($components);

        $written = [];

        foreach ($formats as $format) {
            $directory = $format === 'ide-json' ? $ideDirectory : $vscodeDirectory;

            $payload = match ($format) {
                'snippets' => SnippetsEmitter::emit($model),
                'json' => HtmlDataEmitter::emit($model),
                'ide-json' => IdeJsonEmitter::emit($this->tagToClass($components, $prefix)),
            };

            $files->ensureDirectoryExists($directory);
            $path = $directory.DIRECTORY_SEPARATOR.self::FILENAMES[$format];
            $files->put($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR).PHP_EOL);
            $written[] = $path;
        }

        info('Generated '.\count($written).' IDE metadata file(s):');

        foreach ($written as $path) {
            $this->line('  • '.$path);
        }

        note(
            "Commit these files so your team gets completion without re-running this command.\n".
            "• Snippets (.vscode) work out of the box (fallback).\n".
            "• The .html-data.json feeds the VS Code extension (primary).\n".
            '• ide.json lives in its own folder and is auto-detected (and merged) by Laravel Idea (PhpStorm).'
        );

        return self::SUCCESS;
    }

    /**
     * @return list<string>
     */
    private function resolveFormats(): array
    {
        $selected = array_values(array_filter(
            self::ALL_FORMATS,
            fn (string $format): bool => (bool) $this->option($format)
        ));

        if ($selected !== []) {
            return $selected;
        }

        if (! $this->input->isInteractive()) {
            return self::ALL_FORMATS;
        }

        return multiselect(
            label: 'Which IDE metadata files do you want to generate?',
            options: [
                'snippets' => 'VS Code snippets (.code-snippets) — fallback, zero install',
                'json' => 'VS Code Custom Data (.html-data.json) — for the extension (primary)',
                'ide-json' => 'PhpStorm / Laravel Idea (ide.json)',
            ],
            default: self::ALL_FORMATS,
            required: true,
        );
    }

    private function resolveDirectory(): string
    {
        $output = $this->option('output');

        if ($output === null && $this->input->isInteractive()) {
            $output = text(label: 'VS Code output directory', default: '.vscode');
        }

        $output ??= '.vscode';

        return str_starts_with((string) $output, DIRECTORY_SEPARATOR) ? $output : base_path($output);
    }

    private function resolveIdeDirectory(): string
    {
        $output = $this->option('ide-output') ?? self::DEFAULT_IDE_DIRECTORY;

        return str_starts_with($output, DIRECTORY_SEPARATOR) ? $output : base_path($output);
    }

    /**
     * @param  array<string, class-string>  $components
     * @return array<string, class-string>
     */
    private function tagToClass(array $components, string $prefix): array
    {
        $map = [];

        foreach ($components as $alias => $class) {
            $map[ComponentIntrospector::tagFor($prefix, $alias)] = $class;
        }

        return $map;
    }
}
