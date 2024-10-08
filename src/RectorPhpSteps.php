<?php

namespace a9f\LifterRecipes;

use a9f\Lifter\Upgrade\Step\RectorStep;
use a9f\Lifter\Upgrade\UpgradeStep;
use a9f\LifterRecipes\Rector\PhpVersion;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;

final class RectorPhpSteps
{
    /**
     * @return list<UpgradeStep>
     */
    public static function getVersionUpdateSteps(?PhpVersion $from = null, ?PhpVersion $to = null): array
    {
        $from ??= PhpVersion::oldest();
        $to ??= PhpVersion::newest();

        return array_map(
            static fn (PhpVersion $version) => new RectorStep(
                sprintf('Run Rector set list %s', $version->name),
                static function (RectorConfig $config) use ($version) {
                    $config->sets([
                        constant(SetList::class . '::' . $version->name)
                    ]);
                }
            ),
            PhpVersion::range($from, $to)
        );
    }
}