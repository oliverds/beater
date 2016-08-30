<?php

namespace Modules\User\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'username' => 'required|alpha_dash|max:20|unique:users,username',
            'email' => 'required|email|max:100|unique:users,email',
            'name' => 'required|alpha_num|max:40',
            'password' => 'min:6|confirmed',
            'roles' => 'array',
        ];

        if ($this->method() === 'PATCH') {
            $rules['username'] .= ',' . $this->user;
            $rules['email'] .= ',' . $this->user;
        }

        return $rules;
    }
}
