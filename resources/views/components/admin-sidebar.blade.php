
@php
$links = [
    ['Overview', '/admin', 'overview'],
    ['Customers', '/admin/customers', 'customers'],
    ['Plans & Schemes', '/admin/plans', 'plans'],
    ['Payments', '/admin/payments', 'payments'],
    ['Appointments', '/admin/appointments', 'appointments'],
    ['Products', '/admin/products', 'products'],
    ['Collections', '/admin/collections', 'collections'],
    ['Offers', '/admin/offers', 'offers'],
    ['Gold Rate', '/admin/gold-rate', 'rate'],
    ['Reports', '/admin/reports', 'reports'],
    ['Settings', '/admin/settings', 'settings'],
];
@endphp

<aside class="w-72 min-h-screen bg-white border-r border-gold-100 p-6 hidden lg:flex lg:flex-col">
    <a href="{{ url('/') }}" class="flex items-center gap-3 mb-10">
        <x-logo />
    </a>

    <nav class="flex-1 space-y-1 text-sm">
        @foreach($links as [$label, $href, $icon])
            <a href="{{ url($href) }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->is(ltrim($href, '/')) ? 'bg-ink-900 text-white' : 'text-ink-800/70 hover:bg-gold-50' }} transition">
                <span class="w-2 h-2 rounded-full bg-gold-400"></span>
                {{ $label }}
            </a>
        @endforeach
    </nav>

    <div class="mt-6 pt-5 border-t border-gold-100">
        <div class="flex items-center justify-between gap-3">
            <div class="min-w-0">
                <p class="text-sm font-medium text-ink-800">Administrator</p>
                <p class="text-xs text-ink-800/60 truncate">
                    {{ auth()->user()->email ?? '' }}
                </p>
            </div>

            <a href="{{ url('/logout') }}"
               class="px-3 py-2 rounded-lg text-sm text-red-600 hover:bg-red-50 transition"
               title="Logout">
                Logout
            </a>
        </div>
    </div>
</aside>