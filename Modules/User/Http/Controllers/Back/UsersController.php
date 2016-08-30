<?php

namespace Modules\User\Http\Controllers\Back;

use Illuminate\Http\Request;
use Modules\User\Entities\User;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Modules\User\Http\Requests\Back\UserRequest;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('role:admin');
    }

    public function index()
    {
        $users = User::all();

        return view('user::back.users.index')->with(compact('users'));
    }

    public function show($user)
    {
        $user = User::findOrFail($user);

        $roles = Role::all();

        return view('user::back.users.edit')->with(compact('user', 'roles'));
    }

    public function create()
    {
        $user = new User();

        $roles = Role::all();

        return view('user::back.users.create')->with(compact('user', 'roles'));
    }

    public function store(UserRequest $request)
    {
        $user = new User;

        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = $request->password;

        $user->save();

        if (is_null($request->roles)) {
            $request->roles = array();
        }

        $user->syncRoles($request->roles);

        flash('User Created.');

        return Redirect::route('cp.users');
    }

    public function edit($user)
    {
        return Redirect::route('cp.user', $user);
    }

    public function update(UserRequest $request, $user)
    {
        $user = User::findOrFail($user);

        $values = [
            'username'  => $request->username,
            'email' => $request->email,
            'name'  => $request->name,
        ];

        if ($request->has('password')) {
            $values['password'] = $request->password;
        }

        $user->update($values);

        if (is_null($request->roles)) {
            $request->roles = array();
        }

        $user->syncRoles($request->roles);

        flash('User Saved.');

        return Redirect::route('cp.users');
    }

    public function delete($user)
    {
        $user = User::findOrFail($user);

        if (auth()->user()->id === $user->id) {
            abort(406);
        }

        $user->delete($user);

        flash('User Deleted.');

        return Redirect::route('cp.users');
    }
}
