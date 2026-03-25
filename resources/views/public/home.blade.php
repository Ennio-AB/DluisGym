@extends('layouts.public')
@section('title', 'D Luis Gym — Forja Tu Cuerpo')

@section('content')

{{-- Hero --}}
<section class="grain bg-ink text-paper overflow-hidden">
    <div class="max-w-6xl mx-auto px-6 py-28 grid lg:grid-cols-2 gap-16 items-center">
        <div>
            <p class="text-xs text-ash uppercase tracking-[0.3em] mb-6 anim-1">
                <span class="text-fire">●</span> Santo Domingo · Est. 2018
            </p>
            <h1 class="font-display leading-none tracking-wide anim-2">
                <span class="text-[7rem] block">FORJA</span>
                <span class="text-[7rem] block text-fire">TU</span>
                <span class="text-[7rem] block">CUERPO.</span>
            </h1>
            <p class="mt-8 text-mist text-lg max-w-sm leading-relaxed anim-3">
                Entrenamiento serio, resultados reales. Equipamiento de primer nivel y comunidad que te impulsa a llegar más lejos.
            </p>
            <div class="flex gap-4 mt-10 anim-4">
                <a href="{{ route('memberships') }}" class="btn-primary">Ver Membresías</a>
                <a href="{{ route('location') }}" class="btn-ghost border-iron text-mist hover:bg-iron hover:text-paper">Cómo Llegar</a>
            </div>
        </div>

        <div class="hidden lg:block anim-2">
            <div class="border border-iron stripe-fire divide-y divide-iron overflow-hidden">
                <div class="px-8 py-7 bg-steel">
                    <p class="font-display text-5xl text-fire">500+</p>
                    <p class="text-xs text-ash uppercase tracking-widest mt-2">Miembros activos</p>
                </div>
                <div class="px-8 py-7 bg-steel">
                    <p class="font-display text-5xl text-paper">3</p>
                    <p class="text-xs text-ash uppercase tracking-widest mt-2">Planes disponibles</p>
                </div>
                <div class="px-8 py-7 bg-steel">
                    <p class="font-display text-3xl text-paper">6am – 10pm</p>
                    <p class="text-xs text-ash uppercase tracking-widest mt-2">Abierto todos los días</p>
                </div>
                <div class="px-8 py-7 bg-steel">
                    <p class="font-display text-3xl text-paper">Sin Contratos</p>
                    <p class="text-xs text-ash uppercase tracking-widest mt-2">Planes mensuales flexibles</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Features --}}
<section class="max-w-6xl mx-auto px-6 py-24">
    <p class="text-xs text-ash uppercase tracking-[0.3em] mb-3 anim-1">
        <span class="text-fire">●</span> Lo que nos diferencia
    </p>
    <h2 class="font-display text-5xl mb-2 tracking-wide anim-1">POR QUÉ <span class="text-fire">ELEGIRNOS</span></h2>
    <div class="w-16 h-1 bg-fire mb-16 anim-1"></div>
    <div class="grid sm:grid-cols-3 border border-mist">
        @foreach([
            ['01', 'Equipamiento', 'Pesas libres, máquinas de cable, cardio de última generación y zona de estiramiento. Todo lo que necesitas bajo un mismo techo.'],
            ['02', 'Cafetería',    'Proteínas, creatina, pre-workouts, barras energéticas y bebidas. Recargas sin salir del gym.'],
            ['03', 'Comunidad',    'Entrenadores certificados y una comunidad que te lleva al siguiente nivel, desde principiantes hasta competidores.'],
        ] as $i => [$num, $title, $desc])
        <div class="p-10 border-r border-mist last:border-r-0 anim-{{ $i + 1 }} group relative overflow-hidden flex flex-col">
            <div class="absolute bottom-0 left-0 h-0.5 w-0 bg-fire group-hover:w-full transition-all duration-500"></div>
            <p class="font-display text-7xl text-mist/60 mb-4 leading-none select-none">{{ $num }}</p>
            <h3 class="font-display text-2xl tracking-wide mb-3">{{ $title }}</h3>
            <p class="text-ash text-sm leading-relaxed flex-1">{{ $desc }}</p>
            <div class="mt-6 pt-6 border-t border-mist">
                <a href="{{ route('memberships') }}" class="text-xs text-fire uppercase tracking-widest hover:underline">Ver planes →</a>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- Info strip --}}
<section class="bg-ink text-paper border-y border-iron">
    <div class="max-w-6xl mx-auto px-6 py-10 grid sm:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-iron text-center">
        <div class="py-8 sm:py-0 sm:px-10">
            <p class="font-display text-3xl text-fire">Lun – Dom</p>
            <p class="text-xs text-ash uppercase tracking-widest mt-2">6:00am – 10:00pm</p>
        </div>
        <div class="py-8 sm:py-0 sm:px-10">
            <p class="font-display text-3xl text-paper">Piantini</p>
            <p class="text-xs text-ash uppercase tracking-widest mt-2">Santo Domingo, R.D.</p>
        </div>
        <div class="py-8 sm:py-0 sm:px-10">
            <p class="font-display text-3xl text-paper">RD$1,500</p>
            <p class="text-xs text-ash uppercase tracking-widest mt-2">Desde por mes</p>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-fire text-white px-6 py-28 text-center grain">
    <p class="text-white/60 text-xs uppercase tracking-[0.3em] mb-6">Sin contratos · Sin compromisos</p>
    <h2 class="font-display text-6xl mb-4 tracking-wide">EMPIEZA HOY</h2>
    <p class="text-white/80 mb-10 max-w-sm mx-auto text-lg leading-relaxed">
        Regístrate en minutos y accede a todos nuestros planes de membresía.
    </p>
    <a href="{{ route('register') }}" class="btn bg-white text-fire hover:bg-paper font-semibold text-sm px-8 py-3">Crear Cuenta Gratis</a>
</section>

@endsection
