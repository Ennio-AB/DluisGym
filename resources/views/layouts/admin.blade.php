<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin — @yield('title', 'D Luis Gym')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-paper text-ink antialiased flex">

    {{-- Sidebar --}}
    <aside class="w-56 min-h-screen bg-ink flex flex-col flex-shrink-0">
        <div class="px-6 py-6 border-b border-iron">
            <a href="{{ route('admin.dashboard') }}" class="font-display text-xl text-paper tracking-widest block">
                D LUIS GYM
            </a>
            <p class="text-xs text-ash mt-1 uppercase tracking-widest">Admin</p>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-1 text-sm">
            <x-side-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                Dashboard
            </x-side-link>
            <x-side-link href="{{ route('admin.products.index') }}" :active="request()->routeIs('admin.products*')">
                Productos
            </x-side-link>
            <x-side-link href="{{ route('admin.sales.index') }}" :active="request()->routeIs('admin.sales*')">
                Ventas
            </x-side-link>
            <x-side-link href="{{ route('admin.memberships.index') }}" :active="request()->routeIs('admin.memberships*')">
                Membresías
            </x-side-link>
            <x-side-link href="{{ route('admin.reports') }}" :active="request()->routeIs('admin.reports')">
                Reportes
            </x-side-link>
        </nav>

        <div class="px-4 py-4 border-t border-iron text-xs text-ash">
            <p class="mb-2">{{ auth()->user()->name }}</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:text-paper transition-colors">Cerrar sesión</button>
            </form>
        </div>
    </aside>

    {{-- Main --}}
    <div class="flex-1 flex flex-col min-h-screen">
        <header class="px-8 py-5 border-b border-mist bg-paper flex items-center justify-between">
            <h1 class="font-display text-3xl tracking-wide">@yield('title')</h1>
            @yield('actions')
        </header>

        <main class="flex-1 px-8 py-8">
            @if(session('success'))
                <div class="mb-6 px-4 py-3 border border-green-700 bg-green-50 text-green-800 text-sm anim-1">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>

</body>
</html>
