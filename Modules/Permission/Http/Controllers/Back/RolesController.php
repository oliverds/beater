<?php

namespace Modules\Permission\Http\Controllers\Back;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Modules\Permission\Http\Requests\Back\RoleRequest;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize(request()->route()->getName());

        $roles = Role::all();

        return view('permission::back.roles.index')->with(compact('roles'));
    }

    public function show($role)
    {
        $this->authorize(request()->route()->getName());

        $role = Role::findOrFail($role);

        return view('permission::back.roles.show')->with(compact('role'));
    }

    public function create()
    {
        $this->authorize(request()->route()->getName());

        return view('permission::back.roles.create', ['role' => new Role()]);
    }

    public function store(RoleRequest $request)
    {
        $this->authorize(request()->route()->getName());

        $role = Role::create($request->all());

        $role->save();

        flash('Role Created.');

        return Redirect::route('cp.roles');
    }

    public function edit($role)
    {
        $this->authorize(request()->route()->getName());

        $role = Role::findOrFail($role);

        return view('permission::back.roles.edit')->with(compact('role'));
    }

    public function update($role, RoleRequest $request)
    {
        $this->authorize(request()->route()->getName());

        $role = Role::findOrFail($role);

        $role->update($request->all());

        flash('Role Saved.');

        return Redirect::route('cp.roles');
    }

    public function delete($role)
    {
        $this->authorize(request()->route()->getName());

        $role = Role::findOrFail($role);

        $role->delete();

        flash('Role Deleted.');

        return Redirect::route('cp.roles');
    }
}
