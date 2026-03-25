@extends('layouts.admin')
@section('title', 'Editar Producto')

@section('content')

<form method="POST" action="{{ route('admin.products.update', $product) }}" class="max-w-lg space-y-5">
    @csrf
    @method('PATCH')

    <div>
        <label class="label">Nombre</label>
        <input name="name" type="text" class="input" value="{{ old('name', $product->name) }}" required>
        @error('name')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="label">Categoría</label>
            <input name="category" type="text" class="input" value="{{ old('category', $product->category) }}" required>
        </div>
        <div>
            <label class="label">Descripción</label>
            <input name="description" type="text" class="input" value="{{ old('description', $product->description) }}">
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="label">Precio de Venta</label>
            <input name="sale_price" type="number" step="0.01" min="0" class="input" value="{{ old('sale_price', $product->sale_price) }}" required>
        </div>
        <div>
            <label class="label">Costo</label>
            <input name="cost_price" type="number" step="0.01" min="0" class="input" value="{{ old('cost_price', $product->cost_price) }}" required>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="label">Stock</label>
            <input name="stock" type="number" min="0" class="input" value="{{ old('stock', $product->stock) }}" required>
        </div>
        <div>
            <label class="label">Stock mínimo</label>
            <input name="min_stock" type="number" min="0" class="input" value="{{ old('min_stock', $product->min_stock) }}" required>
        </div>
    </div>

    <div class="flex items-center gap-2">
        <input name="is_active" type="checkbox" id="active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
        <label for="active" class="text-sm">Activo</label>
    </div>

    <div class="flex gap-3 pt-4 items-center justify-between">
        <div class="flex gap-3">
            <button type="submit" class="btn-primary">Actualizar</button>
            <a href="{{ route('admin.products.index') }}" class="btn-ghost">Cancelar</a>
        </div>
        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('¿Eliminar este producto?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">Eliminar</button>
        </form>
    </div>
</form>

@endsection
