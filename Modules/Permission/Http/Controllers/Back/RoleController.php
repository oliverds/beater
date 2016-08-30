<?php

namespace Modules\Permission\Http\Controllers\Back;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Modules\Permission\Http\Requests\Back\RoleRequest;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('role:admin');
    }

    public function index()
    {
        $roles = Role::all();

        return view('permission::back.roles.index')->with(compact('roles'));
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('permission::back.roles.show')->with(compact('role'));
    }

    public function create()
    {
        return view('permission::back.roles.create', ['role' => new Role()]);
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());

        $role->save();

        flash('Role Created.');

        return Redirect::route('cp.roles.index');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('permission::back.roles.edit')->with(compact('role'));
    }

    public function update($id, RoleRequest $request)
    {
        $role = Role::findOrFail($id);

        $role->update($request->all());

        flash('Role Saved.');

        return Redirect::route('cp.roles.index');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        flash('Role Deleted.');

        return Redirect::route('cp.roles.index');
    }
}
