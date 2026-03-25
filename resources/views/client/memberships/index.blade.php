<x-app-layout>
    <x-slot name="title">Membresías</x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-6">

            <div class="mb-12 anim-1">
                <p class="text-xs text-ash uppercase tracking-[0.3em] mb-3">Elige tu plan</p>
                <h1 class="font-display text-5xl tracking-wide">MEMBRESÍAS</h1>
            </div>

            @if($memberships->isEmpty())
                <p class="text-ash">No hay membresías disponibles en este momento.</p>
            @else
                <div class="grid md:grid-cols-3 gap-px bg-mist">
                    @foreach($memberships as $i => $m)
                    <div class="bg-paper p-8 flex flex-col anim-{{ $i + 1 }}">
                        <div class="mb-6 pb-6 border-b border-mist">
                            <h2 class="font-display text-3xl tracking-wide">{{ strtoupper($m->name) }}</h2>
                            <p class="text-4xl font-display mt-2">RD${{ number_format($m->price, 2) }}</p>
                            <p class="text-xs text-ash mt-1">/ {{ $m->duration_days }} días</p>
                        </div>

                        @if($m->description)
                            <p class="text-sm text-ash mb-6 leading-relaxed">{{ $m->description }}</p>
                        @endif

                        @if($m->features)
                            <ul class="space-y-2 flex-1">
                                @foreach($m->features as $feat)
                                    <li class="flex items-start gap-2 text-sm">
                                        <span class="mt-0.5 w-4 h-4 border border-ink flex-shrink-0 flex items-center justify-center text-xs">✓</span>
                                        {{ $feat }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    @endforeach
                </div>

                <p class="mt-8 text-xs text-ash anim-4">
                    Para adquirir una membresía, visítanos en recepción o llámanos.
                </p>
            @endif
        </div>
    </div>
</x-app-layout>
