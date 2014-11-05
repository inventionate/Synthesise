<?php namespace Synthesise\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Hash;
use Synthesise\Http\Requests\LoginRequest;
use Synthesise\Repositories\Facades\User;
use Synthesise\Extensions\Contracts\Ldap;

/**
 * @Middleware("guest", except={"getLogout"})
 */
class AuthController extends Controller {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	* The LDAP implementation.
	*
	* @var Ldap
	*/
	protected $ldap;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth, Ldap $ldap)
	{
		$this->auth = $auth;
		$this->ldap = $ldap;
	}

	/**
	 * Show the application login form.
	 *
	 * @Get("auth/login")
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		return view('auth.login');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @Post("auth/login")
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

	/**
	 * Log the user out of the application.
	 *
	 * @Get("auth/logout")
	 *
	 * @return Response
	 */
	public function getLogout()
	{
		$this->auth->logout();

		return redirect('/');
	}

}
