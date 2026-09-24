
@extends('layouts.app')
@section('title', 'Offers · '.config('brand.name'))

@section('content')

<div class="max-w-7xl mx-auto px-4 md:px-8 py-12">

    <!-- ==================== OFFER BANNER ==================== -->
    <div id="offer-banner"
         class="relative rounded-3xl bg-gradient-to-br from-[#5c1a1a] to-[#7a1010] text-white mb-12 overflow-hidden min-h-[220px]">

        <div class="relative z-10 w-full h-[220px]">

            <!-- Sliding Track -->
            <div id="offer-track"
                 class="flex h-full transition-transform duration-700 ease-in-out">

                @forelse($offers as $index => $offer)

                    <div class="offer-slide min-w-full h-full flex items-center justify-between px-8 md:px-10">

                        <!-- Offer Text -->
                        <div class="flex-1 pr-6">

                            <p class="text-sm tracking-widest uppercase mb-3 text-white/70">
                                Limited Time
                            </p>

                            <h1 class="text-3xl md:text-4xl font-serif font-bold mb-3">
                                {{ $offer->title }} — {{ $offer->discount }}% OFF
                            </h1>

                            <p class="text-white/80">
                                Valid till
                                {{ \Carbon\Carbon::parse($offer->valid_till)->format('d M Y') }}
                            </p>

                        </div>

                        <!-- Jewellery Shape -->
                        <div class="hidden md:block ml-6">

                            <svg width="140"
                                 height="140"
                                 viewBox="0 0 140 140"
                                 fill="none"
                                 xmlns="http://www.w3.org/2000/svg"
                                 class="opacity-90">

                                <polygon
                                    points="70,15 105,50 70,125 35,50"
                                    fill="white"
                                    fill-opacity="0.2"
                                    stroke="white"
                                    stroke-width="2"/>

                            </svg>

                        </div>

                    </div>

                @empty

                    <div class="min-w-full h-full flex items-center px-8 md:px-10">

                        <div>

                            <p class="text-sm tracking-widest uppercase mb-3 text-white/70">
                                Limited Time
                            </p>

                            <h1 class="text-3xl md:text-4xl font-serif font-bold">
                                Visit us for exclusive offers
                            </h1>

                        </div>

                    </div>

                @endforelse

            </div>

            <!-- ==================== PILL INDICATORS ==================== -->

            @if($offers->count() > 1)

                <div class="absolute bottom-7 left-8 md:left-10 z-20 flex items-center gap-2">

                    @foreach($offers as $index => $offer)

                        <button
                            type="button"
                            class="banner-pill h-2 rounded-full transition-all duration-500
                            {{ $index === 0 ? 'w-10 bg-white' : 'w-5 bg-white/40' }}"
                            data-slide="{{ $index }}"
                            aria-label="Go to offer {{ $index + 1 }}">
                        </button>

                    @endforeach

                </div>

            @endif

        </div>

    </div>


    <!-- ==================== CURRENT OFFERS ==================== -->

    <x-section-heading eyebrow="Offers" title="Current Offers" />

    <div class="grid md:grid-cols-2 gap-6 mb-12">

        @forelse($offers as $offer)

            @php
                $daysLeft = now()->startOfDay()->diffInDays(
                    \Carbon\Carbon::parse($offer->valid_till)->startOfDay(),
                    false
                );
            @endphp

            <div class="relative overflow-hidden rounded-3xl
                        bg-gradient-to-br from-gold-500 to-gold-700
                        text-white p-8 shadow-luxe
                        transition-all duration-300
                        hover:-translate-y-1 hover:shadow-xl">

                <!-- Discount Circle -->

                <div class="absolute -top-2 -right-2
                            bg-white text-gold-700
                            rounded-full w-24 h-24
                            flex flex-col items-center justify-center
                            shadow-lg rotate-6">

                    <span class="text-2xl font-serif font-bold leading-none">
                        {{ $offer->discount }}%
                    </span>

                    <span class="text-[10px] uppercase tracking-wider">
                        off
                    </span>

                </div>


                <!-- Special Offer -->

                <span class="inline-block text-xs uppercase tracking-widest
                             text-white/80 font-semibold mb-3">

                    ✨ Special Offer

                </span>


                <!-- Offer Title -->

                <h3 class="text-2xl font-serif font-bold mb-2 pr-20">
                    {{ $offer->title }}
                </h3>


                <!-- Validity -->

                <div class="flex flex-wrap items-center gap-3 mt-6">

                    <span class="text-white/70 text-xs">

                        Valid till
                        {{ \Carbon\Carbon::parse($offer->valid_till)->format('d M Y') }}

                    </span>


                    @if($daysLeft <= 3 && $daysLeft >= 0)

                        <span class="inline-flex items-center gap-1
                                     bg-red-900/30 text-white
                                     text-xs font-semibold
                                     px-3 py-1 rounded-full">

                            🔥

                            {{ $daysLeft == 0
                                ? 'Ends today'
                                : 'Ends in ' . $daysLeft . ' ' . Str::plural('day', $daysLeft)
                            }}

                        </span>

                    @endif

                </div>

            </div>

        @empty

            <p class="text-ink-900/50">
                No active offers right now. Check back soon!
            </p>

        @endforelse

    </div>


    <!-- ==================== OFFER PRODUCTS ==================== -->

    <x-section-heading eyebrow="Offers" title="Offer Products" />

    <div class="flex flex-wrap gap-2 mb-8 text-xs">

        @foreach(['All','Gold','Silver','Diamond','Platinum'] as $c)

            <button
                class="px-5 py-2 rounded-full
                       border border-gold-200
                       transition-all duration-200
                       hover:bg-gold-500
                       hover:text-white
                       hover:border-gold-500">

                {{ $c }}

            </button>

        @endforeach

    </div>


    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">

        @for($i = 0; $i < 8; $i++)

            <x-product-card tag="Sale" />

        @endfor

    </div>

</div>


<!-- ==================== SLIDER JAVASCRIPT ==================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const track = document.getElementById('offer-track');
    const slides = document.querySelectorAll('.offer-slide');
    const pills = document.querySelectorAll('.banner-pill');

    if (!track || slides.length <= 1) {
        return;
    }

    let current = 0;

    function showSlide(index) {

        current = index;

        /*
         * Move the entire track horizontally.
         * This gives a proper sliding effect instead
         * of the previous fade/opacity effect.
         */

        track.style.transform = `translateX(-${current * 100}%)`;


        /*
         * Update pill indicators.
         */

        pills.forEach((pill, i) => {

            if (i === current) {

                // Active pill
                pill.classList.remove('w-5', 'bg-white/40');
                pill.classList.add('w-10', 'bg-white');

            } else {

                // Inactive pill
                pill.classList.remove('w-10', 'bg-white');
                pill.classList.add('w-5', 'bg-white/40');

            }

        });

    }


    /*
     * Clicking a pill moves directly to that offer.
     */

    pills.forEach((pill, index) => {

        pill.addEventListener('click', function () {

            showSlide(index);

            // Restart automatic timing
            resetTimer();

        });

    });


    /*
     * Automatically change offer every 4 seconds.
     */

    let timer = setInterval(function () {

        let next = (current + 1) % slides.length;

        showSlide(next);

    }, 4000);


    /*
     * Restart the timer when user clicks a pill.
     */

    function resetTimer() {

        clearInterval(timer);

        timer = setInterval(function () {

            let next = (current + 1) % slides.length;

            showSlide(next);

        }, 4000);

    }

});

</script>

@endsection
