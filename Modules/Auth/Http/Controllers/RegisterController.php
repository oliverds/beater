<?php

namespace Modules\Auth\Http\Controllers;

use Validator;
use Modules\User\Entities\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth::front.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:40',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:6|confirmed',
            'terms' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $this->setUniqueUsername($data['name']),
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function setUniqueUsername($name, $extra = null)
    {
        $username = str_slug($name.$extra, '_');

        if (User::whereUsername($username)->exists()) {
            $name = str_limit($name, 10);
            $extra = '_'.str_random(9);
            return $this->setUniqueUsername($name, $extra);
        }

        return $username;
    }
}
