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
	
}