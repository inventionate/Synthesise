<?php

namespace Synthesise\Http\Controllers\Auth;

use Synthesise\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use LDAP;
use User;
use App;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
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
            'username' => 'required|alpha_num',
            'password' => 'required',
            'rememberme' => 'boolean',
        ]);

        // 1. LDAP Check (-> korrekte Daten)
        $credentials = $request->only('username', 'password');
        $rememberme = $request->rememberme;

        // Regenerate session ID
        $request->session()->regenerate();

        //LDAP Authentifizierung
        // 2. Wenn LDAP auth erfolgreich -> anmelden mit LDAP Daten
        if (App::environment('testing', 'dev')) {
            $ldap = true;
        } else {
            $ldap = LDAP::authenticate($credentials['username'], $credentials['password']);
        }

        if ($ldap) {
            if (Auth::attempt($credentials, $rememberme)) {

                // Check how many seminars.

                if (Auth::user()->seminars()->count() === 1 && Auth::user()->role !== 'Admin') {
                    return redirect()->route('seminar', ['name' => Auth::user()->seminars()->pluck('name')->first()]);
                } else {
                    return redirect()->intended('/');
                }
            } else {
                // 4. Wenn Anmeldung problematisch Datenbank-Passwort aktualisieren mit LDAP Passwort ( über den eindeutigen uid user->save() )

                $user = User::findByUsername($credentials['username']);

                if (isset($user)) {
                    User::update($user->id, $user->username, $user->role, $ldap['firstname'], $ldap['lastname'], $ldap['email'], $credentials['password']);

                    Auth::attempt($credentials, $rememberme);

                    if (Auth::user()->seminars()->count() === 1 && Auth::user()->role !== 'Admin') {
                        return redirect()->route('seminar', ['name' => Auth::user()->seminars()->pluck('name')->first()]);
                    } else {
                        return redirect()->intended('/');
                    }
                } else {
                    // @todo Fehlermedleungen verbessern
                    // HIER MUSS DANN AUSGEGEBEN WERDEN, DASS KEINE BERECHTIGUNG BESTEHT (ABER DIE ANGABEN STIMMEN)
                    return redirect('login')->with('login_errors', true)->withInput();
                }
            }
        }
        // Für Nicht-LDAP Accounts eine weitere prüfung durchführen
        elseif (Auth::attempt($credentials, $rememberme)) {
            if (Auth::user()->seminars()->count() === 1 && Auth::user()->role !== 'Admin') {
                return redirect()->route('seminar', ['name' => Auth::user()->seminars()->pluck('name')->first()]);
            } else {
                return redirect()->intended('/');
            }
        } else {
            return redirect('login')->with('login_errors', true)->withInput();
        }
    }
}
