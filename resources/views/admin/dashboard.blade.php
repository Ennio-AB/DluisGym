@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')

{{-- Greeting --}}
@php
    $hour = now()->hour;
    $greeting = $hour < 12 ? 'Buenos días' : ($hour < 18 ? 'Buenas tardes' : 'Buenas noches');
@endphp
<div class="mb-8 anim-1">
    <p class="text-xs text-ash uppercase tracking-widest">{{ now()->format('d/m/Y') }}</p>
    <h2 class="font-display text-3xl tracking-wide mt-0.5">
        {{ $greeting }}, <span class="text-fire">{{ auth()->user()->name }}</span>
    </h2>
</div>

{{-- Stats --}}
<div class="grid sm:grid-cols-3 gap-4 mb-8">
    <div class="stat-fire anim-2">
        <p class="stat-val text-fire">RD${{ number_format($salesToday, 2) }}</p>
        <p class="stat-label">Ventas hoy</p>
    </div>
    <div class="stat anim-2">
        <p class="stat-val">RD${{ number_format($salesMonth, 2) }}</p>
        <p class="stat-label">Ventas este mes</p>
    </div>
    <div class="stat anim-3 {{ $lowStock > 0 ? 'border-t-4 border-t-red-500' : '' }}">
        <p class="stat-val {{ $lowStock > 0 ? 'text-red-600 font-bold' : '' }}">{{ $lowStock }}</p>
        <p class="stat-label">Bajo stock mínimo</p>
    </div>
</div>

{{-- Body: actions + top products --}}
<div class="grid lg:grid-cols-3 gap-6 anim-4">

    {{-- Quick actions --}}
    <div>
        <h3 class="font-display text-xl tracking-wide mb-1">ACCIONES <span class="text-fire">RÁPIDAS</span></h3>
        <div class="w-8 h-0.5 bg-fire mb-4"></div>
        <div class="border border-mist p-5 flex flex-col gap-3">
            <a href="{{ route('admin.sales.create') }}"       class="btn-primary w-full justify-center">+ Nueva Venta</a>
            <a href="{{ route('admin.products.create') }}"    class="btn-dark   w-full justify-center">+ Producto</a>
            <a href="{{ route('admin.memberships.create') }}" class="btn-dark   w-full justify-center">+ Membresía</a>
            <a href="{{ route('admin.reports') }}"            class="btn-ghost  w-full justify-center">Ver Reportes</a>
        </div>

        {{-- Low stock warning --}}
        @if($lowStock > 0)
        <div class="mt-4 border-l-4 border-red-500 bg-red-50 px-4 py-3 text-sm text-red-700">
            <span class="font-medium">{{ $lowStock }} producto{{ $lowStock > 1 ? 's' : '' }}</span>
            con stock bajo mínimo.
            <a href="{{ route('admin.products.index') }}" class="underline ml-1">Revisar</a>
        </div>
        @endif
    </div>

    {{-- Top products --}}
    <div class="lg:col-span-2">
        <h3 class="font-display text-xl tracking-wide mb-1">TOP <span class="text-fire">PRODUCTOS</span></h3>
        <div class="w-8 h-0.5 bg-fire mb-4"></div>
        @if($topProducts->isNotEmpty())
        <div class="border border-mist divide-y divide-mist">
            @foreach($topProducts as $i => $p)
            <div class="flex items-center justify-between px-5 py-4 text-sm {{ $i === 0 ? 'bg-fire/5' : 'hover:bg-mist/30' }} transition-colors">
                <div class="flex items-center gap-4">
                    <span class="font-display text-2xl w-8 flex-shrink-0 {{ $i === 0 ? 'text-fire' : 'text-mist' }}">
                        {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                    </span>
                    <span class="{{ $i === 0 ? 'font-medium' : '' }}">{{ $p->name }}</span>
                </div>
                <div class="text-right flex-shrink-0">
                    <span class="font-display text-xl {{ $i === 0 ? 'text-fire' : '' }}">{{ $p->total_qty }}</span>
                    <span class="text-ash text-xs ml-1">uds.</span>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="border border-mist p-12 flex flex-col items-center justify-center text-center">
            <p class="font-display text-3xl text-mist mb-2">SIN DATOS</p>
            <p class="text-ash text-sm">Registra ventas para ver los productos más vendidos.</p>
            <a href="{{ route('admin.sales.create') }}" class="btn-primary mt-6">+ Registrar Venta</a>
        </div>
        @endif
    </div>

</div>

@endsection
