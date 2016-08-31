<?php

namespace Modules\Permission\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Permission\Entities\Role;
use Illuminate\Support\Facades\Redirect;
use Modules\Permission\Entities\Permission;
use Modules\Permission\Http\Requests\Back\RoleRequest;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('cp.user.roles');

        $roles = Role::all();

        return view('permission::back.roles.index')->with(compact('roles'));
    }

    public function show($role)
    {
        $this->authorize('cp.user.role');

        $role = Role::findOrFail($role);

        return view('permission::back.roles.show')->with(compact('role'));
    }

    public function create()
    {
        $this->authorize('cp.user.role.create');

        $role = new Role();

        $permissions = Permission::all();

        return view('permission::back.roles.create')->with(compact('role', 'permissions'));
    }

    public function store(RoleRequest $request)
    {
        $this->authorize('cp.user.role.create');

        $role = Role::create(['name' => $request->name]);

        $role->save();

        if (is_null($request->permissions)) {
            $request->permissions = array();
        }

        $role->givePermissionTo($request->permissions);

        flash('Role Created.');

        return Redirect::route('cp.user.roles');
    }

    public function edit($role)
    {
        $this->authorize('cp.user.role.update');

        $role = Role::findOrFail($role);

        $permissions = Permission::all();

        return view('permission::back.roles.edit')->with(compact('role', 'permissions'));
    }

    public function update($role, RoleRequest $request)
    {
        $this->authorize('cp.user.role.update');

        $role = Role::findOrFail($role);

        $role->update(['name' => $request->name]);

        if (is_null($request->permissions)) {
            $request->permissions = array();
        }

        $role->syncPermissionTo($request->permissions);

        flash('Role Saved.');

        return Redirect::route('cp.user.roles');
    }

    public function delete($role)
    {
        $this->authorize('cp.user.role.delete');

        $role = Role::findOrFail($role);

        $role->delete();

        flash('Role Deleted.');

        return Redirect::route('cp.user.roles');
    }
}
