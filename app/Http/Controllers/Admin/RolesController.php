<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        request()->user()->can('show roles');

        return inertia('Admin/Roles/Index',[
            'roles' => Role::all()
        ]);
    }

    public function show($id)
    {
        request()->user()->can('show roles');

        return inertia('Admin/Roles/Show', [
            'role' => Role::with('permissions')->findOrFail($id),
            'permissions' => Permission::all()
        ]);
    }

    public function update(Request $request, Role $role)
    {
        request()->user()->can('update roles');

        $role->update($request->only(['name']));
        $role->syncPermissions($request->only(['permissions']));

        return redirect()->route('roles.index')->with('message', 'Item updated successfully!');
    }
}
