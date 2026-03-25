<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'D Luis Gym')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-paper text-ink antialiased flex flex-col">

    {{-- Fire stripe at very top --}}
    <div class="h-1 bg-fire w-full"></div>

    <nav class="bg-ink border-b border-iron sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-display text-2xl tracking-widest">
                <span class="text-fire">D</span><span class="text-paper"> LUIS GYM</span>
            </a>
            <div class="flex items-center gap-6 text-sm">
                <a href="{{ route('memberships') }}"
                   class="transition-colors {{ request()->routeIs('memberships') ? 'text-fire' : 'text-ash hover:text-paper' }}">
                    Membresías
                </a>
                <a href="{{ route('location') }}"
                   class="transition-colors {{ request()->routeIs('location') ? 'text-fire' : 'text-ash hover:text-paper' }}">
                    Ubicación
                </a>
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-primary text-xs px-4 py-2">Mi Portal</a>
                @else
                    <a href="{{ route('login') }}" class="text-ash hover:text-paper transition-colors">Ingresar</a>
                    <a href="{{ route('register') }}" class="btn-primary text-xs px-4 py-2">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="bg-ink border-t border-iron px-6 py-8 mt-20">
        <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <p class="font-display text-xl tracking-widest">
                    <span class="text-fire">D</span><span class="text-paper"> LUIS GYM</span>
                </p>
                <p class="text-xs text-ash mt-1">Tu mejor versión empieza aquí.</p>
            </div>
            <div class="flex gap-6 text-xs text-ash">
                <a href="{{ route('memberships') }}" class="hover:text-fire transition-colors">Membresías</a>
                <a href="{{ route('location') }}" class="hover:text-fire transition-colors">Ubicación</a>
                <a href="{{ route('login') }}" class="hover:text-fire transition-colors">Ingresar</a>
            </div>
        </div>
        <p class="text-center text-xs text-iron mt-6">© {{ date('Y') }} D Luis Gym. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
