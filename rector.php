<?php

use RectorLaravel\Set\LaravelSetList;
use Rector\CodeQuality\Rector\Array_\CallableThisArrayToAnonymousFunctionRector;
use Rector\CodeQuality\Rector\ClassMethod\ReturnTypeFromStrictScalarReturnExprRector;
use Rector\CodeQuality\Rector\Equal\UseIdenticalOverEqualWithSameTypeRector;
use Rector\Config\RectorConfig;
use Rector\Php70\Rector\StaticCall\StaticCallOnNonStaticToInstanceCallRector;
use Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector;
use Rector\Php81\Rector\Array_\FirstClassCallableRector;
use Rector\Php81\Rector\Class_\MyCLabsClassToEnumRector;
use Rector\Php81\Rector\FuncCall\NullToStrictStringFuncCallArgRector;
use Rector\Php81\Rector\MethodCall\MyCLabsMethodCallToEnumConstRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use Rector\TypeDeclaration\Rector\Closure\AddClosureReturnTypeRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/config',
        __DIR__ . '/lang',
        __DIR__ . '/src',
    ]);

    $rectorConfig->parallel(
        seconds: 360,
        maxNumberOfProcess: 16,
        jobSize: 20
    );

    $rectorConfig->importNames();

    // skip paths and/or rules
    //----------------------------------------------------------
    $rectorConfig->skip([
        // Pour la mise à jour PHP 8.1, ne pas prendre en compte MyCLabs enum to natives PHP enum
        //MyCLabsClassToEnumRector::class,
        //MyCLabsMethodCallToEnumConstRector::class,

        // Transforme des faux-positifs, je préfère désactiver ça (PHP 8.1)
        NullToStrictStringFuncCallArgRector::class,

        // Pas de ça dans les routes car transforme :
        // [Controller::class, 'method'] en (new Controller)->method(...)
        //StaticCallOnNonStaticToInstanceCallRector::class => [__DIR__.'/routes'],
        //FirstClassCallableRector::class => [__DIR__.'/routes'],

        // Également, si SetList::CODE_QUALITY, éviter de transformer dans les routes
        // [GlideController::class, 'images'] en fn($path, Request $request) => (new GlideController())->images($path, $request)
        //CallableThisArrayToAnonymousFunctionRector::class => [__DIR__.'/routes'],
        //ClosureToArrowFunctionRector::class => [__DIR__.'/routes'],
    ]);

    // register single rules
    //----------------------------------------------------------

    // TYPE_DECLARATION
    //$rectorConfig->rule(TypedPropertyFromStrictConstructorRector::class);
    //$rectorConfig->rule(AddVoidReturnTypeWhereNoReturnRector::class);
    //$rectorConfig->rule(AddClosureReturnTypeRector::class);

    // CODE_QUALITY
    //$rectorConfig->rule(ReturnTypeFromStrictScalarReturnExprRector::class);
    //$rectorConfig->rule(UseIdenticalOverEqualWithSameTypeRector::class);

    // define what sets of rules will be applied
    // tip: use "SetList" class to autocomplete sets with your IDE
    //----------------------------------------------------------
    $rectorConfig->sets([
        LaravelSetList::LARAVEL_FACADE_ALIASES_TO_FULL_NAMES,
        LevelSetList::UP_TO_PHP_82,
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::EARLY_RETURN,
        SetList::TYPE_DECLARATION,
    ]);
};
