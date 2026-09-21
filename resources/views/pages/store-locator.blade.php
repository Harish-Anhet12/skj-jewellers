@extends('layouts.app')
@section('title', 'Visit Us · '.config('brand.name'))
@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-8 py-12">
    <x-section-heading eyebrow="Come Visit Us" title="Find Our Showroom" />
    <p class="text-ink-900/60 text-center max-w-2xl mx-auto mb-10 -mt-4">Experience our jewellery collections in person and discover timeless designs at our showroom in Chickpet, Bengaluru.</p>
    <div class="grid md:grid-cols-3 gap-8">
        <div class="md:col-span-1 space-y-4">
            @foreach(config('brand.stores') as $store)
            <div class="card p-5">
                <h3 class="font-serif font-semibold mb-1">{{ config('brand.name') }} – {{ $store['area'] }}, {{ $store['city'] }}</h3>
                <p class="text-sm text-ink-900/60 mb-2">{{ $store['address'] }}</p>
                <p class="text-sm text-gold-500 font-medium">{{ config('brand.phone') }}</p>
            </div>
            @endforeach
        </div>
        <div class="md:col-span-2 rounded-3xl bg-gold-50 border border-gold-100 flex flex-col items-center justify-center min-h-[420px] px-6 text-center">
            <p class="font-serif font-semibold text-ink-900 mb-1">Visit Us in Chickpet</p>
            <p class="text-ink-900/40 text-sm">[ Map placeholder — Chickpet, Bengaluru ]</p>
        </div>
    </div>
</div>
@endsection
