<?php

$viewsDir = 'C:/Users/shaik/Desktop/projects/login-app/resources/views';

// Using single quotes everywhere to avoid variable interpolation
$deptEdit = <<<'HTML'
@extends('layouts.app')
@section('title', 'Edit Department')
@section('header', 'Edit Department')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-8 py-6 border-b border-gray-100">
        <h3 class="text-lg font-semibold text-gray-900">Edit Department</h3>
    </div>
    
    <div class="px-8 py-6">
        @if ($errors->any())
            <div class="bg-red-50 p-4 mb-6 rounded-lg text-red-700 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('departments.update', $department) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Department Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $department->name) }}" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border bg-gray-50/50" required>
            </div>
            
            <div class="pt-6 border-t border-gray-100 flex justify-end space-x-3">
                <a href="{{ route('departments.index') }}" class="px-4 py-2 border border-gray-300 rounded-xl bg-white text-gray-700">Cancel</a>
                <button type="submit" class="px-4 py-2 rounded-xl text-white bg-indigo-600">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
HTML;

$deptCreate = <<<'HTML'
@extends('layouts.app')
@section('title', 'Create Department')
@section('header', 'Create Department')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-8 py-6 border-b border-gray-100">
        <h3 class="text-lg font-semibold text-gray-900">Create Department</h3>
    </div>
    
    <div class="px-8 py-6">
        @if ($errors->any())
            <div class="bg-red-50 p-4 mb-6 rounded-lg text-red-700 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('departments.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Department Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border bg-gray-50/50" required>
            </div>
            
            <div class="pt-6 border-t border-gray-100 flex justify-end space-x-3">
                <a href="{{ route('departments.index') }}" class="px-4 py-2 border border-gray-300 rounded-xl bg-white text-gray-700">Cancel</a>
                <button type="submit" class="px-4 py-2 rounded-xl text-white bg-indigo-600">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
HTML;

$roleEdit = <<<'HTML'
@extends('layouts.app')
@section('title', 'Edit Role')
@section('header', 'Edit Role')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-8 py-6 border-b border-gray-100">
        <h3 class="text-lg font-semibold text-gray-900">Edit Role</h3>
    </div>
    
    <div class="px-8 py-6">
        @if ($errors->any())
            <div class="bg-red-50 p-4 mb-6 rounded-lg text-red-700 text-sm"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('roles.update', $role) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Role Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border bg-gray-50/50" required>
            </div>
            
            <div class="mt-6">
                <h4 class="text-sm font-medium text-gray-900 mb-4">Permissions</h4>
                <div class="space-y-4">
                    <div class="flex items-center"><input type="checkbox" name="can_create" id="can_create" class="h-4 w-4 text-indigo-600" {{ old('can_create', $role->can_create) ? 'checked' : '' }}><label class="ml-3 text-sm text-gray-700" for="can_create">Can Create</label></div>
                    <div class="flex items-center"><input type="checkbox" name="can_read" id="can_read" class="h-4 w-4 text-indigo-600" {{ old('can_read', $role->can_read) ? 'checked' : '' }}><label class="ml-3 text-sm text-gray-700" for="can_read">Can Read</label></div>
                    <div class="flex items-center"><input type="checkbox" name="can_update" id="can_update" class="h-4 w-4 text-indigo-600" {{ old('can_update', $role->can_update) ? 'checked' : '' }}><label class="ml-3 text-sm text-gray-700" for="can_update">Can Update</label></div>
                    <div class="flex items-center"><input type="checkbox" name="can_delete" id="can_delete" class="h-4 w-4 text-indigo-600" {{ old('can_delete', $role->can_delete) ? 'checked' : '' }}><label class="ml-3 text-sm text-gray-700" for="can_delete">Can Delete</label></div>
                </div>
            </div>
            
            <div class="pt-6 border-t border-gray-100 flex justify-end space-x-3">
                <a href="{{ route('roles.index') }}" class="px-4 py-2 border border-gray-300 rounded-xl bg-white text-gray-700">Cancel</a>
                <button type="submit" class="px-4 py-2 rounded-xl text-white bg-indigo-600">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
HTML;

