<?php
// Codeception Laravel ausführen lassen

include __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/start.php';

$kernel = \AspectMock\Kernel::getInstance();
$kernel->init([
	'debug' => true,
	'includePaths' => [__DIR__.'/../src']
]);

// Refactoring Test Commons

require_once __DIR__.'/commons/TestCommons.php';