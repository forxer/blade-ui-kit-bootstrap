<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;

const IDE_JSON_PATH = 'ide-helper/blade-ui-kit-bootstrap/ide.json';

afterEach(function (): void {
    File::deleteDirectory(base_path('.vscode'));
    File::deleteDirectory(base_path('ide-helper'));
});

it('honours the configured prefix in generated tags', function (): void {
    config()->set('blade-ui-kit-bootstrap.prefix', 'bs');

    $this->artisan('blade-ui-kit-bs:ide', ['--snippets' => true, '--no-interaction' => true])
        ->assertSuccessful();

    $snippets = json_decode(File::get(base_path('.vscode/blade-ui-kit-bootstrap.code-snippets')), true);

    expect($snippets)->toHaveKey('x-bs-btn')->not->toHaveKey('x-btn');
});

it('generates all three files non-interactively, with ide.json in its own folder', function (): void {
    $this->artisan('blade-ui-kit-bs:ide', ['--no-interaction' => true])
        ->assertSuccessful();

    expect(File::exists(base_path('.vscode/blade-ui-kit-bootstrap.code-snippets')))->toBeTrue()
        ->and(File::exists(base_path('.vscode/blade-ui-kit-bootstrap.html-data.json')))->toBeTrue()
        // Laravel Idea reads `ide.json`; we write it to a package-owned subfolder (scanned
        // recursively), never the shared project root and never in .vscode/.
        ->and(File::exists(base_path(IDE_JSON_PATH)))->toBeTrue()
        ->and(File::exists(base_path('ide.json')))->toBeFalse()
        ->and(File::exists(base_path('.vscode/ide.json')))->toBeFalse();

    $ideJson = json_decode(File::get(base_path(IDE_JSON_PATH)), true);
    expect($ideJson['$schema'])->toContain('laravel-ide.com')
        ->and(collect($ideJson['blade']['components'])->pluck('name'))->toContain('x-btn');
});

it('writes valid JSON with the expected component coverage', function (): void {
    $this->artisan('blade-ui-kit-bs:ide', ['--no-interaction' => true])->assertSuccessful();

    $htmlData = json_decode(File::get(base_path('.vscode/blade-ui-kit-bootstrap.html-data.json')), true);
    $tags = array_column($htmlData['tags'], 'name');

    expect($htmlData['version'])->toBe(1.1)
        ->and($tags)->toContain('x-btn')->toContain('x-text')->toContain('x-modal');

    $btn = collect($htmlData['tags'])->firstWhere('name', 'x-btn');
    $variant = collect($btn['attributes'])->firstWhere('name', 'variant');
    expect(array_column($variant['values'], 'name'))->toContain('primary')->toContain('outline-danger');
});

it('restricts output when a single format flag is passed', function (): void {
    $this->artisan('blade-ui-kit-bs:ide', ['--snippets' => true, '--no-interaction' => true])
        ->assertSuccessful();

    expect(File::exists(base_path('.vscode/blade-ui-kit-bootstrap.code-snippets')))->toBeTrue()
        ->and(File::exists(base_path('.vscode/blade-ui-kit-bootstrap.html-data.json')))->toBeFalse();
});

it('honours a custom --output directory for the VS Code files', function (): void {
    $this->artisan('blade-ui-kit-bs:ide', ['--output' => 'build/ide', '--json' => true, '--no-interaction' => true])
        ->assertSuccessful();

    expect(File::exists(base_path('build/ide/blade-ui-kit-bootstrap.html-data.json')))->toBeTrue();

    File::deleteDirectory(base_path('build'));
});

it('honours a custom --ide-output directory for ide.json', function (): void {
    $this->artisan('blade-ui-kit-bs:ide', ['--ide-output' => 'build/idea', '--ide-json' => true, '--no-interaction' => true])
        ->assertSuccessful();

    expect(File::exists(base_path('build/idea/ide.json')))->toBeTrue();

    File::deleteDirectory(base_path('build'));
});

it('overwrites its own ide.json on regeneration without prompting', function (): void {
    File::ensureDirectoryExists(base_path('ide-helper/blade-ui-kit-bootstrap'));
    File::put(base_path(IDE_JSON_PATH), '{"stale":true}');

    $this->artisan('blade-ui-kit-bs:ide', ['--ide-json' => true, '--no-interaction' => true])
        ->assertSuccessful();

    expect(File::get(base_path(IDE_JSON_PATH)))->toContain('BladeUIKitBootstrap')
        ->not->toContain('stale');
});
