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

use BladeUIKitBootstrap\Components\Buttons\Actions\Archives as Base;

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
4. `data()` — Blade captures a snapshot of public properties *(before attributes are set)*
5. `withAttributes()` — Blade assigns non-constructor attributes
6. `hydrateExtraProperties()` — automatic property hydration *(new)*
7. `onAttributesSet()` — your custom logic *(new)*
8. `refreshComponentData()` — updates the stale snapshot so the view sees fresh values *(new)*

## Important Notes

- Only **public** properties are hydrated. Private or protected properties are ignored.
- Only properties declared on **your application classes** are scanned. Package-internal properties are never touched.
- Properties that are **constructor parameters** are handled by Blade normally and skipped by the hydration mechanism.
- If an extra property name conflicts with an HTML attribute you need (e.g., `title`), the property will capture the attribute. Choose distinctive property names to avoid this.
- Bound syntax (`:items-in-archives="$count"`) passes the PHP value directly. Unbound syntax (`items-in-archives="42"`) passes a string that gets coerced.
- You can modify **any component property** in `onAttributesSet()` (e.g., `$this->endContent`) and the view will see the updated value. The package handles the Blade lifecycle timing internally.
