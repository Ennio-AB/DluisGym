@extends('layouts.admin')
@section('title', 'Nueva Venta')

@section('content')

<form method="POST" action="{{ route('admin.sales.store') }}" class="max-w-2xl space-y-6" id="sale-form">
    @csrf

    <div>
        <label class="label">Notas (opcional)</label>
        <input name="notes" type="text" class="input" value="{{ old('notes') }}" placeholder="Ej: venta al mostrador">
    </div>

    <div>
        <div class="flex items-center justify-between mb-3">
            <label class="label mb-0">Productos</label>
            <button type="button" id="add-item" class="btn-ghost text-xs px-3 py-1.5">+ Agregar producto</button>
        </div>

        <div id="items" class="space-y-3">
            <div class="item-row grid grid-cols-12 gap-3 items-end">
                <div class="col-span-7">
                    <label class="label">Producto</label>
                    <select name="items[0][product_id]" class="input">
                        <option value="">— Seleccionar —</option>
                        @foreach($products as $p)
                            <option value="{{ $p->id }}">{{ $p->name }} — ${{ number_format($p->sale_price, 2) }} (stock: {{ $p->stock }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-3">
                    <label class="label">Cantidad</label>
                    <input name="items[0][quantity]" type="number" min="1" value="1" class="input">
                </div>
                <div class="col-span-2">
                    <button type="button" class="btn-ghost w-full text-xs remove-item">✕</button>
                </div>
            </div>
        </div>

        @error('items')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="flex gap-3 pt-4">
        <button type="submit" class="btn-primary">Registrar Venta</button>
        <a href="{{ route('admin.sales.index') }}" class="btn-ghost">Cancelar</a>
    </div>
</form>

<script>
const products = @json($products->map(fn($p) => ['id' => $p->id, 'name' => $p->name, 'price' => $p->sale_price, 'stock' => $p->stock]));
let idx = 1;

function buildOptions() {
    return `<option value="">— Seleccionar —</option>` +
        products.map(p => `<option value="${p.id}">${p.name} — $${parseFloat(p.price).toFixed(2)} (stock: ${p.stock})</option>`).join('');
}

document.getElementById('add-item').addEventListener('click', () => {
    const row = document.createElement('div');
    row.className = 'item-row grid grid-cols-12 gap-3 items-end';
    row.innerHTML = `
        <div class="col-span-7">
            <select name="items[${idx}][product_id]" class="input">${buildOptions()}</select>
        </div>
        <div class="col-span-3">
            <input name="items[${idx}][quantity]" type="number" min="1" value="1" class="input">
        </div>
        <div class="col-span-2">
            <button type="button" class="btn-ghost w-full text-xs remove-item">✕</button>
        </div>`;
    document.getElementById('items').appendChild(row);
    idx++;
});

document.getElementById('items').addEventListener('click', e => {
    if (e.target.classList.contains('remove-item')) {
        const rows = document.querySelectorAll('.item-row');
        if (rows.length > 1) e.target.closest('.item-row').remove();
    }
});
</script>

@endsection
