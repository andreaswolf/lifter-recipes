<?php

namespace a9f\LifterRecipes\Tests;

use a9f\LifterRecipes\Rector\PhpVersion;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class PhpVersionTest extends TestCase
{
    #[Test]
    public function getRangeReturnsAllVersionsBetweenRequestedVersionsIncludingRequestedVersions(): void
    {
        $result = PhpVersion::range(PhpVersion::PHP_52, PhpVersion::PHP_54);
        self::assertSame([PhpVersion::PHP_52, PhpVersion::PHP_53, PhpVersion::PHP_54], $result);

        $result = PhpVersion::range(PhpVersion::PHP_70, PhpVersion::PHP_80);
        self::assertSame([PhpVersion::PHP_70, PhpVersion::PHP_71, PhpVersion::PHP_72, PhpVersion::PHP_73, PhpVersion::PHP_74, PhpVersion::PHP_80], $result);
    }
}
