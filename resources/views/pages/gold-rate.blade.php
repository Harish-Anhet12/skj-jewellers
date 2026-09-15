@extends('layouts.app')
@section('title', 'Today\'s Gold Rate · '.config('brand.name'))
@section('content')
<div class="max-w-5xl mx-auto px-4 md:px-8 py-12">
    <x-section-heading eyebrow="Live Rates" title="Today's Gold & Silver Rate" center />
    <div class="grid md:grid-cols-2 gap-8 mb-12">
        <div class="rounded-3xl bg-gradient-to-br from-gold-400 to-gold-600 text-white p-8 text-center">
            <p class="uppercase tracking-widest text-xs text-white/70 mb-2">Gold Rate (22K)</p>
            <p class="text-4xl font-serif font-bold">₹6,589.23 <span class="text-base font-normal">/gm</span></p>
        </div>
        <div class="rounded-3xl bg-ink-900 text-white p-8 text-center">
            <p class="uppercase tracking-widest text-xs text-white/50 mb-2">Silver Rate</p>
            <p class="text-4xl font-serif font-bold">₹86.50 <span class="text-base font-normal">/gm</span></p>
        </div>
    </div>
    <div class="card overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gold-50 text-ink-900/70">
                <tr><th class="text-left p-4">Purity</th><th class="text-left p-4">Rate / gram</th><th class="text-left p-4">Rate / 8 gram</th></tr>
            </thead>
            <tbody>
                @foreach([['24K','₹7,180.00','₹57,440.00'],['22K','₹6,589.23','₹52,713.84'],['18K','₹5,385.00','₹43,080.00']] as [$k,$g,$g8])
                <tr class="border-t border-gold-50">
                    <td class="p-4 font-medium">{{ $k }}</td><td class="p-4">{{ $g }}</td><td class="p-4">{{ $g8 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
