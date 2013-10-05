<?php

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

// Composer autoloading
$loader = require 'vendor/autoload.php';

$loader->add('Test', __DIR__);

Test\Bootstrap::init(Zend\Mvc\Application::init(require 'config/application.config.php'));
