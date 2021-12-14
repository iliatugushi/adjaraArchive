<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $roles = Role::all();
        return view('admin.roles.index', ['roles' => $roles]);
    }


    public function create()
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('create_roles')) {
            return view('admin.noAccess');
        }
        $mode = 'create';
        return view('admin.roles.create', ['mode' => $mode]);
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);

        foreach ($request->except(['_token', '_method', 'name', 'role_id', 'role']) as $key => $value) {
            $permission = Permission::where('name', $key)->first();
            $role->givePermissionTo($permission);
        }
        return redirect()->route('roles.index')->withSuccess('მონაცემი დაემატა');
    }


    public function edit(Role $role)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('edit_roles')) {
            return view('admin.noAccess');
        }
        $mode = 'edit';
        return view('admin.roles.create', ['role' => $role, 'mode' => $mode]);
    }

    public function show(Role $role)
    {
        return view('admin.roles.show', ['role' => $role]);
    }

    public function update(Request $request, Role $role)
    {
        $role->name = $request->name;
        $role->save();

        // Clear old permissions for this role
        $permissions = Permission::all();
        foreach ($permissions as $item) {
            $item->removeRole($role);
        }

        foreach ($request->except(['_token', '_method', 'name', 'role_id', 'role']) as $key => $value) {
            $permission = Permission::where('name', $key)->first();
            $role->givePermissionTo($permission);
        }
        $update = $role->update($request->except(['_token', '_method']));
        if ($update) {
            return redirect()->back()->withSuccess('მონაცემი განახლდა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        // Clear old permissions for this role
        $permissions = Permission::all();
        foreach ($permissions as $item) {
            $item->removeRole($role);
        }

        if ($role->delete()) {
            return redirect()->route('roles.index')->withSuccess('მონაცემი წაიშალა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }
}
