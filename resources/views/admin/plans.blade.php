@extends('layouts.admin')
@section('page-title','Plans & Schemes')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="font-serif font-semibold">Manage Schemes</h2>
    <button class="btn-gold !py-2 !px-5 text-sm">+ New Scheme</button>
</div>
<div class="grid md:grid-cols-2 gap-6">
    @foreach(['Swarna Dharaa'=>'842 subscribers','Chutti Lathika'=>'362 subscribers'] as $name => $sub)
    <div class="card p-6 flex justify-between items-center">
        <div>
            <h3 class="font-serif font-semibold">{{ $name }}</h3>
            <p class="text-xs text-ink-900/50">{{ $sub }}</p>
        </div>
        <button class="btn-outline !py-2 text-sm">Edit</button>
    </div>
    @endforeach
</div>
@endsection