$roleCreate = <<<'HTML'
@extends('layouts.app')
@section('title', 'Create Role')
@section('header', 'Create Role')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-8 py-6 border-b border-gray-100">
        <h3 class="text-lg font-semibold text-gray-900">Create Role</h3>
    </div>
    
    <div class="px-8 py-6">
        @if ($errors->any())
            <div class="bg-red-50 p-4 mb-6 rounded-lg text-red-700 text-sm"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('roles.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Role Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border bg-gray-50/50" required>
            </div>
            
            <div class="mt-6">
                <h4 class="text-sm font-medium text-gray-900 mb-4">Permissions</h4>
                <div class="space-y-4">
                    <div class="flex items-center"><input type="checkbox" name="can_create" id="can_create" class="h-4 w-4 text-indigo-600" {{ old('can_create') ? 'checked' : '' }}><label class="ml-3 text-sm text-gray-700" for="can_create">Can Create</label></div>
                    <div class="flex items-center"><input type="checkbox" name="can_read" id="can_read" class="h-4 w-4 text-indigo-600" {{ old('can_read') ? 'checked' : '' }}><label class="ml-3 text-sm text-gray-700" for="can_read">Can Read</label></div>
                    <div class="flex items-center"><input type="checkbox" name="can_update" id="can_update" class="h-4 w-4 text-indigo-600" {{ old('can_update') ? 'checked' : '' }}><label class="ml-3 text-sm text-gray-700" for="can_update">Can Update</label></div>
                    <div class="flex items-center"><input type="checkbox" name="can_delete" id="can_delete" class="h-4 w-4 text-indigo-600" {{ old('can_delete') ? 'checked' : '' }}><label class="ml-3 text-sm text-gray-700" for="can_delete">Can Delete</label></div>
                </div>
            </div>
            
            <div class="pt-6 border-t border-gray-100 flex justify-end space-x-3">
                <a href="{{ route('roles.index') }}" class="px-4 py-2 border border-gray-300 rounded-xl bg-white text-gray-700">Cancel</a>
                <button type="submit" class="px-4 py-2 rounded-xl text-white bg-indigo-600">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
HTML;

$userEdit = <<<'HTML'
@extends('layouts.app')
@section('title', 'Edit User')
@section('header', 'Edit User')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-8 py-6 border-b border-gray-100">
        <h3 class="text-lg font-semibold text-gray-900">Edit User</h3>
    </div>
    
    <div class="px-8 py-6">
        @if ($errors->any())
            <div class="bg-red-50 p-4 mb-6 rounded-lg text-red-700 text-sm"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full rounded-xl border-gray-300 px-4 py-2 border bg-gray-50/50" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full rounded-xl border-gray-300 px-4 py-2 border bg-gray-50/50" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Password (blank to keep)</label>
                    <input type="password" name="password" class="mt-1 block w-full rounded-xl border-gray-300 px-4 py-2 border bg-gray-50/50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Department</label>
                    <select name="department_id" class="mt-1 block w-full rounded-xl border-gray-300 px-4 py-2 border bg-gray-50/50">
                        <option value="">Select</option>
                        @foreach($departments as $d)
                            <option value="{{ $d->id }}" {{ old('department_id', $user->department_id) == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role_id" class="mt-1 block w-full rounded-xl border-gray-300 px-4 py-2 border bg-gray-50/50">
                        <option value="">Select</option>
                        @foreach($roles as $r)
                            <option value="{{ $r->id }}" {{ old('role_id', $user->role_id) == $r->id ? 'selected' : '' }}>{{ $r->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="pt-6 border-t border-gray-100 flex justify-end space-x-3">
                <a href="{{ route('users.index') }}" class="px-4 py-2 border border-gray-300 rounded-xl bg-white text-gray-700">Cancel</a>
                <button type="submit" class="px-4 py-2 rounded-xl text-white bg-indigo-600">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
HTML;

$userCreate = <<<'HTML'
@extends('layouts.app')
@section('title', 'Create User')
@section('header', 'Create User')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-8 py-6 border-b border-gray-100">
        <h3 class="text-lg font-semibold text-gray-900">Create User</h3>
    </div>
    
    <div class="px-8 py-6">
        @if ($errors->any())
            <div class="bg-red-50 p-4 mb-6 rounded-lg text-red-700 text-sm"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-xl border-gray-300 px-4 py-2 border bg-gray-50/50" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full rounded-xl border-gray-300 px-4 py-2 border bg-gray-50/50" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" class="mt-1 block w-full rounded-xl border-gray-300 px-4 py-2 border bg-gray-50/50" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Department</label>
                    <select name="department_id" class="mt-1 block w-full rounded-xl border-gray-300 px-4 py-2 border bg-gray-50/50">
                        <option value="">Select</option>
                        @foreach($departments as $d)
                            <option value="{{ $d->id }}" {{ old('department_id') == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role_id" class="mt-1 block w-full rounded-xl border-gray-300 px-4 py-2 border bg-gray-50/50">
                        <option value="">Select</option>
                        @foreach($roles as $r)
                            <option value="{{ $r->id }}" {{ old('role_id') == $r->id ? 'selected' : '' }}>{{ $r->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="pt-6 border-t border-gray-100 flex justify-end space-x-3">
                <a href="{{ route('users.index') }}" class="px-4 py-2 border border-gray-300 rounded-xl bg-white text-gray-700">Cancel</a>
                <button type="submit" class="px-4 py-2 rounded-xl text-white bg-indigo-600">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
HTML;

file_put_contents($viewsDir . '/departments/edit.blade.php', $deptEdit);
file_put_contents($viewsDir . '/departments/create.blade.php', $deptCreate);
file_put_contents($viewsDir . '/roles/edit.blade.php', $roleEdit);
file_put_contents($viewsDir . '/roles/create.blade.php', $roleCreate);
file_put_contents($viewsDir . '/users/edit.blade.php', $userEdit);
file_put_contents($viewsDir . '/users/create.blade.php', $userCreate);

echo "Fixed forms.\n";
