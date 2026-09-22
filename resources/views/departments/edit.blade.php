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