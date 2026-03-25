@extends('layouts.public')
@section('title', 'D Luis Gym — Forja Tu Cuerpo')

@section('content')

{{-- Hero --}}
<section class="grain bg-ink text-paper overflow-hidden">
    <div class="max-w-6xl mx-auto px-6 py-28 grid lg:grid-cols-2 gap-16 items-end">
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
                Entrenamiento serio, resultados reales. Equipamiento de primer nivel y comunidad que te impulsa.
            </p>
            <div class="flex gap-4 mt-10 anim-4">
                <a href="{{ route('memberships') }}" class="btn-primary">Ver Membresías</a>
                <a href="{{ route('location') }}" class="btn-ghost border-iron text-mist hover:bg-iron hover:text-paper">Cómo Llegar</a>
            </div>
        </div>

        <div class="hidden lg:block anim-2">
            <div class="border border-iron p-8 space-y-0 stripe-fire">
                <div class="stat-fire bg-steel border-mist/20 mb-px">
                    <p class="stat-val text-fire">500+</p>
                    <p class="stat-label text-ash">Miembros activos</p>
                </div>
                <div class="p-6 bg-steel border border-mist/20 mb-px">
                    <p class="font-display text-4xl text-paper">3</p>
                    <p class="stat-label text-ash">Planes disponibles</p>
                </div>
                <div class="p-6 bg-steel border border-mist/20">
                    <p class="font-display text-4xl text-paper">6am</p>
                    <p class="stat-label text-ash">Abrimos cada día</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Features --}}
<section class="max-w-6xl mx-auto px-6 py-24">
    <h2 class="font-display text-5xl mb-2 tracking-wide">POR QUÉ <span class="text-fire">ELEGIRNOS</span></h2>
    <div class="w-16 h-1 bg-fire mb-16"></div>
    <div class="grid sm:grid-cols-3 gap-0 border border-mist">
        @foreach([
            ['Equipamiento', 'Pesas, máquinas y cardio de última generación.'],
            ['Cafetería',    'Proteínas, suplementos y bebidas energéticas en el lugar.'],
            ['Comunidad',    'Entrenadores y compañeros que te llevan al siguiente nivel.'],
        ] as $i => [$title, $desc])
        <div class="p-8 border-r border-mist last:border-r-0 anim-{{ $i + 1 }} hover:bg-mist/40 transition-colors group">
            <p class="font-display text-4xl text-fire mb-3">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</p>
            <h3 class="font-display text-xl tracking-wide mb-2">{{ $title }}</h3>
            <p class="text-ash text-sm leading-relaxed">{{ $desc }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-fire text-white px-6 py-20 text-center grain">
    <h2 class="font-display text-5xl mb-4 tracking-wide">EMPIEZA HOY</h2>
    <p class="text-white/80 mb-8 max-w-sm mx-auto">Regístrate gratis y accede a toda la información de membresías.</p>
    <a href="{{ route('register') }}" class="btn bg-white text-fire hover:bg-paper font-semibold">Crear Cuenta</a>
</section>

@endsection
