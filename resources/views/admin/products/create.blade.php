@extends('layouts.admin')
@section('title', 'Nuevo Producto')

@section('content')

<form method="POST" action="{{ route('admin.products.store') }}" class="max-w-lg space-y-5">
    @csrf

    <div>
        <label class="label">Nombre</label>
        <input name="name" type="text" class="input" value="{{ old('name') }}" required>
        @error('name')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="label">Categoría</label>
            <input name="category" type="text" class="input" value="{{ old('category') }}" required>
        </div>
        <div>
            <label class="label">Descripción</label>
            <input name="description" type="text" class="input" value="{{ old('description') }}">
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="label">Precio de Venta</label>
            <input name="sale_price" type="number" step="0.01" min="0" class="input" value="{{ old('sale_price') }}" required>
        </div>
        <div>
            <label class="label">Costo</label>
            <input name="cost_price" type="number" step="0.01" min="0" class="input" value="{{ old('cost_price') }}" required>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="label">Stock inicial</label>
            <input name="stock" type="number" min="0" class="input" value="{{ old('stock', 0) }}" required>
        </div>
        <div>
            <label class="label">Stock mínimo</label>
            <input name="min_stock" type="number" min="0" class="input" value="{{ old('min_stock', 5) }}" required>
        </div>
    </div>

    <div class="flex items-center gap-2">
        <input name="is_active" type="checkbox" id="active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
        <label for="active" class="text-sm">Activo</label>
    </div>

    <div class="flex gap-3 pt-4">
        <button type="submit" class="btn-primary">Guardar</button>
        <a href="{{ route('admin.products.index') }}" class="btn-ghost">Cancelar</a>
    </div>
</form>

@endsection
