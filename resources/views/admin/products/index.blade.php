@extends('layouts.admin')
@section('title', 'Productos')

@section('actions')
    <a href="{{ route('admin.products.create') }}" class="btn-primary">+ Nuevo</a>
@endsection

@section('content')

<div class="border border-mist">
    <table class="w-full text-sm">
        <thead class="bg-steel text-paper">
            <tr>
                <th class="px-4 py-3 text-left font-medium">Nombre</th>
                <th class="px-4 py-3 text-left font-medium hidden sm:table-cell">Categoría</th>
                <th class="px-4 py-3 text-right font-medium">Venta</th>
                <th class="px-4 py-3 text-right font-medium hidden md:table-cell">Costo</th>
                <th class="px-4 py-3 text-right font-medium">Stock</th>
                <th class="px-4 py-3 text-center font-medium">Estado</th>
                <th class="px-4 py-3"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $p)
            <tr class="border-t border-mist hover:bg-mist/30 transition-colors">
                <td class="px-4 py-3 font-medium">{{ $p->name }}</td>
                <td class="px-4 py-3 text-ash hidden sm:table-cell">{{ $p->category }}</td>
                <td class="px-4 py-3 text-right">RD${{ number_format($p->sale_price, 2) }}</td>
                <td class="px-4 py-3 text-right text-ash hidden md:table-cell">RD${{ number_format($p->cost_price, 2) }}</td>
                <td class="px-4 py-3 text-right {{ $p->isLowStock() ? 'text-red-600 font-medium' : '' }}">
                    {{ $p->stock }}
                </td>
                <td class="px-4 py-3 text-center">
                    @if($p->is_active)
                        <span class="badge-green">Activo</span>
                    @else
                        <span class="badge badge-red">Inactivo</span>
                    @endif
                </td>
                <td class="px-4 py-3 text-right">
                    <a href="{{ route('admin.products.edit', $p) }}" class="text-ash hover:text-ink text-xs underline">Editar</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-4 py-8 text-center text-ash">No hay productos aún.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $products->links() }}</div>

@endsection
