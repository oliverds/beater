<?php

namespace Modules\EmailAuth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Modules\EmailAuth\Entities\LoginToken;
use Modules\EmailAuth\Entities\AuthenticatesUser;

class LoginController extends Controller
{
    protected $auth;

    protected $redirectTo = '/home';

    public function __construct(AuthenticatesUser $auth)
    {
        $this->auth = $auth;

        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login()
    {
        return view('emailauth::front.login');
    }

    public function postLogin()
    {
        $this->auth->invite();

        flash('We sent you a link to sign in. Please check your inbox.')
            ->important();

        return back();
    }

    public function authenticate(LoginToken $token)
    {
        $this->auth->login($token);

        return redirect()->intended($this->redirectTo);

        return 'You are now signed in,' . auth()->user()->name;
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
