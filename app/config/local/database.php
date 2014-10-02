<?php

return array(
	
	'default' => 'sqlite',

	'connections' => array(

		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 's3_database',
			'username'  => 'root',
			'password'  => 'mysql',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
		
		'sqlite' => array(
			'driver'   => 'sqlite',
			'database' => __DIR__.'/../../database/development.sqlite',
			'prefix'   => '',
		)

	),

);
