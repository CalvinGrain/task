<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index()
    {
        $this->authorize('show', User::class);

        return inertia('Admin/Users/Index',[
            'users' => User::with('roles')->orderBy('id','desc')->get()
        ]);
    }

    public function show($id)
    {
        $this->authorize('show', User::class);

        return inertia('Admin/Users/Show', [
            'roles' => Role::all(),
            'user' => User::with('roles')->findOrFail($id)
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->only(['name', 'email']));

        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')->with('message', 'Item updated successfully!');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('users.index')->with('message', 'Item deleted successfully!');
    }
}
