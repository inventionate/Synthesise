<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use User;
use Validator;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * List all Users.
     *
     * @param string $letter
     *
     * @return View
     */
    public function index($letter = null)
    {
        $users = User::getAll();

        $admins = User::getAllByRole('Admin');

        $mentors = User::getAllByRole('Teacher');

        $students = User::getAllByRole('Student');

        return view('user.index')
            ->with('admins', $admins)
            ->with('mentors', $mentors)
            ->with('students', $students)
            ->with('users', $users);
    }

    /**
     * Store a newly created User.
     *
     * @param  Request  $request
     *
     * @return Redirect
     */
    public function store(Request $request)
    {

        // Request
        $username_single = $request->username;

        $users = $request->file('users');

        $role = $request->role;

        // Validation
        $fields = [
            'username'  => $username_single,
            'users'     => $users,
            'role'      => $role
        ];

        $rules = [
            'username'  => 'unique:users|string',
            'users'     => 'file',
            'role'      => 'required|string'
        ];

        // Usernames
        if( $users !== null ) {

            $fields = array_add(
                $fields,
                'extension', strtolower($users->getClientOriginalExtension())
            );

            $rules = array_add(
                $rules,
                'extension', 'in:csv'
            );

            $usernames = User::exportUsernamesOfFile( $users->getRealPath() );

            foreach ($usernames as $username) {

                $fields = array_add(
                $fields,
                $username, $username
                );

                $rules = array_add(
                $rules,
                $username, 'unique:users,username|string'
                );

            }

        }

        // Validation
        $validator = Validator::make($fields, $rules);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }

        // User storage.
        if( $username_single !== "" ) {

            User::store($username_single, $role);

        }

        //@TODO Error Handling, wenn versucht wird den identischen Nutezr noch mal zu erstellen!

        if( $users !== null ) {

            foreach ($usernames as $username) {

                User::store($username, $role);

            }

        };

        return back()->withInput();

    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @return Redirect
     */
    public function destroy($id)
    {
        User::destroy($id);

        return back()->withInput();
    }

    /**
     * Remove multiple Users from storage.
     *
     * @param request   $request.
     *
     * @return Redirect
     */
    public function destroyMany(Request $request)
    {

        $ids = $request->id;

        User::destroyMany($ids);

        return back()->withInput();
    }

    /**
     * Remove multiple Users from storage.
     *
     * @param string   $role
     * @param array    $except_ids
     *
     * @return Redirect
     */
    public function destroyAll(Request $request)
    {

        $role = $request->role;

        $except_ids = $request->except_ids;

        User::destroyAll($role, $except_ids);

        return back()->withInput();
    }

}
