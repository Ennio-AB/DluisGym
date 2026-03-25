@extends('layouts.public')
@section('title', 'Ubicación — D Luis Gym')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-20">

    <div class="mb-16 anim-1">
        <p class="text-xs text-ash uppercase tracking-[0.3em] mb-3">Encuéntranos</p>
        <h1 class="font-display text-6xl tracking-wide">UBICACIÓN</h1>
    </div>

    <div class="grid lg:grid-cols-2 gap-16">

        <div class="space-y-8 anim-2">
            <div class="border-l-2 border-ink pl-6">
                <p class="text-xs text-ash uppercase tracking-widest mb-1">Dirección</p>
                <p class="font-medium">Av. Winston Churchill #45<br>Piantini, Santo Domingo, D.N.</p>
            </div>
            <div class="border-l-2 border-ink pl-6">
                <p class="text-xs text-ash uppercase tracking-widest mb-1">Horario</p>
                <div class="text-sm space-y-1">
                    <p><span class="font-medium">Lunes – Viernes:</span> 6:00am – 10:00pm</p>
                    <p><span class="font-medium">Sábados:</span> 7:00am – 8:00pm</p>
                    <p><span class="font-medium">Domingos:</span> 8:00am – 2:00pm</p>
                </div>
            </div>
            <div class="border-l-2 border-ink pl-6">
                <p class="text-xs text-ash uppercase tracking-widest mb-1">Contacto</p>
                <p class="text-sm">+1 (809) 555-1234</p>
                <p class="text-sm text-ash">info@dluisgym.com</p>
            </div>
        </div>

        {{-- Map placeholder --}}
        <div class="bg-steel border border-iron h-72 lg:h-auto flex items-center justify-center anim-3">
            <div class="text-center">
                <p class="font-display text-3xl text-paper mb-2">MAPA</p>
                <p class="text-ash text-xs">Google Maps — próximamente</p>
            </div>
        </div>
    </div>
</div>

@endsection
