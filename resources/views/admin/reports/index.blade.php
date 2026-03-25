@extends('layouts.admin')
@section('title', 'Reportes')

@section('content')

{{-- Filters --}}
<form method="GET" action="{{ route('admin.reports') }}" class="flex flex-wrap gap-3 items-end mb-8">
    <div>
        <label class="label">Desde</label>
        <input name="from" type="date" class="input" value="{{ $from }}">
    </div>
    <div>
        <label class="label">Hasta</label>
        <input name="to" type="date" class="input" value="{{ $to }}">
    </div>
    <button type="submit" class="btn-primary">Filtrar</button>
</form>

{{-- Summary --}}
<div class="grid sm:grid-cols-3 gap-4 mb-10">
    <div class="stat anim-1">
        <p class="stat-val">RD${{ number_format($income, 2) }}</p>
        <p class="stat-label">Ingresos</p>
    </div>
    <div class="stat anim-2">
        <p class="stat-val text-ash">RD${{ number_format($cost, 2) }}</p>
        <p class="stat-label">Costo</p>
    </div>
    <div class="stat anim-3 {{ $profit >= 0 ? '' : 'border-red-400' }}">
        <p class="stat-val {{ $profit >= 0 ? 'text-green-700' : 'text-red-600' }}">RD${{ number_format($profit, 2) }}</p>
        <p class="stat-label">Ganancia neta</p>
    </div>
</div>

{{-- Daily breakdown --}}
@if($byDay->isNotEmpty())
<div class="mb-10">
    <h2 class="font-display text-2xl tracking-wide mb-4">POR DÍA</h2>
    <div class="border border-mist">
        @foreach($byDay as $date => $total)
        <div class="flex items-center justify-between px-5 py-3 border-b border-mist last:border-b-0 text-sm">
            <span class="text-ash">{{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}</span>
            <span class="font-medium">RD${{ number_format($total, 2) }}</span>
        </div>
        @endforeach
    </div>
</div>
@endif

{{-- Transactions --}}
@if($sales->isNotEmpty())
<div>
    <h2 class="font-display text-2xl tracking-wide mb-4">TRANSACCIONES</h2>
    <div class="border border-mist">
        <table class="w-full text-sm">
            <thead class="bg-steel text-paper">
                <tr>
                    <th class="px-4 py-3 text-left font-medium">#</th>
                    <th class="px-4 py-3 text-left font-medium">Fecha</th>
                    <th class="px-4 py-3 text-right font-medium">Total</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                <tr class="border-t border-mist">
                    <td class="px-4 py-3 text-ash">#{{ $sale->id }}</td>
                    <td class="px-4 py-3">{{ $sale->sold_at->format('d/m/Y H:i') }}</td>
                    <td class="px-4 py-3 text-right font-medium">RD${{ number_format($sale->total, 2) }}</td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.sales.show', $sale) }}" class="text-ash hover:text-ink text-xs underline">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection
