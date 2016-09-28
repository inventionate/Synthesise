<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use User;
use Validator;
use Redirect;
use URL;

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
     * Redirect by role.
     *
     * @param  string  $role
     *
     * @return Redirect
     */
    private function redirectByRole($role)
    {

        if ( $role === 'Admin' )
        {
            return Redirect::to(URL::previous() . "#manage-admins");
        }
        elseif ( $role === 'Teacher')
        {
            return Redirect::to(URL::previous() . "#manage-teachers");
        }
        elseif ( $role === 'Mentor')
        {
            return Redirect::to(URL::previous() . "#manage-mentors");
        }
        elseif ( $role === 'Student')
        {
            return Redirect::to(URL::previous() . "#manage-students");
        }
        else
        {
            return back()->withInput();
        }
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

        $firstname = $request->firstname;

        $lastname = $request->lastname;

        $password = $request->password;

        $seminar_names = $request->seminar_names;

        // Validation
        $fields = [
            'username'      => $username_single,
            'users'         => $users,
            'role'          => $role,
            'seminar_names'  => $seminar_names
        ];

        $rules = [
            'username'          => 'unique:users|string',
            'users'             => 'file',
            'role'              => 'required|string',
            'seminar_names'     => 'required|array'
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

            User::store($username_single, $role, $firstname, $lastname, $password, $seminar_names);

        }

        //@TODO Error Handling, wenn versucht wird den identischen Nutezr noch mal zu erstellen!

        if( $users !== null ) {

            foreach ($usernames as $username) {

                User::store($username, $role, $seminar_names);

            }

        };

        // Rediret
        return $this->redirectByRole($role);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {

        // Validation
        $this->validate($request, [
            'username' => 'required',
            'role' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        $username = $request->username;

        $role = $request->role;

        $firstname = $request->firstname;

        $lastname = $request->lastname;

        $password = $request->password;

        User::update($id, $username, $role, $firstname, $lastname, $password);

        // Rediret
        return $this->redirectByRole($role);
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

        User::delete($id);

        $role = 'Admin';

        return $this->redirectByRole($role);

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

        $role = $request->role;

        $seminar_names = $request->seminar_names;

        User::deleteMany($ids, $seminar_names);

        // Rediret
        return $this->redirectByRole($role);

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

        $except_ids = $request->except_ids;

        $seminar_names = $request->seminar_names;

        User::deleteAll($role, $except_ids, $seminar_names);

        // Rediret
        return $this->redirectByRole($role);

    }

}
