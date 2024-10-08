<?php

namespace a9f\LifterRecipes\Tests;

use a9f\Lifter\Upgrade\Step\RectorStep;
use a9f\LifterRecipes\Rector\PhpVersion;
use a9f\LifterRecipes\RectorPhpSteps;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class RectorPhpStepsTest extends TestCase
{
    #[Test]
    public function getVersionUpdateStepsReturnsListOfUpgradeStepsWithOneStepPerVersion(): void
    {
        $result = RectorPhpSteps::getVersionUpdateSteps(PhpVersion::PHP_52, PhpVersion::PHP_53);
        self::assertCount(2, $result);
        self::assertInstanceOf(RectorStep::class, $result[0]);
        self::assertInstanceOf(RectorStep::class, $result[1]);
    }
}
