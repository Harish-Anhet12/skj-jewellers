@extends('layouts.app')
@section('title', 'Book Appointment · '.config('brand.name'))
@section('content')
<div class="max-w-3xl mx-auto px-4 md:px-8 py-16">
    <x-section-heading eyebrow="Visit Us" title="Book an Appointment" center />
    <form class="card p-8 space-y-5">
        <div class="grid md:grid-cols-2 gap-5">
            <input type="text" placeholder="Full Name" class="px-4 py-3 rounded-xl border border-gold-100 focus:outline-none focus:ring-2 focus:ring-gold-300">
            <input type="tel" placeholder="Phone Number" class="px-4 py-3 rounded-xl border border-gold-100 focus:outline-none focus:ring-2 focus:ring-gold-300">
        </div>
        <input type="email" placeholder="Email Address" class="w-full px-4 py-3 rounded-xl border border-gold-100 focus:outline-none focus:ring-2 focus:ring-gold-300">
        <div class="grid md:grid-cols-2 gap-5">
            <select class="px-4 py-3 rounded-xl border border-gold-100">
                @foreach(config('brand.stores') as $store)
                    <option selected>{{ config('brand.name') }} – {{ $store['area'] }}, {{ $store['city'] }}</option>
                @endforeach
            </select>
            <input type="date" class="px-4 py-3 rounded-xl border border-gold-100">
        </div>
        <textarea placeholder="What are you looking for?" rows="4" class="w-full px-4 py-3 rounded-xl border border-gold-100"></textarea>
        <button type="button" class="btn-gold w-full">Confirm Appointment</button>
    </form>
</div>
@endsection
