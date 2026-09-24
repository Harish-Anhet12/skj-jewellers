@extends('layouts.app')

@section('title', 'Collections · '.config('brand.name'))

@section('content')

@php
    $collections = [
        [
            'name' => 'Bridal Radiance',
            'slug' => 'bridal',
            'category' => 'Bridal Collection',
            'description' => 'Elegant jewellery designed to make every bridal moment unforgettable.',
            'image' => 'images/collections/bridal.jpg',
        ],
        [
            'name' => 'Muhurtham Jewellery',
            'slug' => 'muhurtham',
            'category' => 'Bridal Collection',
            'description' => 'Traditional pieces inspired by timeless South Indian wedding designs.',
            'image' => 'images/collections/muhurtham.jpg',
        ],
        [
            'name' => 'Temple Collection',
            'slug' => 'temple',
            'category' => 'Traditional',
            'description' => 'Classic temple-inspired jewellery celebrating heritage and craftsmanship.',
            'image' => 'images/collections/temple.jpg',
        ],
        [
            'name' => 'Diamond Elegance',
            'slug' => 'diamond',
            'category' => 'Diamond',
            'description' => 'Sophisticated diamond jewellery for celebrations and special occasions.',
            'image' => 'images/collections/diamond.jpg',
        ],
        [
            'name' => 'Antique Gold',
            'slug' => 'antique',
            'category' => 'Gold Collection',
            'description' => 'Rich antique finishes with timeless designs inspired by tradition.',
            'image' => 'images/collections/antique.jpg',
        ],
        [
            'name' => 'Everyday Fine',
            'slug' => 'everyday',
            'category' => 'Everyday Collection',
            'description' => 'Light, elegant jewellery created for effortless everyday styling.',
            'image' => 'images/collections/everyday.jpg',
        ],
    ];
@endphp

<div class="max-w-7xl mx-auto px-4 md:px-8 py-12">

    {{-- Page Heading --}}
    <x-section-heading
        eyebrow="Curated"
        title="Our Collections"
    />

    {{-- Collections Grid --}}
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">

        @foreach($collections as $collection)

            <div class="card group overflow-hidden">

                {{-- Collection Image --}}
                <div class="relative aspect-[4/3] bg-gradient-to-br from-gold-100 to-gold-300 overflow-hidden">

                    <img
                        src="{{ asset($collection['image']) }}"
                        alt="{{ $collection['name'] }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                    >

                    {{-- Category Badge --}}
                    <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-ink-900 text-xs font-semibold px-4 py-2 rounded-full shadow-sm">
                        {{ $collection['category'] }}
                    </span>

                </div>

                {{-- Collection Details --}}
                <div class="p-6">

                    <h3 class="font-serif font-semibold text-xl mb-2">
                        {{ $collection['name'] }}
                    </h3>

                    <p class="text-sm text-ink-900/60 leading-relaxed mb-5">
                        {{ $collection['description'] }}
                    </p>

                    {{-- View Collection Button --}}
                    <a
                        href="{{ url('/shop?collection=' . $collection['slug']) }}"
                        class="inline-flex items-center gap-2 text-gold-500 text-sm font-semibold hover:text-gold-600 transition"
                    >
                        View Collection
                        <span class="group-hover:translate-x-1 transition">→</span>
                    </a>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection