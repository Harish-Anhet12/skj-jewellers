@extends('layouts.dashboard')
@section('page-title','Closed Plans')
@section('content')
<x-stat-card label="Total Closed Accounts" value="03" />
<div class="grid md:grid-cols-2 gap-6 mt-6">
    @foreach([1,2,3] as $i)
    <div class="card p-5">
        <div class="flex justify-between items-start mb-3">
            <div>
                <p class="font-serif font-semibold">Sasikumar – 5248</p>
                <p class="text-xs text-gold-500">Swarna Dharaa</p>
            </div>
            <span class="text-xs text-ink-900/40">Bill: 258147369258147</span>
        </div>
        <div class="grid grid-cols-3 gap-3 text-xs">
            <div><p class="text-ink-900/40">Joined</p><p class="font-medium">12 Nov 2022</p></div>
            <div><p class="text-ink-900/40">Closed</p><p class="font-medium">15 Nov 2023</p></div>
            <div><p class="text-ink-900/40">Installments</p><p class="font-medium">12/12</p></div>
        </div>
    </div>
    @endforeach
</div>
@endsection
