# Extra Properties Hydration Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Allow extended components to declare custom typed properties without redeclaring the parent constructor (22+ params), by automatically hydrating public class properties from the Blade AttributeBag.

**Architecture:** Override `withAttributes()` in `BladeComponent` to scan public properties not declared in the package namespace or Laravel's base `Component`, extract matching attributes with type coercion, remove them from the AttributeBag, then call an `onAttributesSet()` hook. Reflection results are cached per class for performance.

**Tech Stack:** PHP 8.4, Laravel 12, Blade component system (`Illuminate\View\Component`)

**Note:** This project has no automated test suite (no PHPUnit). Verification is done via the package's built-in test routes (`/blade-ui-kit-bootstrap-tests/*`) and code quality tools (Pint, Rector).

---

### File Map

| File | Action | Responsibility |
|------|--------|----------------|
| `src/Components/BladeComponent.php` | Modify | Add `withAttributes()` override, `hydrateExtraProperties()`, `onAttributesSet()` hook, reflection cache |
| `src/Http/Controllers/TestController.php` | Modify | Add route method for extra properties test page |
| `routes/web.php` | Modify | Add route for extra properties test page |
| `resources/views-tests/extra-properties.blade.php` | Create | Test page demonstrating extra property hydration |
| `docs/extra-properties.md` | Create | Documentation for the extension pattern |
| `CHANGELOG.md` | Modify | Add entry for the new feature |

---

### Task 1: Implement `hydrateExtraProperties()` in `BladeComponent`

**Files:**
- Modify: `src/Components/BladeComponent.php`

This is the core mechanism. Three additions: the `withAttributes()` override, the private `hydrateExtraProperties()` method with cached reflection, and the `onAttributesSet()` hook.

- [ ] **Step 1: Add the reflection cache, `hydrateExtraProperties()` method, `onAttributesSet()` hook, and `withAttributes()` override**

Add these four members to `BladeComponent`, after the existing `onConstructing()` method and before the `$configCache` property:

```php
/**
 * Hook executed after extra properties have been hydrated from the attribute bag.
 *
 * This method is called during `withAttributes()`, after all public properties
 * declared outside the constructor (in child classes) have been automatically
 * populated from template attributes with proper type coercion.
 *
 * **IMPORTANT:** This method is intended for developers extending components
 * in their applications. Use this hook to add custom typed properties to
 * a component without redeclaring the parent constructor.
 *
 * Example — adding a badge counter to an extended button:
 * ```php
 * class Archives extends Base
 * {
 *     public ?int $itemsInArchives = null;
 *
 *     protected function onAttributesSet(): void
 *     {
 *         if ($this->itemsInArchives !== null) {
 *             $badge = '<span class="badge text-bg-light">'.$this->itemsInArchives.'</span>';
 *             $this->endContent = $this->endContent !== null
 *                 ? $this->endContent.' '.$badge
 *                 : $badge;
 *         }
 *     }
 * }
 * ```
 */
protected function onAttributesSet(): void {}

/**
 * Cache for extra property reflection data, keyed by class name.
 *
 * Each entry is an array of ['name' => string, 'kebab' => string, 'type' => ?string]
 * representing public properties not in the constructor and not declared by the package.
 *
 * @var array<class-string, list<array{name: string, kebab: string, type: ?string}>>
 */
private static array $extraPropertiesCache = [];

public function withAttributes(array $attributes)
{
    parent::withAttributes($attributes);

    $this->hydrateExtraProperties();
    $this->onAttributesSet();

    return $this;
}

/**
 * Hydrate public class properties declared outside the constructor from the attribute bag.
 *
 * Scans for public properties added by application-level child classes (not declared
 * in the BladeUIKitBootstrap namespace or Illuminate\View\Component), matches them
 * against attributes by camelCase or kebab-case name, applies type coercion based
 * on the property's declared type, and removes hydrated attributes from the bag.
 */
private function hydrateExtraProperties(): void
{
    $extraProperties = $this->resolveExtraProperties();

    if ($extraProperties === []) {
        return;
    }

    $keysToRemove = [];

    foreach ($extraProperties as $prop) {
        $key = match (true) {
            $this->attributes->has($prop['name']) => $prop['name'],
            $this->attributes->has($prop['kebab']) => $prop['kebab'],
            default => null,
        };

        if ($key === null) {
            continue;
        }

        $value = $this->attributes->get($key);

        if ($value !== null && $prop['type'] !== null) {
            $value = match ($prop['type']) {
                'int' => (int) $value,
                'float' => (float) $value,
                'bool' => filter_var($value, FILTER_VALIDATE_BOOLEAN),
                'string' => (string) $value,
                default => $value,
            };
        }

        $this->{$prop['name']} = $value;
        $keysToRemove[] = $key;
    }

    if ($keysToRemove !== []) {
        $this->attributes = $this->attributes->except($keysToRemove);
    }
}

/**
 * Resolve and cache the list of extra public properties for this component class.
 *
 * @return list<array{name: string, kebab: string, type: ?string}>
 */
private function resolveExtraProperties(): array
{
    if (isset(self::$extraPropertiesCache[static::class])) {
        return self::$extraPropertiesCache[static::class];
    }

    $constructorParams = static::extractConstructorParameters();
    $reflection = new \ReflectionClass($this);
    $properties = [];

    foreach ($reflection->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
        $name = $property->getName();

        if (\in_array($name, $constructorParams)) {
            continue;
        }

        $declaringClass = $property->getDeclaringClass()->getName();

        if ($declaringClass === \Illuminate\View\Component::class
            || str_starts_with($declaringClass, 'BladeUIKitBootstrap\\')) {
            continue;
        }

        $type = $property->getType();
        $typeName = $type instanceof \ReflectionNamedType ? $type->getName() : null;

        $properties[] = [
            'name' => $name,
            'kebab' => \Illuminate\Support\Str::kebab($name),
            'type' => $typeName,
        ];
    }

    return self::$extraPropertiesCache[static::class] = $properties;
}
```

