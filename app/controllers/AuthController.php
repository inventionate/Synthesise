<?php

class AuthController extends \BaseController {

	/**
	 * Laden des Login-Views
	 *
	 * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
	 */
	public function index() {
			return View::make('login');
		}
	
	/**
	 * Loginlofik
	 * Validieren der Daten, LDAP Server checken und schließlich auf das Dashboard weiterleiten
	 * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
	 */
	public function login()
	{
		// 1. LDAP Check (-> korrekte Daten)
		$credentials = [
						'username' => Input::get('username'),
						'password' => Input::get('password')	
					];
								
		$ldap = Ldap::authenticate($credentials['username'],$credentials['password']);
		// 2. Wenn LDAP auth erfolgreich -> anmelden mit LDAP Daten
		if ( $ldap ) 
		{
			if ( Auth::attempt($credentials) ) 
			{
				return Redirect::route('home');
			}
			else 
			{
				// 4. Wenn Anmeldung problematisch Datenbank-Passwort aktualisieren mit LDAP Passwort ( über den eindeutigen uid user->save() )	
				$user = User::findByUsername($credentials['username']);
				// HIER MUSS NOCH EINE SCHLEIFE EINGEBAUT WERDEN; WAS PASSIERT WENN DER NUTZERNAME **NICHT** IN DER DATENBANK GEFUNDEN WIRD
				if ( isset($user) )
				{
					$user->password = Hash::make($credentials['password']);
					$user->save();
					Auth::attempt($credentials);
					return Redirect::route('home');
				}
				else
				{
					// DIE FEHLERMELDUNGEN MÜSSEN NOCH VERBESSERT WERDEN!!!
					// HIER MUSS DANN AUSGEGEBEN WERDEN, DASS KEINE BERECHTIGUNG BESTEHT (ABER DIE ANGABEN STIMMEN)
					return Redirect::route('login')->with('login_errors', true);
				}
			}
		}
		else 
		{
			return Redirect::route('login')->with('login_errors', true);
		}
	}

	/**
	 * Abmelden
	 *
	 * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
	 */
	public function logout()
	{
		Auth::logout();
		return Redirect::route('home');
	}

}