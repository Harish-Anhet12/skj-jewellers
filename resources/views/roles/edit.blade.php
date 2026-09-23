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
                <h4 class="text-sm font-medium text-gray-900 mb-4">Module Permissions</h4>
                <div class="space-y-4">
                    <div class="flex items-center"><input type="checkbox" name="can_dashboard" id="can_dashboard" class="h-4 w-4 text-indigo-600" {{ old('can_dashboard', $role->can_dashboard) ? 'checked' : '' }}><label class="ml-3 text-sm text-gray-700" for="can_dashboard">Dashboard</label></div>
                    <div class="flex items-center"><input type="checkbox" name="can_department" id="can_department" class="h-4 w-4 text-indigo-600" {{ old('can_department', $role->can_department) ? 'checked' : '' }}><label class="ml-3 text-sm text-gray-700" for="can_department">Department</label></div>
                    <div class="flex items-center"><input type="checkbox" name="can_user" id="can_user" class="h-4 w-4 text-indigo-600" {{ old('can_user', $role->can_user) ? 'checked' : '' }}><label class="ml-3 text-sm text-gray-700" for="can_user">User</label></div>
                    <div class="flex items-center"><input type="checkbox" name="can_role" id="can_role" class="h-4 w-4 text-indigo-600" {{ old('can_role', $role->can_role) ? 'checked' : '' }}><label class="ml-3 text-sm text-gray-700" for="can_role">Role</label></div>
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