<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;


/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

set_include_path('/server-root/codebase/library' . PATH_SEPARATOR . get_include_path());
$loader->setUseIncludePath(true);

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
