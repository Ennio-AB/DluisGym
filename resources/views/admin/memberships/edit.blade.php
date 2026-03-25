@extends('layouts.admin')
@section('title', 'Editar Membresía')

@section('content')

<form method="POST" action="{{ route('admin.memberships.update', $membership) }}" class="max-w-lg space-y-5">
    @csrf
    @method('PATCH')

    <div>
        <label class="label">Nombre</label>
        <input name="name" type="text" class="input" value="{{ old('name', $membership->name) }}" required>
    </div>

    <div>
        <label class="label">Descripción</label>
        <textarea name="description" class="input" rows="3">{{ old('description', $membership->description) }}</textarea>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="label">Precio</label>
            <input name="price" type="number" step="0.01" min="0" class="input" value="{{ old('price', $membership->price) }}" required>
        </div>
        <div>
            <label class="label">Duración (días)</label>
            <input name="duration_days" type="number" min="1" class="input" value="{{ old('duration_days', $membership->duration_days) }}" required>
        </div>
    </div>

    <div>
        <label class="label">Beneficios (uno por línea)</label>
        <textarea name="features_text" class="input" rows="5">{{ old('features_text', $membership->features ? implode("\n", $membership->features) : '') }}</textarea>
    </div>

    <div class="flex items-center gap-2">
        <input name="is_active" type="checkbox" id="active" value="1" {{ old('is_active', $membership->is_active) ? 'checked' : '' }}>
        <label for="active" class="text-sm">Activa</label>
    </div>

    <div class="flex gap-3 pt-4 items-center justify-between">
        <div class="flex gap-3">
            <button type="submit" class="btn-primary">Actualizar</button>
            <a href="{{ route('admin.memberships.index') }}" class="btn-ghost">Cancelar</a>
        </div>
        <form method="POST" action="{{ route('admin.memberships.destroy', $membership) }}" onsubmit="return confirm('¿Eliminar esta membresía?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">Eliminar</button>
        </form>
    </div>
</form>

@endsection
