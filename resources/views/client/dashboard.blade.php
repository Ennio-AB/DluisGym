<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-6">
            <p class="text-xs text-ash uppercase tracking-[0.3em] mb-3 anim-1">Bienvenido</p>
            <h1 class="font-display text-5xl tracking-wide mb-10 anim-2">{{ auth()->user()->name }}</h1>

            <div class="grid sm:grid-cols-2 gap-4 anim-3">
                <a href="{{ route('client.memberships') }}"
                   class="card p-8 group hover:border-ink transition-colors">
                    <p class="font-display text-2xl tracking-wide mb-2 group-hover:text-ash transition-colors">MEMBRESÍAS</p>
                    <p class="text-sm text-ash">Ver los planes disponibles del gimnasio.</p>
                </a>
                <a href="{{ route('location') }}"
                   class="card p-8 group hover:border-ink transition-colors">
                    <p class="font-display text-2xl tracking-wide mb-2 group-hover:text-ash transition-colors">UBICACIÓN</p>
                    <p class="text-sm text-ash">Cómo llegar a D Luis Gym.</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
