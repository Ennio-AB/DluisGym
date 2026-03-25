@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')

{{-- Stats --}}
<div class="grid sm:grid-cols-3 gap-4 mb-10">
    <div class="stat-fire anim-1">
        <p class="stat-val text-fire">RD${{ number_format($salesToday, 2) }}</p>
        <p class="stat-label">Ventas hoy</p>
    </div>
    <div class="stat anim-2">
        <p class="stat-val">RD${{ number_format($salesMonth, 2) }}</p>
        <p class="stat-label">Ventas este mes</p>
    </div>
    <div class="stat anim-3 {{ $lowStock > 0 ? 'border-t-4 border-t-red-500' : '' }}">
        <p class="stat-val {{ $lowStock > 0 ? 'text-red-600' : '' }}">{{ $lowStock }}</p>
        <p class="stat-label">Bajo stock mínimo</p>
    </div>
</div>

{{-- Quick actions --}}
<div class="flex flex-wrap gap-3 mb-10 anim-4">
    <a href="{{ route('admin.sales.create') }}" class="btn-primary">+ Nueva Venta</a>
    <a href="{{ route('admin.products.create') }}" class="btn-dark">+ Producto</a>
    <a href="{{ route('admin.reports') }}" class="btn-ghost">Ver Reportes</a>
</div>

{{-- Top products --}}
@if($topProducts->isNotEmpty())
<div class="anim-4">
    <h2 class="font-display text-2xl tracking-wide mb-1">TOP <span class="text-fire">PRODUCTOS</span></h2>
    <div class="w-10 h-0.5 bg-fire mb-4"></div>
    <div class="border border-mist">
        @foreach($topProducts as $i => $p)
        <div class="flex items-center justify-between px-5 py-3 border-b border-mist last:border-b-0 text-sm">
            <div class="flex items-center gap-3">
                <span class="font-display text-lg {{ $i === 0 ? 'text-fire' : 'text-ash' }}">{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</span>
                <span>{{ $p->name }}</span>
            </div>
            <span class="font-medium">{{ $p->total_qty }} uds.</span>
        </div>
        @endforeach
    </div>
</div>
@endif

@endsection
