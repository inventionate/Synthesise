<?php


/**
 * Inherited Methods.
 *
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
 */
class UnitTester extends \Codeception\Actor
{
    use _generated\UnitTesterActions;

    /**
     * Überprüft ob eine Methode existiert.
     */
    public function seeMethod($object, $method)
    {
        $this->assertTrue(method_exists($object, $method));
    }

    /**
     * Übrpüft ob ein Objekt erzeugt werden kann.
     */
    public function canCreate($class)
    {
        $class = 'Synthesise\\'.$class;
        $this->assertNotNull(new $class());
    }
}
