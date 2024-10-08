<?php

namespace a9f\LifterRecipes\Rector;

enum PhpVersion: int
{
    case PHP_52 = 50200;
    case PHP_53 = 50300;
    case PHP_54 = 50400;
    case PHP_55 = 50500;
    case PHP_56 = 50600;
    case PHP_70 = 70000;
    case PHP_71 = 70100;
    case PHP_72 = 70200;
    case PHP_73 = 70300;
    case PHP_74 = 70400;
    case PHP_80 = 80000;
    case PHP_81 = 80100;
    case PHP_82 = 80200;
    case PHP_83 = 80300;
    case PHP_84 = 80400;

    /**
     * @param PhpVersion $from
     * @param PhpVersion $to
     * @return list<PhpVersion>
     */
    public static function range(self $from, self $to): array
    {
        $cases = self::cases();
        /** @var int $fromIndex Definitely an int since we know that $from is one of our values */
        $fromIndex = array_search($from, $cases);
        $toIndex = array_search($to, $cases);

        return array_splice($cases, $fromIndex, $toIndex - $fromIndex + 1);
    }

    /**
     * Returns the oldest supported version for Rector PHP upgrades
     */
    public static function oldest(): PhpVersion
    {
        return self::PHP_52;
    }

    public static function newest(): PhpVersion
    {
        return self::PHP_84;
    }
}
