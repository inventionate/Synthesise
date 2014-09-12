<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class UnitHelper extends \Codeception\Module
{
	/**
	 * Überprüft ob eine Methode existiert
	 * Codeception Helper
	 *
	 */
	public function seeMethod($object, $method)
	{
		$this->assertTrue(method_exists($object, $method));
	}

	/**
	 * Übrpüft ob ein Objekt erzeugt werden kann
	 * Codeception Helper
	 *
	 */
	public function canCreate($class)
	{
		$class = 'Synthesise\\' . $class;
		$this->assertNotNull(new $class);
	}

}
