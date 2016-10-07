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

		$db_host = config('database.connections.mysql.host');

		$db_username = config('database.connections.mysql.username');

		$db_password = config('database.connections.mysql.password');

		$db_database = config('database.connections.mysql.database');

		// LDAP settings.

		$ldap_domain = config('auth.ldap.domain');

		$ldap_base_dn = config('auth.ldap.baseDn');

		$ldap_bind_dn = config('auth.ldap.bindDn');

		$ldap_bind_pwd = config('auth.ldap.bindPwd');

		$ldap_port = config('auth.ldap.port');

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
