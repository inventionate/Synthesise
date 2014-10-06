<?php

// Für die Tests eine Datenbank im Speicher anlegen (Geschwindigkeit!)

return [

	'default' => 'sqlite',

	'connections' => [
		'sqlite' => [
			'driver'    => 'sqlite',
			'database'  => storage_path().'/test.sqlite',
			'prefix'    => ''
		]
	]
];
