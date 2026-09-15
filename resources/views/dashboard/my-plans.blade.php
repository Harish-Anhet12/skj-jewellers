@extends('layouts.dashboard')
@section('page-title','My Plans')
@section('content')
<div class="flex items-center justify-between mb-6">
    <h2 class="font-serif text-lg font-semibold">Active Plans</h2>
    <a href="{{ url('/dashboard/new-plan') }}" class="btn-gold !py-2 !px-5 text-sm">+ Add Plan</a>
</div>
<div class="grid md:grid-cols-2 gap-6">
    @foreach(['Sri Akshayam Scheme','Swarna Dharaa'] as $plan)
    <div class="card p-6">
        <div class="flex justify-between items-start mb-4">
            <h3 class="font-serif font-semibold">{{ $plan }}</h3>
            <span class="text-xs bg-green-50 text-green-600 px-3 py-1 rounded-full">Active</span>
        </div>
        <div class="grid grid-cols-3 text-xs gap-2 mb-3">
            <div><p class="text-ink-900/40">Your ID</p><p class="font-medium">AZ 0658</p></div>
            <div><p class="text-ink-900/40">Start On</p><p class="font-medium">16 Nov 2023</p></div>
            <div><p class="text-ink-900/40">Total Dues</p><p class="font-medium">03/12</p></div>
        </div>
        <p class="text-xs text-gold-600">Next payment due in 3 days (19 Nov 2023)</p>
    </div>
    @endforeach
</div>
@endsection
