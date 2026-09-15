@extends('layouts.admin')
@section('page-title','Offers')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="font-serif font-semibold">Active Offers</h2>
    <button class="btn-gold !py-2 !px-5 text-sm">+ New Offer</button>
</div>
<div class="grid md:grid-cols-2 gap-6">
    @foreach(['25% off Making Charges','Flat ₹5,000 off on Diamond'] as $o)
    <div class="card p-6 flex justify-between items-center">
        <p class="font-medium">{{ $o }}</p>
        <button class="btn-outline !py-2 text-sm">Edit</button>
    </div>
    @endforeach
</div>
@endsection
