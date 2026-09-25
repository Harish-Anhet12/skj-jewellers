@props(['eyebrow' => '', 'title' => '', 'center' => false])
<div class="{{ $center ? 'text-center' : '' }} mb-6">
    @if($eyebrow)<p class="section-subtitle !mb-1">{{ $eyebrow }}</p>@endif
    <h2 class="section-title">{{ $title }}</h2>
</div>
