<?php
class TestCommons
{
	
	/**
	 * Standardbefehle um Laravel für die Tests zu konfigurieren
	 * Datenbank migrieren und befüllen, E-Mail Modus umstellen
	 *
	 * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
	 */
	public static function prepareLaravel()
	{
		Artisan::call('migrate');
		Artisan::call('db:seed');
		Mail::pretend(true);
	}
	
	/**
	* Testnutzer definieren
	* 
	* @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
	*/
	public static function testuser()
	{
		return array(
			'username' => 'vturner',
			'password' => 'Betwixt',
			'firstname' => 'Victor',
			'lastname' => 'Turner',
			'role' => 'Student',
			'created_at' => '2014-09-17 17:00:00',
			'updated_at' => '2014-09-17 17:00:00',
			'permissions' => 'none',
			'remember_token' => ''
		);
	}
	
}