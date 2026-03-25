<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} — {{ $title ?? 'Portal' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-paper text-ink antialiased">

    <nav class="bg-ink border-b border-iron">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-display text-2xl text-paper tracking-widest">
                D LUIS GYM
            </a>
            <div class="flex items-center gap-6 text-sm">
                @auth
                    <span class="text-ash hidden sm:block">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-ash hover:text-paper transition-colors">
                            Salir
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-10">
        @if(session('success'))
            <div class="mb-6 px-4 py-3 border border-green-700 bg-green-50 text-green-800 text-sm anim-1">
                {{ session('success') }}
            </div>
        @endif
        {{ $slot }}
    </main>

</body>
</html>
