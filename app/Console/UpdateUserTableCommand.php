<?php namespace Synthesise\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Synthesise\User;

class UpdateUserTableCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'update-user-table';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Updates the user table.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		// MySQL Einstellungen zum Ändern der ID festlegen
		DB::statement('SET foreign_key_checks=0');
		// Tabelle löschen.
		User::truncate();
		// Tabelle befüllen.
		Artisan::call('db:seed', ['--class' => 'UserTableSeeder', '--force']);
		// MySQL Einstellungen rückgängig machen.
		DB::statement('SET foreign_key_checks=1');
		$this->comment('User Table updated.');
	}


}