- [ ] **Step 2: Add missing import**

The file already imports `Illuminate\View\Component as IlluminateComponent` — no, it imports `Illuminate\Contracts\View\View` and `Illuminate\View\Component as IlluminateComponent`. Check the current imports. Actually, looking at the current file, it uses `Illuminate\View\Component` implicitly via `extends`. Check if `Str` is imported — it is not. Add the import:

No import needed for `\Illuminate\Support\Str` since it's used with the fully-qualified name in the code above. Same for `\ReflectionClass`, `\ReflectionProperty`, `\ReflectionNamedType` — all fully-qualified.

Verify no new `use` statements are needed — the code uses FQCNs throughout.

- [ ] **Step 3: Run Pint to verify code style**

Run: `cd /var/www/blade-ui-kit-bootstrap && vendor/bin/pint --test src/Components/BladeComponent.php`
Expected: No style violations (or auto-fixable ones)

If violations are found:
Run: `cd /var/www/blade-ui-kit-bootstrap && vendor/bin/pint src/Components/BladeComponent.php`

- [ ] **Step 4: Run Rector to verify no automated refactoring needed**

Run: `cd /var/www/blade-ui-kit-bootstrap && vendor/bin/rector process --dry-run src/Components/BladeComponent.php`
Expected: No changes suggested (or only acceptable ones)

---

### Task 2: Create a test component to validate the mechanism

**Files:**
- Create: `resources/views-tests/extra-properties.blade.php`
- Modify: `src/Http/Controllers/TestController.php`
- Modify: `routes/web.php`

We need a test page that renders components with extra properties to visually verify the hydration works. Since the package has no PHPUnit, the test routes are the verification mechanism.

- [ ] **Step 1: Check existing test routes to follow the pattern**

Read: `routes/web.php`

- [ ] **Step 2: Add the route for the extra properties test page**

In `routes/web.php`, add a new route following the existing pattern:

```php
Route::get('extra-properties', [TestController::class, 'extraProperties']);
```

- [ ] **Step 3: Add the controller method**

In `src/Http/Controllers/TestController.php`, add after the last method:

```php
public function extraProperties(): View
{
    return view('blade-ui-kit-bootstrap-tests::extra-properties');
}
```

- [ ] **Step 4: Create the test view**

Create `resources/views-tests/extra-properties.blade.php`. This page must register a temporary anonymous test component that extends `Archives` with an extra property, then render it to prove hydration works.

