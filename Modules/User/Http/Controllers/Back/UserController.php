<?php

namespace Modules\User\Http\Controllers\Back;

use Illuminate\Http\Request;
use Modules\User\Entities\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Modules\User\Http\Requests\Back\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user::back.users.index')->with(compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('user::back.users.edit')->with(compact('user'));
    }

    public function create()
    {
        return view('user::back.users.create', ['user' => new User()]);
    }

    public function store(UserRequest $request)
    {
        $user = new User;

        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = $request->password;

        $user->save();

        flash('User Saved.');

        return Redirect::route('cp.users.index');
    }

    public function edit($id)
    {
        return Redirect::route('cp.users.show', $id);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $values = [
            'username'  => $request->username,
            'email' => $request->email,
            'name'  => $request->name,
            'password'  => $request->password,
        ];

        if ($request->has('password')) {
            $values['password'] = $request->password;
        }

        $user->update($values);

        flash('User Created.');

        return Redirect::route('cp.users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (auth()->user()->id === $user->id) {
            abort(406);
        }

        $user->delete($user);

        flash('User Deleted.');

        return Redirect::route('cp.users.index');
    }
}
