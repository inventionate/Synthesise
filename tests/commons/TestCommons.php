<?php
class TestCommons
{

	/**
	 * Standardbefehle um Laravel für die Tests zu konfigurieren
	 * Datenbank migrieren und E-Mail Modus umstellen
	 *
	 */
	public static function prepareLaravel()
	{
		Artisan::call('migrate');
		Mail::pretend(true);
	}

	/**
	* Standardbefehle um Laravel für die Tests zu konfigurieren
	* Datenbank befüllen
	*
	*/
	public static function dbSeed()
	{
		Artisan::call('db:seed');
	}

	/**
	* Test Dummy "Nutzer" definieren
	*
	* @return 		array
	*/
	public static function dummyUser()
	{
		return [
			'id' 							=> 1,
			'username' 				=> 'vturner',
			'password' 				=> 'Betwixt',
			'firstname' 			=> 'Victor',
			'lastname' 				=> 'Turner',
			'role' 						=> 'Student',
			'created_at' 			=> '2014-09-17 17:00:00',
			'updated_at' 			=> '2014-09-17 17:00:00',
			'permissions' 		=> 'none',
			'remember_token' 	=> ''
		];
	}

	/**
	* Test Dummy "Note" definieren
	*
	* @return 		array
	*/
	public static function dummyNote()
	{
		return [
			'id' 								=> 1,
			'note' 							=> 'Lorem ipsum…',
			'user_id' 					=> 1,
			'cuepoint_id' 			=> 1,
			'video_videoname' 	=> 'Sozialgeschichte 1',
			'created_at' 				=> '2014-09-17 17:00:00',
			'updated_at' 				=> '2014-09-17 17:00:00'
		];
	}

	/**
	* Test Dummy "Cuepoint" definieren
	*
	* @return			array
	*/
	public static function dummyCuepoint()
	{
		return [
			'id' 								=> 1,
			'cuepoint' 					=> 1,
			'video_videoname' 	=> 'Sozialgeschichte 1',
			'content' 					=> 'Lorem ipsum…',
			'created_at' 				=> '2014-09-17 17:00:00',
			'updated_at'	 			=> '2014-09-17 17:00:00'
		];
	}

	/**
	* Test Dummy "FAQ" definieren
	*
	* @return 		array
	*/
	public static function dummyFaq()
	{
		return [
			'id' 					=> 1,
			'area' 				=> 'A',
			'subject' 		=> 'Allgemeine Fragen',
			'question' 		=> 'Wo geht die Sonne auf?',
			'answer' 			=> 'Im Morgenland.',
			'created_at'	=> '2014-09-17 17:00:00',
			'updated_at' 	=> '2014-09-17 17:00:00'
		];
	}


}