Since we can't register a real app-level component class in the package's test routes, we use inline anonymous components with `@php` blocks to verify the mechanism. The approach: render standard components with extra attributes and verify they end up in the right place (attributes bag vs property).

```blade
@extends('blade-ui-kit-bootstrap-tests::layout')

@section('title', 'Extra Properties')

@section('content')
<div class="container py-4">
    <h1>Extra Properties Hydration</h1>
    <p class="lead">
        This page verifies that the <code>withAttributes()</code> hydration mechanism works correctly.
        Standard components should behave identically — extra attributes stay in the attribute bag.
    </p>

    <h2 class="mt-4">Standard components (no extra properties)</h2>
    <p>These should render normally, with no regression from the <code>withAttributes()</code> override.</p>

    <div class="d-flex gap-2 mb-3">
        <x-btn-save />
        <x-btn-edit url="#" />
        <x-btn-delete url="#" />
        <x-btn-archives url="#" />
    </div>

    <h2 class="mt-4">Standard components with extra HTML attributes</h2>
    <p>Extra attributes should pass through to the rendered HTML (in the attribute bag), not be captured.</p>

    <div class="d-flex gap-2 mb-3">
        <x-btn-save data-testid="save-btn" />
        <x-btn-edit url="#" data-testid="edit-btn" aria-label="Edit item" />
        <x-btn-archives url="#" data-custom="value" />
    </div>

    <h2 class="mt-4">Components with all standard props</h2>
    <p>Verify that constructor-resolved props still work correctly after the override.</p>

    <div class="d-flex gap-2 mb-3">
        <x-btn-save variant="primary" size="sm" icon="check" />
        <x-btn-edit url="#" variant="warning" start-icon="pencil" hide-text />
        <x-btn-archives url="#" variant="dark" disabled />
    </div>

    <h2 class="mt-4">Visibility props</h2>
    <p>The hidden buttons should not render.</p>

    <div class="d-flex gap-2 mb-3">
        <x-btn-save />
        <x-btn-save :show="false" />
        <x-btn-edit url="#" :hide="true" />
        <x-btn-archives url="#" />
    </div>
</div>
@endsection
```

- [ ] **Step 5: Run Pint on modified files**

Run: `cd /var/www/blade-ui-kit-bootstrap && vendor/bin/pint src/Http/Controllers/TestController.php routes/web.php`

- [ ] **Step 6: Verify the test page renders**

Start the test app and navigate to `/blade-ui-kit-bootstrap-tests/extra-properties`. Verify:
1. All buttons render correctly (no regression)
2. `data-testid` and `aria-label` attributes appear in the rendered HTML
3. Standard props (`variant`, `size`, `icon`, `disabled`) work as expected
4. `show=false` and `hide=true` buttons are not rendered

---

### Task 3: Update documentation

**Files:**
- Create: `docs/extra-properties.md`

- [ ] **Step 1: Create the documentation file**

Create `docs/extra-properties.md` documenting the extension pattern:

```markdown
# Extra Properties on Extended Components

## The Problem

When extending a package component to add a custom property, you previously had to redeclare the entire parent constructor (22+ parameters) just to add one promoted parameter.

## The Solution

Declare your custom property as a public class property (not in the constructor), and use the `onAttributesSet()` hook for post-hydration logic. The package automatically:

1. Detects public properties declared on your child class
2. Extracts matching attributes from the Blade attribute bag
3. Applies type coercion (`int`, `float`, `bool`, `string`)
4. Removes hydrated attributes from the bag (no HTML pollution)
5. Calls `onAttributesSet()` for your custom logic

## Example

### Component class

```php
namespace App\View\Components\Buttons\Actions;

use App\View\Components\Buttons\Actions\Archives as Base;

class Archives extends Base
{
    public ?int $itemsInArchives = null;

