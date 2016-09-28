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

        return back()->withInput();

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
        User::delete($id);

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

        User::deleteMany($ids);

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

        User::deleteAll($role, $except_ids);

        return back()->withInput();
    }

}
