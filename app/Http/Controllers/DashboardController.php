<?php

namespace Synthesise\Http\Controllers;

use Auth;
use Seminar;
use User;

class DashboardController extends Controller {

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Dashboard anzeigen.
	 *
	 * @return View
	 */
	public function index()
	{

		$seminars = Seminar::getAllWithUserCount();

		$admins = User::getAllByRole('Admin');

		$teachers = User::getAllByRole('Teacher');

		// Database settings.

		$db_host = env('DB_HOST');

		$db_username = env('DB_USERNAME');

		$db_password = env('DB_PASSWORD');

		$db_database = env('DB_DATABASE');

		// LDAP settings.

		$ldap_domain = env('LDAP_DOMAIN');

		$ldap_base_dn = env('LDAP_BASE_DN');

		$ldap_bind_dn = env('LDAP_BIND_DN');

		$ldap_bind_pwd = env('LDAP_BIND_PWD');

		$ldap_port = env('LDAP_PORT');

		//@TODO Überprüfung der Verbindungen durchführen!

		$database_connection = true;

		$ldap_connection = true;

		$piwik_connection = true;


		return view('dashboard.index')
									->with('seminars',$seminars)
									->with('admins',$admins)
									->with('teachers',$teachers)
									->with('db_host',$db_host)
									->with('db_username',$db_username)
									->with('db_password',$db_password)
									->with('db_database',$db_database)
									->with('ldap_domain',$ldap_domain)
									->with('ldap_base_dn',$ldap_base_dn)
									->with('ldap_bind_dn',$ldap_bind_dn)
									->with('ldap_bind_pwd',$ldap_bind_pwd)
									->with('ldap_port',$ldap_port)
									->with('database_connection',$database_connection)
									->with('ldap_connection',$ldap_connection)
									->with('piwik_connection',$piwik_connection);
	}

}
