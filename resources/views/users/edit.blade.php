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