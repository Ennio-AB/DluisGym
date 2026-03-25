@extends('layouts.public')
@section('title', 'Ubicación — D Luis Gym')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-20">

    <div class="mb-16 anim-1">
        <p class="text-xs text-ash uppercase tracking-[0.3em] mb-3">
            <span class="text-fire">●</span> Encuéntranos
        </p>
        <h1 class="font-display text-6xl tracking-wide">UBICACIÓN</h1>
        <div class="w-16 h-1 bg-fire mt-4"></div>
    </div>

    <div class="grid lg:grid-cols-2 gap-16 items-start">

        <div class="space-y-8 anim-2">
            <div class="border-l-2 border-fire pl-6">
                <p class="text-xs text-ash uppercase tracking-widest mb-2">Dirección</p>
                <p class="font-medium text-lg">Av. Winston Churchill #45</p>
                <p class="text-ash">Piantini, Santo Domingo, D.N.</p>
            </div>

            <div class="border-l-2 border-fire pl-6">
                <p class="text-xs text-ash uppercase tracking-widest mb-2">Horario</p>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between border-b border-mist pb-2">
                        <span class="font-medium">Lunes – Viernes</span>
                        <span class="text-ash">6:00am – 10:00pm</span>
                    </div>
                    <div class="flex justify-between border-b border-mist pb-2">
                        <span class="font-medium">Sábados</span>
                        <span class="text-ash">7:00am – 8:00pm</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium">Domingos</span>
                        <span class="text-ash">8:00am – 2:00pm</span>
                    </div>
                </div>
            </div>

            <div class="border-l-2 border-fire pl-6">
                <p class="text-xs text-ash uppercase tracking-widest mb-2">Contacto</p>
                <p class="font-medium">+1 (809) 555-1234</p>
                <p class="text-ash text-sm mt-1">info@dluisgym.com</p>
            </div>

            <div class="border border-mist p-6 bg-paper">
                <p class="text-xs text-ash uppercase tracking-widest mb-3">¿Listo para entrenar?</p>
                <a href="{{ route('register') }}" class="btn-primary">Crear cuenta gratis</a>
            </div>
        </div>

        {{-- Map placeholder --}}
        <div class="anim-3">
            <div class="bg-steel border border-iron h-80 lg:h-96 flex items-center justify-center relative overflow-hidden">
                <div class="absolute inset-0 grain pointer-events-none"></div>
                <div class="text-center relative z-10">
                    <p class="font-display text-2xl text-paper mb-1">AV. WINSTON CHURCHILL #45</p>
                    <p class="text-ash text-xs uppercase tracking-widest mb-6">Piantini · Santo Domingo</p>
                    <span class="badge-fire text-xs px-3 py-1">Google Maps — próximamente</span>
                </div>
            </div>
            <p class="text-xs text-ash mt-4 leading-relaxed">
                Estamos ubicados en el corazón de Piantini, a pasos del Acuario Nacional. Parking disponible frente al local.
            </p>
        </div>

    </div>
</div>

@endsection
