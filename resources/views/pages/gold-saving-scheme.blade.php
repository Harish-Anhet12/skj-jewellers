@extends('layouts.app')
@section('title', 'Gold Savings Scheme · '.config('brand.name'))
@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-8 py-12">
    <x-section-heading eyebrow="Save Smart" title="Gold Savings Scheme" />
    <div class="grid md:grid-cols-2 gap-8 mb-16">
        @foreach([
            ['Swarna Dharaa','Easy · Convenient · Trust', '12 monthly instalments, redeemable towards jewellery purchase.'],
            ['Chutti Lathika','Easy · Convenient · Trust', 'Flexible plan designed for small, consistent savers.'],
        ] as [$name,$tag,$desc])
        <div class="rounded-3xl bg-gradient-to-br from-ink-900 to-ink-800 text-white p-8">
            <h3 class="font-serif text-2xl font-semibold mb-2">{{ $name }}</h3>
            <p class="text-gold-400 text-sm mb-4">{{ $tag }}</p>
            <p class="text-white/60 text-sm mb-6">{{ $desc }}</p>
            <a href="{{ url('/dashboard/new-plan') }}" class="btn-gold">Join Now</a>
        </div>
        @endforeach
    </div>

    <x-section-heading eyebrow="How it works" title="Process to Join" center />
    <div class="grid md:grid-cols-3 gap-8">
        @foreach(['Click Join Now','Select Plan','Make First Payment'] as $i => $step)
        <div class="text-center">
            <div class="w-16 h-16 mx-auto rounded-full bg-gold-50 flex items-center justify-center font-serif font-bold text-gold-500 text-xl mb-4">{{ $i+1 }}</div>
            <p class="font-medium">{{ $step }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
