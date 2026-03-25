@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')

{{-- Stats --}}
<div class="grid sm:grid-cols-3 gap-4 mb-10">
    <div class="stat anim-1">
        <p class="stat-val">${{ number_format($salesToday, 2) }}</p>
        <p class="stat-label">Ventas hoy</p>
    </div>
    <div class="stat anim-2">
        <p class="stat-val">${{ number_format($salesMonth, 2) }}</p>
        <p class="stat-label">Ventas este mes</p>
    </div>
    <div class="stat anim-3 {{ $lowStock > 0 ? 'border-red-400' : '' }}">
        <p class="stat-val {{ $lowStock > 0 ? 'text-red-600' : '' }}">{{ $lowStock }}</p>
        <p class="stat-label">Productos bajo stock mínimo</p>
    </div>
</div>

{{-- Quick actions --}}
<div class="flex flex-wrap gap-3 mb-10 anim-4">
    <a href="{{ route('admin.sales.create') }}" class="btn-primary">+ Nueva Venta</a>
    <a href="{{ route('admin.products.create') }}" class="btn-ghost">+ Producto</a>
    <a href="{{ route('admin.reports') }}" class="btn-ghost">Ver Reportes</a>
</div>

{{-- Top products --}}
@if($topProducts->isNotEmpty())
<div class="anim-4">
    <h2 class="font-display text-2xl tracking-wide mb-4">TOP PRODUCTOS</h2>
    <div class="border border-mist">
        @foreach($topProducts as $p)
        <div class="flex items-center justify-between px-5 py-3 border-b border-mist last:border-b-0 text-sm">
            <span>{{ $p->name }}</span>
            <span class="font-medium">{{ $p->total_qty }} uds.</span>
        </div>
        @endforeach
    </div>
</div>
@endif

@endsection
