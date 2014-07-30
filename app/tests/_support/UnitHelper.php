<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class UnitHelper extends \Codeception\Module
{

	public function seeMethod($object, $method)
	{
		$this->assertTrue(method_exists($object, $method));
	}
	
	public function canCreate($class)
	{
		$this->assertNotNull(new $class);
	}


}