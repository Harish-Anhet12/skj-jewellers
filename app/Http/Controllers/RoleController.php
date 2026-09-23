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

        $data['can_dashboard'] = $request->has('can_dashboard');
        $data['can_department'] = $request->has('can_department');
        $data['can_user'] = $request->has('can_user');
        $data['can_role'] = $request->has('can_role');

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

        $data['can_dashboard'] = $request->has('can_dashboard');
        $data['can_department'] = $request->has('can_department');
        $data['can_user'] = $request->has('can_user');
        $data['can_role'] = $request->has('can_role');

        $role->update($data);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
