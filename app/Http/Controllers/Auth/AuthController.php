<?php

namespace Synthesise\Http\Controllers\Auth;

use Synthesise\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Synthesise\Repositories\Facades\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Synthesise\Extensions\Contracts\Ldap;
use Illuminate\Contracts\Container\Container;

class AuthController extends Controller
{
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
     * @param \Illuminate\Contracts\Auth\Guard $auth
     * @param  $ldap
     */
    public function __construct(Ldap $ldap)
    {
        $this->ldap = $ldap;

        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Handle a login request to the application.
     *
     * @param LoginRequest $request
     *
     * @return Response
     */
    public function login(Request $request)
    {

        // Validation
        $this->validate($request, [
            'username' 		=> 'required|alpha_num',
      		'password' 		=> 'required',
      		'rememberme' 	=> 'boolean'
        ]);

        // 1. LDAP Check (-> korrekte Daten)
        $credentials = $request->only('username', 'password');
        $rememberme = $request->rememberme;

        //LDAP Authentifizierung
        // 2. Wenn LDAP auth erfolgreich -> anmelden mit LDAP Daten
        if (App::environment('testing', 'dev')) {
            $ldap = true;
        } else {
            $ldap = $this->ldap->authenticate($credentials['username'], $credentials['password']);
        }

        if ($ldap) {
            if (Auth::attempt($credentials, $rememberme)) {
                return redirect()->intended('/');
            } else {
                // 4. Wenn Anmeldung problematisch Datenbank-Passwort aktualisieren mit LDAP Passwort ( über den eindeutigen uid user->save() )
        $user = User::findByUsername($credentials['username']);
        // HIER MUSS NOCH EINE SCHLEIFE EINGEBAUT WERDEN; WAS PASSIERT WENN DER NUTZERNAME **NICHT** IN DER DATENBANK GEFUNDEN WIRD
        if (isset($user)) {
            $user->password = Hash::make($credentials['password']);
            $user->firstname = $ldap['firstname'];
            $user->lastname = $ldap['lastname'];
          // @todo Auch den Vornamen, den Nachnamen und die E-Mail via LDAP Server einlesen.
          // @todo Durch den StudiIP Import nur noch alle UIDs einlesen.
          $user->save();
            Auth::attempt($credentials, $rememberme);

            return redirect()->intended('/');
        } else {
            // @todo Fehlermedleungen verbessern
          // HIER MUSS DANN AUSGEGEBEN WERDEN, DASS KEINE BERECHTIGUNG BESTEHT (ABER DIE ANGABEN STIMMEN)
          // @todo checken ob die withInput Angaben so gehen (auch ohne Passwort except)
          return redirect('login')->with('login_errors', true)->withInput();
        }
            }
        }
        // Für Nicht-LDAP Accounts eine weitere prüfung durchführen
        elseif (Auth::attempt($credentials, $rememberme)) {
            return redirect()->intended('/');
        } else {
            return redirect('login')->with('login_errors', true)->withInput();
        }
    }

    // /**
    //  * Get a validator for an incoming registration request.
    //  *
    //  * @param  array  $data
    //  * @return \Illuminate\Contracts\Validation\Validator
    //  */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|max:255',
    //         'email' => 'required|email|max:255|unique:users',
    //         'password' => 'required|min:6|confirmed',
    //     ]);
    // }
    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return User
    //  */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }
}
