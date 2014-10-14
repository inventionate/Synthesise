<?php namespace Synthesise\Http\Controllers;

// @todo Auf das neue Authentifizierungssystem umstellen!

use Illuminate\Support\Facades\Auth;
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
	public function index()
	{
		return view('auth.login');
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
		//Remember me Funktion
		$rememberme = Input::get('rememberme');

		//LDAP Authentifizierung
		$ldap = LDAP::authenticate($credentials['username'],$credentials['password']);
		// 2. Wenn LDAP auth erfolgreich -> anmelden mit LDAP Daten
		if ( $ldap )
		{
			if ( Auth::attempt($credentials, $rememberme) )
			{
				return Redirect::route('dashboard');
			}
			else
			{
				// 4. Wenn Anmeldung problematisch Datenbank-Passwort aktualisieren mit LDAP Passwort ( über den eindeutigen uid user->save() )
				$user = User::findByUsername($credentials['username']);
				// HIER MUSS NOCH EINE SCHLEIFE EINGEBAUT WERDEN; WAS PASSIERT WENN DER NUTZERNAME **NICHT** IN DER DATENBANK GEFUNDEN WIRD
				if ( isset($user) )
				{
					$user->password = Hash::make($credentials['password']);
					$user->firstname = $ldap['firstname'];
					$user->lastname = $ldap['lastname'];
					// @todo Auch den Vornamen, den Nachnamen und die E-Mail via LDAP Server einlesen.
					// @todo Durch den StudiIP Import nur noch alle UIDs einlesen.
					$user->save();
					Auth::attempt($credentials, $rememberme);
					return Redirect::route('dashboard');
				}
				else
				{
					// @todo Fehlermedleungen verbessern
					// HIER MUSS DANN AUSGEGEBEN WERDEN, DASS KEINE BERECHTIGUNG BESTEHT (ABER DIE ANGABEN STIMMEN)
					// @todo checken ob die withInput Angaben so gehen (auch ohne Passwort except)
					return Redirect::route('login')->with('login_errors', true)->withInput();
				}
			}
		}
		// Für Nicht-LDAP Accounts eine weitere prüfung durchführen
		elseif( Auth::attempt($credentials, $rememberme) )
		{
			return Redirect::route('dashboard');
		}
		else
		{
			return Redirect::route('login')->with('login_errors', true)->withInput();
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
		return Redirect::route('dashboard');
	}

}
