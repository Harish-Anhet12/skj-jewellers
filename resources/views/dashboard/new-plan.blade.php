@extends('layouts.dashboard')
@section('page-title','Join New Plan')
@section('content')
<p class="text-sm text-ink-900/60 mb-6">Take a look at all the investment plans before making an informed decision.</p>
<div class="grid md:grid-cols-2 gap-6 mb-10">
    @foreach(['Swarna Dharaa','Chutti Lathika'] as $plan)
    <div class="rounded-3xl bg-gradient-to-br from-ink-900 to-ink-800 text-white p-8">
        <h3 class="font-serif text-xl font-semibold mb-1">{{ $plan }}</h3>
        <p class="text-gold-400 text-xs mb-4">Easy · Convenient · Trust</p>
        <button class="btn-gold">Join Now</button>
    </div>
    @endforeach
</div>
<h3 class="font-serif font-semibold mb-4">Process to Join</h3>
<div class="grid md:grid-cols-3 gap-6">
    @foreach(['Click Join Now','Select Plan','Make First Payment'] as $i => $s)
    <div class="card p-6 text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-gold-50 flex items-center justify-center font-serif font-bold text-gold-500 mb-3">{{ $i+1 }}</div>
        <p class="text-sm font-medium">{{ $s }}</p>
    </div>
    @endforeach
</div>
@endsection
