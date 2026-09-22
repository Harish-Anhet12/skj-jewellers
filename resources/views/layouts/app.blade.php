<!DOCTYPE html>
<html lang="en" class="bg-gray-50 text-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Admin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.5); }
    </style>
</head>
<body class="flex h-screen overflow-hidden bg-gray-50 selection:bg-indigo-100 selection:text-indigo-900">

    <!-- Sidebar -->
    <aside class="w-64 glass h-full flex flex-col shadow-xl z-20 sticky top-0">
        <div class="h-20 flex items-center px-8 border-b border-gray-200/50 bg-gradient-to-r from-indigo-500 to-purple-600">
            <h1 class="text-2xl font-bold text-white tracking-tight">Admin<span class="text-indigo-200">Pro</span></h1>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            @php
                $navItems = [
                    ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'can' => 'any'],
                    ['route' => 'departments.index', 'label' => 'Departments', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'can' => 'admin'],
                    ['route' => 'roles.index', 'label' => 'Roles', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.956 11.956 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'can' => 'admin'],
                    ['route' => 'users.index', 'label' => 'Users', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'can' => 'admin'],
                ];
            @endphp

            @foreach($navItems as $item)
                @if(isset($item['can']) && $item['can'] !== 'any' && !Auth::user()->can($item['can']))
                    @continue
                @endif
                <a href="{{ route($item['route']) }}" 
                   class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs(Str::before($item['route'], '.') . '*') ? 'bg-indigo-50 text-indigo-700 shadow-sm' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs(Str::before($item['route'], '.') . '*') ? 'text-indigo-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                    </svg>
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-full relative overflow-hidden">
        <!-- Top Header -->
        <header class="h-20 glass flex items-center justify-between px-8 z-10 border-b border-gray-200/50">
            <h2 class="text-xl font-semibold text-gray-800">@yield('header')</h2>
            
            <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-3 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-100">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold text-sm shadow-inner">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <span class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</span>
                </div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-gray-500 hover:text-red-600 transition-colors px-3 py-2 rounded-lg hover:bg-red-50">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50/50 p-8">
            <div class="max-w-6xl mx-auto space-y-6">
                @if(session('success'))
                    <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-lg shadow-sm animate-[slideIn_0.3s_ease-out]">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <style>
        @keyframes slideIn { from { transform: translateY(-10px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    </style>
</body>
</html>