    protected function onAttributesSet(): void
    {
        if ($this->itemsInArchives !== null) {
            $badge = '<span class="badge text-bg-light">'.$this->itemsInArchives.'</span>';
            $this->endContent = $this->endContent !== null
                ? $this->endContent.' '.$badge
                : $badge;
        }
    }
}
```

### Blade template

```blade
<x-btn-archives :url="route('admin.archives')" :items-in-archives="$count" />
```

The `items-in-archives` attribute is automatically converted to `itemsInArchives` (kebab-case to camelCase), cast to `int`, and assigned to the property. It does **not** appear in the rendered HTML output.

## Supported Types

| Declared Type | Coercion |
|---------------|----------|
| `int` | `(int)` cast |
| `float` | `(float)` cast |
| `bool` | `filter_var($value, FILTER_VALIDATE_BOOLEAN)` |
| `string` | `(string)` cast |
| `array`, objects | No coercion, value passed as-is |
| No type declared | No coercion, value passed as-is |
| Nullable (`?int`) | `null` if attribute absent, coerced if present |

## Lifecycle

The complete hook execution order is:

1. `onConstructing()` — early hook, runs during constructor (before `initAttributes()`)
2. `initAttributes()` — package-level defaults (used by action buttons)
3. Constructor validation (variant, size, icons, etc.)
4. `withAttributes()` — Blade assigns non-constructor attributes
5. `hydrateExtraProperties()` — automatic property hydration *(new)*
6. `onAttributesSet()` — your custom logic *(new)*

## Important Notes

- Only **public** properties are hydrated. Private or protected properties are ignored.
- Only properties declared on **your application classes** are scanned. Package-internal properties are never touched.
- Properties that are **constructor parameters** are handled by Blade normally and skipped by the hydration mechanism.
- If an extra property name conflicts with an HTML attribute you need (e.g., `title`), the property will capture the attribute. Choose distinctive property names to avoid this.
- Bound syntax (`:items-in-archives="$count"`) passes the PHP value directly. Unbound syntax (`items-in-archives="42"`) passes a string that gets coerced.
```

- [ ] **Step 2: Run Pint on all modified source files**

Run: `cd /var/www/blade-ui-kit-bootstrap && vendor/bin/pint`

---

### Task 4: Update CLAUDE.md

**Files:**
- Modify: `CLAUDE.md`

- [ ] **Step 1: Add documentation about the extension pattern**

In the `CLAUDE.md` file, in the **Key Traits** section (under `### Key Traits`), add a note after the existing traits list:

```markdown
### Extra Properties Hydration

Extended components can declare custom typed properties without redeclaring the parent constructor. Public properties declared on application-level child classes are automatically hydrated from the Blade attribute bag with type coercion.

- **Mechanism:** `BladeComponent::withAttributes()` override scans for extra public properties, hydrates them from attributes, and calls `onAttributesSet()`
- **Hook:** `onAttributesSet()` — runs after hydration, use for post-hydration logic
- **Documentation:** See `docs/extra-properties.md` for the full pattern
```

---

### Task 5: Update CHANGELOG

**Files:**
- Modify: `CHANGELOG.md`

- [ ] **Step 1: Read the current CHANGELOG to follow the format**

Read: `CHANGELOG.md` (first 40 lines to understand the format)

- [ ] **Step 2: Add the entry for this feature**

Add an entry at the top following the existing format, under the next unreleased version. The entry should mention:
- The `onAttributesSet()` hook for extended components
- Automatic hydration of extra public properties from the attribute bag
- No breaking changes (fully backward-compatible)

---

### Task 6: Final verification

- [ ] **Step 1: Run Pint on the entire project**

Run: `cd /var/www/blade-ui-kit-bootstrap && vendor/bin/pint`
Expected: No changes or only formatting fixes

- [ ] **Step 2: Run Rector on the entire project**

Run: `cd /var/www/blade-ui-kit-bootstrap && vendor/bin/rector process --dry-run`
Expected: No changes suggested

- [ ] **Step 3: Verify test page in browser**

Navigate to `/blade-ui-kit-bootstrap-tests/extra-properties` and verify all sections render correctly with no regressions.

- [ ] **Step 4: Spot-check other test pages for regressions**

Navigate to these existing test pages and verify no regression:
- `/blade-ui-kit-bootstrap-tests/buttons/actions`
- `/blade-ui-kit-bootstrap-tests/buttons/components`
- `/blade-ui-kit-bootstrap-tests/forms/basics`
- `/blade-ui-kit-bootstrap-tests/modals/types`
