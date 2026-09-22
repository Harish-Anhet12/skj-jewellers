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