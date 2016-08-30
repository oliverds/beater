<?php

namespace Modules\Permission\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'name' => 'required|alpha_dash|max:20|unique:roles,name',
        ];

        if ($this->method() === 'PATCH') {
            $rules['name'] .= ',' . $this->role;
        }

        return $rules;
    }

    public function authorize()
    {
        return true;
    }
}
