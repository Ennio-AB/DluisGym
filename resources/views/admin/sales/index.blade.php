@extends('layouts.admin')
@section('title', 'Ventas')

@section('actions')
    <a href="{{ route('admin.sales.create') }}" class="btn-primary">+ Nueva Venta</a>
@endsection

@section('content')

<div class="border border-mist">
    <table class="w-full text-sm">
        <thead class="bg-steel text-paper">
            <tr>
                <th class="px-4 py-3 text-left font-medium">#</th>
                <th class="px-4 py-3 text-left font-medium">Fecha</th>
                <th class="px-4 py-3 text-right font-medium">Total</th>
                <th class="px-4 py-3 text-left font-medium hidden md:table-cell">Notas</th>
                <th class="px-4 py-3"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($sales as $sale)
            <tr class="border-t border-mist hover:bg-mist/30 transition-colors">
                <td class="px-4 py-3 text-ash">#{{ $sale->id }}</td>
                <td class="px-4 py-3">{{ $sale->sold_at->format('d/m/Y H:i') }}</td>
                <td class="px-4 py-3 text-right font-medium">RD${{ number_format($sale->total, 2) }}</td>
                <td class="px-4 py-3 text-ash hidden md:table-cell">{{ $sale->notes ?? '—' }}</td>
                <td class="px-4 py-3 text-right">
                    <a href="{{ route('admin.sales.show', $sale) }}" class="text-ash hover:text-ink text-xs underline">Ver</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-4 py-8 text-center text-ash">No hay ventas aún.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $sales->links() }}</div>

@endsection
