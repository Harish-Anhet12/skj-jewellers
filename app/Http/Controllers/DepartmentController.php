<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DepartmentController extends Controller
{
    public function index()
    {
        Gate::authorize('read');
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        Gate::authorize('create');
        return view('departments.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('create');
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name',
        ]);

        Department::create($data);

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function edit(Department $department)
    {
        Gate::authorize('update');
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        Gate::authorize('update');
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,' . $department->id,
        ]);

        $department->update($data);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        Gate::authorize('delete');
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}