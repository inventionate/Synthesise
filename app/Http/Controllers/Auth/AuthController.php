<?php namespace Synthesise\Http\Controllers\Auth;

use Synthesise\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Synthesise\Http\Requests\LoginRequest;
use Synthesise\Repositories\Facades\User;
use Illuminate\Support\Facades\Hash;
use Synthesise\Extensions\Contracts\Ldap;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/
	use AuthenticatesAndRegistersUsers;

	/**
	* The LDAP implementation.
	*
	* @var Ldap
	*/
	protected $ldap;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  $ldap
	 * @return void
	 */
	public function __construct(Guard $auth, Ldap $ldap)
	{
		$this->auth = $auth;
		$this->ldap = $ldap;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  LoginRequest  $request
	 * @return Response
	 */
	public function postLogin(LoginRequest $request)
	{
    // 1. LDAP Check (-> korrekte Daten)
	  $credentials = $request->only('username', 'password');
    $rememberme = $request->rememberme;

    //LDAP Authentifizierung
    $ldap = $this->ldap->authenticate($credentials['username'],$credentials['password']);
    // 2. Wenn LDAP auth erfolgreich -> anmelden mit LDAP Daten
		// if (true)
		if ( $ldap )
    {
      if ( $this->auth->attempt($credentials, $rememberme) )
      {
        return redirect()->intended('/');
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
          $this->auth->attempt($credentials, $rememberme);
          return redirect()->intended('/');
        }
        else
        {
          // @todo Fehlermedleungen verbessern
          // HIER MUSS DANN AUSGEGEBEN WERDEN, DASS KEINE BERECHTIGUNG BESTEHT (ABER DIE ANGABEN STIMMEN)
          // @todo checken ob die withInput Angaben so gehen (auch ohne Passwort except)
          return redirect('auth/login')->with('login_errors', true)->withInput();
        }
      }
    }
    // Für Nicht-LDAP Accounts eine weitere prüfung durchführen
    elseif( $this->auth->attempt($credentials, $rememberme) )
    {
      return redirect()->intended('/');
    }
    else
    {
      return redirect('auth/login')->with('login_errors', true)->withInput();
    }
	}

}
