@extends('layouts.app')
@section('title', 'Offers · '.config('brand.name'))
@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-8 py-12">
    <div class="rounded-3xl bg-gradient-to-r from-gold-500 to-gold-700 text-white p-10 mb-12">
        <p class="text-sm tracking-widest uppercase mb-2 text-white/70">Limited Time</p>
        <h1 class="text-4xl font-serif font-bold mb-2">Get up to 25% off on Making Charges</h1>
        <p class="text-white/80">On select gold and diamond jewellery collections</p>
    </div>
    <x-section-heading eyebrow="Offers" title="Offer Products" />
    <div class="flex gap-2 mb-8 text-xs">
        @foreach(['All','Gold','Silver','Diamond','Platinum'] as $c)
        <button class="px-4 py-2 rounded-full border border-gold-200">{{ $c }}</button>
        @endforeach
    </div>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
        @for($i=0;$i<8;$i++)
        <x-product-card tag="Sale" />
        @endfor
    </div>
</div>
@endsection
