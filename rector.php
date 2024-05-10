<?php

use Rector\Caching\ValueObject\Storage\FileCacheStorage;
use Rector\CodingStyle\Rector\ArrowFunction\StaticArrowFunctionRector;
use Rector\CodingStyle\Rector\Closure\StaticClosureRector;
use Rector\CodingStyle\Rector\PostInc\PostIncDecToPreIncDecRector;
use Rector\Config\RectorConfig;
use Rector\Php81\Rector\FuncCall\NullToStrictStringFuncCallArgRector;
use Rector\Set\ValueObject\SetList;
use RectorLaravel\Rector\FuncCall\RemoveDumpDataDeadCodeRector;
use RectorLaravel\Rector\PropertyFetch\OptionalToNullsafeOperatorRector;
use RectorLaravel\Set\LaravelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__.'/lang',
        __DIR__.'/src',
    ]);

    $rectorConfig->parallel(
        processTimeout: 360,
        maxNumberOfProcess: 16,
        jobSize: 20
    );

    $rectorConfig->importNames();

    // cache settings
    //----------------------------------------------------------

    // Ensure file system caching is used instead of in-memory.
    $rectorConfig->cacheClass(FileCacheStorage::class);

    // Specify a path that works locally as well as on CI job runners.
    $rectorConfig->cacheDirectory(__DIR__.'/.rector_cache');

    // skip paths and/or rules
    //----------------------------------------------------------
    $rectorConfig->skip([
        // Rector transforme $foo++ en ++$foo et derrière Pint transforme ++$foo en $foo++
        // du coup je désactive, laissant pour le moment la priorité à Pint
        // @todo : voir qu'est-ce qui est le mieux
        PostIncDecToPreIncDecRector::class,

        // Transforms false positives, I prefer to disable that (PHP 8.1)
        NullToStrictStringFuncCallArgRector::class,

        // Ne pas changer les closure et Arrow Function en Static
        StaticClosureRector::class,
        StaticArrowFunctionRector::class,
    ]);

    $rectorConfig->rules([
        OptionalToNullsafeOperatorRector::class,
        RemoveDumpDataDeadCodeRector::class,
    ]);

    $rectorConfig->sets([
        LaravelSetList::LARAVEL_FACADE_ALIASES_TO_FULL_NAMES,
        SetList::PHP_82,
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::TYPE_DECLARATION,
        //SetList::PRIVATIZATION,
        SetList::EARLY_RETURN,
        SetList::INSTANCEOF,
    ]);
};
