@extends('layouts.admin')
@section('page-title','Products')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="font-serif font-semibold">Catalogue</h2>
    <button class="btn-gold !py-2 !px-5 text-sm">+ Add Product</button>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    @for($i=0;$i<8;$i++)
    <x-product-card />
    @endfor
</div>
@endsection
