<?php

namespace Modules\EmailAuth\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\EmailAuth\Entities\LoginToken;
use Modules\EmailAuth\Entities\AuthenticatesUser;

class LoginController extends Controller
{
    protected $auth;

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

        return 'Sweet - go check that email, yo.';
    }

    public function authenticate(LoginToken $token)
    {
        $this->auth->login($token);

        return 'You are now signed in,' . auth()->user()->name;
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
