```blade
@extends('layouts.app')
@section('title', 'Discover Us · '.config('brand.name'))
@section('content')
<div class="max-w-5xl mx-auto px-4 md:px-8 py-16">
    <x-section-heading eyebrow="Our Journey" :title="'Discover '.config('brand.name')" center />
    <p class="text-ink-900/60 leading-relaxed text-center max-w-3xl mx-auto mb-16">At {{ config('brand.name') }}, jewellery is more than an ornament — it is a part of life's most meaningful moments. With a passion for timeless design and trusted craftsmanship, we create jewellery that celebrates tradition while embracing modern elegance.</p>
    <div class="grid md:grid-cols-3 gap-8 text-center">
        @foreach([['10+','Years of Excellence'],['1','Signature Showroom in Bengaluru'],['5L+','Customers & Counting']] as [$n,$l])
        <div class="card p-8">
            <p class="text-3xl font-serif font-bold text-gold-500 mb-2">{{ $n }}</p>
            <p class="text-sm text-ink-900/60">{{ $l }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
