# Lifter upgrade recipes

This is a collection of useful small upgrade steps, to make it easier to combine a larger upgrade.

## Getting started

Simply add this package to your project:

```bash
$ composer require a9f/lifter-recipes
```


## PHP Upgrades with Rector

Use `\a9f\LifterRecipes\RectorPhpSteps` to get a list of single-version upgrade steps for PHP:

```php
<?php

use a9f\Lifter\Configuration\LifterConfig;
use a9f\LifterRecipes\Rector\PhpVersion;
use a9f\LifterRecipes\RectorPhpSteps;

return static function (LifterConfig $config) {
    // basic Lifter configuration goes here

    $config->withSteps([
        ...RectorPhpSteps::getVersionUpdateSteps(PhpVersion::PHP_74, PhpVersion::PHP_84),
    ]);
};
```

This will run all Rector set lists for all versions from PHP 7.4 to PHP 8.4 (= 7.4, 8.0, 8.1, 8.2, 8.3, 8.4).
