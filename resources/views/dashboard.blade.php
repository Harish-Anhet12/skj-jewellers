@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard Overview')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Welcome Card -->
        <div
            class="md:col-span-3 bg-white rounded-2xl p-8 shadow-sm border border-gray-100 flex items-center justify-between overflow-hidden relative group">
            <div
                class="absolute right-0 top-0 w-64 h-64 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 group-hover:opacity-100 transition-opacity duration-500">
            </div>
            <div class="relative z-10">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome back, <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">{{ auth()->user()->name }}</span>!
                    👋</h1>
            </div>
        </div>
    </div>


@endsection