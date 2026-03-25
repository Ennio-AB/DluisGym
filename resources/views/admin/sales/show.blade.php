@extends('layouts.admin')
@section('title', 'Venta #' . $sale->id)

@section('content')

<div class="max-w-lg space-y-6">
    <div class="grid grid-cols-2 gap-4 text-sm">
        <div>
            <p class="label">Fecha</p>
            <p>{{ $sale->sold_at->format('d/m/Y H:i') }}</p>
        </div>
        <div>
            <p class="label">Registrado por</p>
            <p>{{ $sale->user->name ?? 'Mostrador' }}</p>
        </div>
        @if($sale->notes)
        <div class="col-span-2">
            <p class="label">Notas</p>
            <p>{{ $sale->notes }}</p>
        </div>
        @endif
    </div>

    <div class="border border-mist">
        <table class="w-full text-sm">
            <thead class="bg-steel text-paper">
                <tr>
                    <th class="px-4 py-3 text-left font-medium">Producto</th>
                    <th class="px-4 py-3 text-right font-medium">Qty</th>
                    <th class="px-4 py-3 text-right font-medium">Unitario</th>
                    <th class="px-4 py-3 text-right font-medium">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sale->items as $item)
                <tr class="border-t border-mist">
                    <td class="px-4 py-3">{{ $item->product->name }}</td>
                    <td class="px-4 py-3 text-right">{{ $item->quantity }}</td>
                    <td class="px-4 py-3 text-right">RD${{ number_format($item->unit_price, 2) }}</td>
                    <td class="px-4 py-3 text-right font-medium">RD${{ number_format($item->subtotal, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="border-t-2 border-ink">
                    <td colspan="3" class="px-4 py-3 text-right font-medium">TOTAL</td>
                    <td class="px-4 py-3 text-right font-display text-xl">RD${{ number_format($sale->total, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <a href="{{ route('admin.sales.index') }}" class="btn-ghost inline-flex">← Volver</a>
</div>

@endsection
