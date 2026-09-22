<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        $data['can_create'] = $request->has('can_create');
        $data['can_read'] = $request->has('can_read');
        $data['can_update'] = $request->has('can_update');
        $data['can_delete'] = $request->has('can_delete');

        Role::create($data);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ]);

        $data['can_create'] = $request->has('can_create');
        $data['can_read'] = $request->has('can_read');
        $data['can_update'] = $request->has('can_update');
        $data['can_delete'] = $request->has('can_delete');

        $role->update($data);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
