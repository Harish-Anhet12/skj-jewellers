@extends('layouts.admin')
@section('page-title','Gold Rate')
@section('content')
<div class="card p-8 max-w-lg">
    <h3 class="font-serif font-semibold mb-6">Update Today's Rate</h3>
    <div class="space-y-4">
        <div><label class="text-xs text-ink-900/40">24K Rate (per gram)</label><input value="7180.00" class="w-full mt-1 px-4 py-3 rounded-xl border border-gold-100"></div>
        <div><label class="text-xs text-ink-900/40">22K Rate (per gram)</label><input value="6589.23" class="w-full mt-1 px-4 py-3 rounded-xl border border-gold-100"></div>
        <div><label class="text-xs text-ink-900/40">Silver Rate (per gram)</label><input value="86.50" class="w-full mt-1 px-4 py-3 rounded-xl border border-gold-100"></div>
    </div>
    <button class="btn-gold mt-6">Publish Rate</button>
</div>
@endsection
