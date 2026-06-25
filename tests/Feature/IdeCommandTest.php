<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;

afterEach(function (): void {
    File::deleteDirectory(base_path('.vscode'));
});

it('generates all three files non-interactively', function (): void {
    $this->artisan('blade-ui-kit-bs:ide', ['--no-interaction' => true])
        ->assertSuccessful();

    expect(File::exists(base_path('.vscode/blade-ui-kit-bootstrap.code-snippets')))->toBeTrue()
        ->and(File::exists(base_path('.vscode/blade-ui-kit-bootstrap.html-data.json')))->toBeTrue()
        ->and(File::exists(base_path('.vscode/blade-ui-kit-bootstrap.ide.json')))->toBeTrue();
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

it('honours a custom --output directory', function (): void {
    $this->artisan('blade-ui-kit-bs:ide', ['--output' => 'build/ide', '--json' => true, '--no-interaction' => true])
        ->assertSuccessful();

    expect(File::exists(base_path('build/ide/blade-ui-kit-bootstrap.html-data.json')))->toBeTrue();

    File::deleteDirectory(base_path('build'));
});
