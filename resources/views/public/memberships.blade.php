@extends('layouts.public')
@section('title', 'Membresías — D Luis Gym')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-20">

    <div class="mb-16 anim-1">
        <p class="text-xs text-ash uppercase tracking-[0.3em] mb-3">
            <span class="text-fire">●</span> Elige tu plan
        </p>
        <h1 class="font-display text-6xl tracking-wide">MEMBRESÍAS</h1>
        <div class="w-16 h-1 bg-fire mt-4"></div>
    </div>

    @if($memberships->isEmpty())
        <p class="text-ash">No hay membresías disponibles en este momento.</p>
    @else
        <div class="grid md:grid-cols-3 gap-px bg-mist">
            @foreach($memberships as $i => $m)
            @php $featured = $i === 1; @endphp
            <div class="{{ $featured ? 'bg-ink text-paper' : 'bg-paper' }} p-8 flex flex-col anim-{{ $i + 1 }} relative">
                @if($featured)
                    <span class="absolute top-0 left-0 right-0 h-1 bg-fire"></span>
                    <span class="badge-fire absolute top-4 right-4">Popular</span>
                @endif

                <div class="mb-6 pb-6 border-b {{ $featured ? 'border-iron' : 'border-mist' }}">
                    <h2 class="font-display text-3xl tracking-wide">{{ strtoupper($m->name) }}</h2>
                    <p class="text-4xl font-display mt-2 {{ $featured ? 'text-fire' : 'text-fire' }}">
                        RD${{ number_format($m->price, 2) }}
                    </p>
                    <p class="text-xs {{ $featured ? 'text-ash' : 'text-ash' }} mt-1">/ {{ $m->duration_days }} días</p>
                </div>

                @if($m->description)
                    <p class="text-sm {{ $featured ? 'text-mist' : 'text-ash' }} mb-6 leading-relaxed">{{ $m->description }}</p>
                @endif

                @if($m->features)
                    <ul class="space-y-2 flex-1">
                        @foreach($m->features as $feat)
                            <li class="flex items-start gap-2 text-sm {{ $featured ? 'text-mist' : '' }}">
                                <span class="mt-0.5 w-4 h-4 flex-shrink-0 flex items-center justify-center text-fire font-bold">✓</span>
                                {{ $feat }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                <div class="mt-8">
                    @if($featured)
                        <a href="{{ route('register') }}" class="btn-primary w-full justify-center">Registrarse</a>
                    @else
                        <a href="{{ route('register') }}" class="btn-ghost w-full justify-center">Registrarse</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    @endif

    <p class="mt-10 text-xs text-ash anim-4">
        Para más información sobre pagos y condiciones, visítanos en el gimnasio.
    </p>
</div>

@endsection
