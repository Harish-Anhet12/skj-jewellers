@extends('layouts.app')
@section('title', 'Connect With Us · '.config('brand.name'))
@section('content')
<div class="max-w-5xl mx-auto px-4 md:px-8 py-16 grid md:grid-cols-2 gap-12">
    <div>
        <x-section-heading eyebrow="We’re Here to Help" title="Connect With Us" />
        <p class="text-ink-900/60 mb-6">Have a question about our jewellery or gold savings plans? Get in touch with us by phone, WhatsApp, email, or visit our Chickpet, Bengaluru showroom.</p>
        <ul class="space-y-3 text-sm text-ink-900/70">
            <li>📞 {{ config('brand.phone') }}</li>
            <li>✉️ {{ config('brand.email') }}</li>
            <li>💬 WhatsApp: {{ config('brand.phone') }}</li>
            <li>📍 Chickpet, Bengaluru, Karnataka</li>
        </ul>
    </div>
    <form class="card p-8 space-y-4">
        <input type="text" placeholder="Your Name" class="w-full px-4 py-3 rounded-xl border border-gold-100">
        <input type="email" placeholder="Your Email" class="w-full px-4 py-3 rounded-xl border border-gold-100">
        <textarea rows="5" placeholder="How can we help you?" class="w-full px-4 py-3 rounded-xl border border-gold-100"></textarea>
        <button type="button" class="btn-gold w-full">Send Your Message</button>
    </form>
</div>
@endsection
