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
        $this->middleware(['auth', 'admin.teacher']);
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

        $email = $request->email;

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
            'username'          => 'string',
            'users'             => 'file',
            'role'              => 'required|string',
            'seminar_names'     => 'array'
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
                // $username, 'unique:users,username|string'
                $username, 'string'
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

            $user = User::findByUsername($username_single);

            if ( is_null($user) )
            {
                User::store($username_single, $role, $firstname, $lastname, $email, $password, $seminar_names);
            }
            elseif ( is_null($user->seminars()->get()->find($seminar_names[0])) )
            {
                User::attachToSeminar($username_single, $seminar_names[0]);

                if( $user->role !== $role )
                {
                    return back()->with('status', 'Die Rolle der von Personen kann nicht geändert werden! Bitte wenden Sie sich an den technischen Support. Die Person wurde gemäß der vorhandenen Rolle hinzugefügt.');
                }

            }

        }

        // @TODO Error Handling, wenn versucht wird den identischen Nutezr noch mal zu erstellen!

        if( $users !== null ) {

            foreach ($usernames as $username) {

                $user = User::findByUsername($username);

                if ( is_null($user) )
                {
                    User::store($username, $role, null, null, null, null, $seminar_names);
                }
                else
                {
                    User::attachToSeminar($username, $seminar_names[0]);
                }

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
            'email' => 'required',
        ]);

        $username = $request->username;

        $role = $request->role;

        $firstname = $request->firstname;

        $lastname = $request->lastname;

        $email = $request->email;

        $password = $request->password;

        User::update($id, $username, $role, $firstname, $lastname, $email, $password);

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

        // Only Admins can be destroyed at the moment.
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
