@extends('layouts.app')

@section('title', 'Collections · '.config('brand.name'))

@section('content')

<div class="max-w-7xl mx-auto px-4 md:px-8 py-12">

    <!-- ==================== PAGE HEADING ==================== -->

    <div class="text-center mb-12">

        <p class="text-xs uppercase tracking-[0.3em] text-gold-500 font-semibold mb-3">
            Curated For You
        </p>

        <h1 class="font-serif text-4xl md:text-5xl font-semibold text-ink-900">
            Our Collections
        </h1>

        <p class="max-w-2xl mx-auto mt-4 text-sm md:text-base text-ink-900/60">
            Discover timeless jewellery collections crafted for every
            celebration, tradition and everyday moment.
        </p>

    </div>


    <!-- ==================== COLLECTION FILTERS ==================== -->

    <div class="flex flex-wrap justify-center gap-3 mb-10">

        <button
            class="px-5 py-2 rounded-full bg-gold-500 text-white text-sm font-medium shadow-sm">
            All Collections
        </button>

        <button
            class="px-5 py-2 rounded-full border border-gold-200
                   text-ink-900/70 text-sm
                   hover:bg-gold-500 hover:text-white
                   transition">
            Bridal
        </button>

        <button
            class="px-5 py-2 rounded-full border border-gold-200
                   text-ink-900/70 text-sm
                   hover:bg-gold-500 hover:text-white
                   transition">
            Gold
        </button>

        <button
            class="px-5 py-2 rounded-full border border-gold-200
                   text-ink-900/70 text-sm
                   hover:bg-gold-500 hover:text-white
                   transition">
            Diamond
        </button>

        <button
            class="px-5 py-2 rounded-full border border-gold-200
                   text-ink-900/70 text-sm
                   hover:bg-gold-500 hover:text-white
                   transition">
            Traditional
        </button>

    </div>


    <!-- ==================== COLLECTION DATA ==================== -->

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


    <!-- ==================== COLLECTION GRID ==================== -->

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">

        @foreach($collections as $collection)

            <!-- CLICKING A COLLECTION NOW OPENS ITS SPECIFIC SHOP PAGE -->

            <a href="{{ url('/shop?collection=' . $collection['slug']) }}"
               class="group block">

                <div class="relative overflow-hidden rounded-3xl
                            bg-white
                            border border-gold-100
                            shadow-sm
                            transition-all duration-500
                            hover:-translate-y-2
                            hover:shadow-xl">


                    <!-- ==================== IMAGE ==================== -->

                    <div class="relative aspect-[4/5] overflow-hidden bg-gold-50">

                        <img
                            src="{{ asset($collection['image']) }}"
                            alt="{{ $collection['name'] }}"
                            class="w-full h-full object-cover
                                   transition-transform duration-700
                                   group-hover:scale-105"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        >


                        <!-- Fallback if image is missing -->

                        <div
                            class="absolute inset-0 items-center justify-center
                                   bg-gradient-to-br from-[#f8edc9] to-[#d8b65a]"
                            style="display:none;">

                            <div class="text-center text-gold-700">

                                <div class="text-5xl mb-3">
                                    ✦
                                </div>

                                <p class="font-serif text-xl">
                                    {{ $collection['name'] }}
                                </p>

                            </div>

                        </div>


                        <!-- Dark image overlay -->

                        <div class="absolute inset-0
                                    bg-gradient-to-t
                                    from-black/65
                                    via-black/10
                                    to-transparent">
                        </div>


                        <!-- Collection category -->

                        <div class="absolute top-5 left-5">

                            <span
                                class="inline-flex items-center
                                       px-3 py-1.5
                                       rounded-full
                                       bg-white/90
                                       backdrop-blur-sm
                                       text-[10px]
                                       uppercase
                                       tracking-widest
                                       font-semibold
                                       text-gold-700">

                                {{ $collection['category'] }}

                            </span>

                        </div>


                        <!-- Text on image -->

                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">

                            <p class="text-xs uppercase tracking-[0.2em]
                                      text-white/70 mb-2">

                                V Anand Jewellery

                            </p>

                            <h2 class="font-serif text-2xl font-semibold">

                                {{ $collection['name'] }}

                            </h2>

                        </div>

                    </div>


                    <!-- ==================== CARD CONTENT ==================== -->

                    <div class="p-6">

                        <p class="text-sm leading-6 text-ink-900/60 mb-5">

                            {{ $collection['description'] }}

                        </p>


                        <div class="flex items-center justify-between">

                            <span
                                class="text-sm font-semibold text-gold-600
                                       group-hover:text-gold-700
                                       transition">

                                Explore Collection

                            </span>


                            <span
                                class="flex items-center justify-center
                                       w-9 h-9
                                       rounded-full
                                       border border-gold-200
                                       text-gold-600
                                       transition-all duration-300
                                       group-hover:bg-gold-500
                                       group-hover:text-white
                                       group-hover:border-gold-500">

                                →

                            </span>

                        </div>

                    </div>

                </div>

            </a>

        @endforeach

    </div>


    <!-- ==================== BOTTOM MESSAGE ==================== -->

    <div class="mt-16 text-center">

        <div class="inline-flex items-center gap-3
                    px-6 py-3
                    rounded-full
                    bg-gold-50
                    border border-gold-100">

            <span class="text-gold-600">
                ✦
            </span>

            <span class="text-sm text-ink-900/70">
                Crafted with elegance. Designed to last generations.
            </span>

            <span class="text-gold-600">
                ✦
            </span>

        </div>

    </div>

</div>

@endsection