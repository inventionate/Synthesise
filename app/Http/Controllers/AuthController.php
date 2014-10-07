<?php namespace Synthesise\Http\Controllers;

// use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use Synthesise\Repositories\Facades\User;
use Synthesise\Extensions\Facades\Ldap;

class AuthController {

	/**
	 * Loginformular anzeigen.
	 *
	 * @return auth.login View.
	 */
	public function index() {
			return View::make('auth.login');
		}

	/**
	 * Loginlogik
	 * Validieren der Daten, LDAP Server checken und schließlich auf das Dashboard weiterleiten
	 *
	 * @return Rederict Entweder zur home Route oder zurück zur Login Route.
	 */
	public function login()
	{
		// 1. LDAP Check (-> korrekte Daten)
		$credentials = [
						'username' => Input::get('username'),
						'password' => Input::get('password')
					];

		$ldap = LDAP::authenticate($credentials['username'],$credentials['password']);
		// 2. Wenn LDAP auth erfolgreich -> anmelden mit LDAP Daten
		if ( $ldap )
		{
			if ( Auth::attempt($credentials) )
			{
				return Redirect::intended('home');
			}
			else
			{
				// 4. Wenn Anmeldung problematisch Datenbank-Passwort aktualisieren mit LDAP Passwort ( über den eindeutigen uid user->save() )
				$user = User::findByUsername($credentials['username']);
				// HIER MUSS NOCH EINE SCHLEIFE EINGEBAUT WERDEN; WAS PASSIERT WENN DER NUTZERNAME **NICHT** IN DER DATENBANK GEFUNDEN WIRD
				if ( isset($user) )
				{
					$user->password = Hash::make($credentials['password']);
					// @todo Auch den Vornamen, den Nachnamen und die E-Mail via LDAP Server einlesen.
					// @todo Durch den StudiIP Import nur noch alle UIDs einlesen.
					$user->save();
					Auth::attempt($credentials);
					return Redirect::intended('home');
				}
				else
				{
					// DIE FEHLERMELDUNGEN MÜSSEN NOCH VERBESSERT WERDEN!!!
					// HIER MUSS DANN AUSGEGEBEN WERDEN, DASS KEINE BERECHTIGUNG BESTEHT (ABER DIE ANGABEN STIMMEN)
					return Redirect::route('login')->with('login_errors', true);
				}
			}
		}
		// Für Nicht-LDAP Accounts eine weitere prüfung durchführen
		elseif( Auth::attempt($credentials) )
		{
			return Redirect::intended('home');
		}
		else
		{
			return Redirect::route('login')->with('login_errors', true);
		}
	}

	/**
	 * Abmelden
	 *
	 * @return Rederict Zur home Route (nanch der Abmeldung).
	 */
	public function logout()
	{
		Auth::logout();
		return Redirect::route('home');
	}

}
