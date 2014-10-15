<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */

$loader = require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

$loader->add('FOS', __DIR__.'/../vendor/bundles');
$loader->add('Symfony', array(__DIR__.'/../vendor/symfony/src', __DIR__.'/../vendor/bundles'));
$loader->add('Symfony'          , array(__DIR__.'/../vendor/symfony/src', __DIR__.'/../vendor/bundles'));
$loader->add('Sensio'           , __DIR__.'/../vendor/bundles');
$loader->add('Metadata'         , __DIR__.'/../vendor/metadata/src');
$loader->add('CG'               , __DIR__.'/../vendor/cg-library/src');
$loader->add('Doctrine\\Common\\DataFixtures' , __DIR__.'/../vendor/doctrine-fixtures/lib');
$loader->add('Doctrine\\Common' ,__DIR__.'/../vendor/doctrine-common/lib');
$loader->add('Doctrine\\DBAL'   , __DIR__.'/../vendor/doctrine-dbal/lib');

return $loader;