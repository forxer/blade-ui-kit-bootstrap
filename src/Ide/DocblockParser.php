<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Ide;

final class DocblockParser
{
    /**
     * First non-tag text line of a docblock (the summary).
     */
    public static function summary(string|false|null $doc): ?string
    {
        if ($doc === false || $doc === null) {
            return null;
        }

        foreach (self::lines($doc) as $line) {
            if ($line === '') {
                continue;
            }

            if (str_starts_with($line, '@')) {
                continue;
            }

            return $line;
        }

        return null;
    }

    /**
     * Single-quoted literals in the `@var` union type, excluding `null`.
     *
     * @return list<string>
     */
    public static function varLiterals(string|false|null $doc): array
    {
        if ($doc === false || $doc === null) {
            return [];
        }

        foreach (self::lines($doc) as $line) {
            if (str_starts_with($line, '@var')) {
                return self::quotedLiterals($line);
            }
        }

        return [];
    }

    /**
     * Summary text following `$name` in its `@param` line.
     */
    public static function paramSummary(string|false|null $doc, string $name): ?string
    {
        if ($doc === false || $doc === null) {
            return null;
        }

        foreach (self::lines($doc) as $line) {
            if (! str_starts_with($line, '@param')) {
                continue;
            }

            if (preg_match('/\$'.preg_quote($name, '/').'\b\s+(.+)$/', $line, $matches) === 1) {
                return trim($matches[1]);
            }
        }

        return null;
    }

    /**
     * Single-quoted literals on a line, excluding `null`.
     *
     * @return list<string>
     */
    private static function quotedLiterals(string $line): array
    {
        preg_match_all("/'([^']*)'/", $line, $matches);

        return array_values(array_filter(
            $matches[1],
            static fn (string $value): bool => $value !== 'null'
        ));
    }

    /**
     * Normalised docblock lines: comment borders and leading `*` stripped.
     *
     * @return list<string>
     */
    private static function lines(string $doc): array
    {
        $lines = [];

        foreach (preg_split('/\R/', $doc) ?: [] as $raw) {
            $line = trim($raw);
            $line = preg_replace('#^/\*\*?#', '', $line) ?? $line;
            $line = preg_replace('#\*/$#', '', $line) ?? $line;
            $line = ltrim($line, " \t*");
            $lines[] = trim($line);
        }

        return $lines;
    }
}
