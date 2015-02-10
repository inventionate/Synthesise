<?php
// Codeception Laravel ausführen lassen

require_once 'TestCase.php';

include __DIR__.'/../vendor/autoload.php'; // composer autoload

$kernel = \AspectMock\Kernel::getInstance();
$kernel->init([
	'debug' => true,
	'includePaths' => [__DIR__.'/../src']
]);

$kernel->loadFile(__DIR__.'/../bootstrap/autoload.php'); // path to your autoloader

// Refactoring Test Commons

require_once __DIR__.'/commons/TestCommons.php';

require_once __DIR__.'/_data/TestDatabaseSeeder.php';
