@extends('layouts.dashboard')
@section('page-title','Payment History')
@section('content')
<div class="grid md:grid-cols-2 gap-6 mb-8">
    <x-stat-card label="Total Amount" value="₹58,000" />
    <x-stat-card label="Paid Dues" value="12" />
</div>
<div class="space-y-4">
    @foreach(['Sri Akshayam Scheme','Sri Akshayam Scheme'] as $plan)
    <div class="card p-5">
        <div class="flex justify-between items-start mb-3">
            <div>
                <p class="text-xs text-ink-900/40">Ravishankar D</p>
                <p class="font-serif font-semibold">{{ $plan }}</p>
            </div>
            <span class="text-xs bg-gold-50 text-gold-600 px-3 py-1 rounded-full">AZ 0658</span>
        </div>
        <div class="grid grid-cols-4 gap-3 text-xs mb-4">
            <div><p class="text-ink-900/40">Paid Amount</p><p class="font-medium">₹2000</p></div>
            <div><p class="text-ink-900/40">Total Dues</p><p class="font-medium">03/12</p></div>
            <div><p class="text-ink-900/40">Maturity</p><p class="font-medium">24 Nov 2024</p></div>
            <div><p class="text-ink-900/40">Start On</p><p class="font-medium">15 Jun 2023</p></div>
        </div>
        <div class="border-t border-gold-50 pt-3 flex justify-between text-xs">
            <span>19 Jun 2023 · Trans ID: 258147369258147</span>
            <span class="font-semibold">₹1500.00</span>
        </div>
    </div>
    @endforeach
</div>
@endsection
