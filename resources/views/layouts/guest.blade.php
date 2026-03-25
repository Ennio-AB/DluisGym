<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-ink text-paper antialiased flex">

    {{-- Left panel --}}
    <div class="hidden lg:flex flex-col justify-between w-1/2 grain bg-steel border-r border-iron p-12">
        <a href="{{ route('home') }}" class="font-display text-4xl tracking-widest">
            <span class="text-fire">D</span><span class="text-paper"> LUIS GYM</span>
        </a>
        <div>
            <p class="font-display text-6xl leading-none text-paper mb-4">FORJA<br><span class="text-fire">TU</span><br>CUERPO.</p>
            <p class="text-ash text-sm">Cafetería · Membresías · Entrenamiento</p>
        </div>
        <p class="text-xs text-iron">© {{ date('Y') }} D Luis Gym</p>
    </div>

    {{-- Right panel --}}
    <div class="flex-1 flex flex-col items-center justify-center px-6 py-12">
        <div class="w-full max-w-sm">
            <a href="{{ route('home') }}" class="lg:hidden block font-display text-3xl text-paper mb-10 tracking-widest">
                D LUIS GYM
            </a>
            {{ $slot }}
        </div>
    </div>

</body>
</html>
