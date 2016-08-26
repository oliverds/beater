<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect(route('settings.account.edit'));
    }

    public function editAccount()
    {
        $user = Auth::user();

        return view('user::front.settings.account.edit', compact('user'));
    }

    public function editPassword()
    {
        $user = Auth::user();

        return view('user::front.settings.password.edit', compact('user'));
    }

    public function updateAccount(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha_num|max:40',
            'email' => 'required|email|max:100|unique:users,email,' . Auth::id(),
            'username' => 'required|alpha_dash|max:20|unique:users,name,' . Auth::id(),
        ]);

        $user = Auth::user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
        ]);

        flash('Congrats! You updated your user settings.');

        return redirect()->route('settings.account.edit');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'old_password' => 'required|old_password:' . $user->password,
            'password' => 'required|min:6|confirmed',
        ], [
            'old_password' => 'The :attribute is incorrect.',
        ]);

        $user->update([
            'password' => $request->password,
        ]);

        flash('Congrats! You updated your password.');

        return redirect()->route('settings.password.edit');
    }
}
