<?php

use Rector\CodeQuality\Rector\Expression\InlineIfToExplicitIfRector;
use Rector\CodeQuality\Rector\For_\ForToForeachRector;
use Rector\CodeQuality\Rector\Foreach_\UnusedForeachValueToArrayKeysRector;
use Rector\CodeQuality\Rector\FuncCall\SimplifyStrposLowerRector;
use Rector\CodeQuality\Rector\If_\CombineIfRector;
use Rector\CodeQuality\Rector\If_\ShortenElseIfRector;
use Rector\CodeQuality\Rector\If_\SimplifyIfElseToTernaryRector;
use Rector\CodeQuality\Rector\If_\SimplifyIfReturnBoolRector;
use Rector\CodeQuality\Rector\Return_\SimplifyUselessVariableRector;
use Rector\CodingStyle\Rector\FuncCall\CountArrayToEmptyArrayComparisonRector;
use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\DeadCode\Rector\Concat\RemoveConcatAutocastRector;
use Rector\DeadCode\Rector\Foreach_\RemoveUnusedForeachKeyRector;
use Rector\DeadCode\Rector\Switch_\RemoveDuplicatedCaseInSwitchRector;
use Rector\EarlyReturn\Rector\Foreach_\ChangeNestedForeachIfsToEarlyContinueRector;
use Rector\EarlyReturn\Rector\If_\ChangeIfElseValueAssignToEarlyReturnRector;
use Rector\EarlyReturn\Rector\If_\RemoveAlwaysElseRector;
use Rector\EarlyReturn\Rector\Return_\PreparedValueToEarlyReturnRector;
use Rector\Php73\Rector\FuncCall\ArrayKeyFirstLastRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    // paths to refactor; solid alternative to CLI arguments
    $parameters->set(Option::PATHS, [__DIR__ . '/system/Fixture']);

    // Rector relies on autoload setup of your project; Composer autoload is included by default; to add more:
    $parameters->set(Option::AUTOLOAD_PATHS, [
        // autoload specific file
        __DIR__ . '/system/bootstrap.php',
    ]);

    // auto import fully qualified class names
    $parameters->set(Option::AUTO_IMPORT_NAMES, true);
    $parameters->set(Option::ENABLE_CACHE, true);
    $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_73);

    $services = $containerConfigurator->services();
	$services->set(SimplifyUselessVariableRector::class);
	$services->set(RemoveAlwaysElseRector::class);
	$services->set(CountArrayToEmptyArrayComparisonRector::class);
	$services->set(ForToForeachRector::class);
	$services->set(ChangeNestedForeachIfsToEarlyContinueRector::class);
	$services->set(ChangeIfElseValueAssignToEarlyReturnRector::class);
	$services->set(ArrayKeyFirstLastRector::class);
	$services->set(SimplifyStrposLowerRector::class);
	$services->set(CombineIfRector::class);
	$services->set(SimplifyIfReturnBoolRector::class);
	$services->set(RemoveDuplicatedCaseInSwitchRector::class);
	$services->set(InlineIfToExplicitIfRector::class);
	$services->set(PreparedValueToEarlyReturnRector::class);
	$services->set(ShortenElseIfRector::class);
	$services->set(RemoveUnusedForeachKeyRector::class);
	$services->set(SimplifyIfElseToTernaryRector::class);
	$services->set(UnusedForeachValueToArrayKeysRector::class);
	$services->set(RemoveConcatAutocastRector::class);
};
