@extends('layouts.admin')
@section('title', 'Nueva Membresía')

@section('content')

<form method="POST" action="{{ route('admin.memberships.store') }}" class="max-w-lg space-y-5">
    @csrf

    <div>
        <label class="label">Nombre</label>
        <input name="name" type="text" class="input" value="{{ old('name') }}" required>
        @error('name')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="label">Descripción</label>
        <textarea name="description" class="input" rows="3">{{ old('description') }}</textarea>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="label">Precio</label>
            <input name="price" type="number" step="0.01" min="0" class="input" value="{{ old('price') }}" required>
        </div>
        <div>
            <label class="label">Duración (días)</label>
            <input name="duration_days" type="number" min="1" class="input" value="{{ old('duration_days', 30) }}" required>
        </div>
    </div>

    <div>
        <label class="label">Beneficios (uno por línea)</label>
        <textarea name="features_text" class="input" rows="5" placeholder="Acceso al área de pesas&#10;Clases grupales&#10;Casillero incluido">{{ old('features_text') }}</textarea>
        <p class="text-xs text-ash mt-1">Escribe cada beneficio en una línea separada.</p>
    </div>

    <div class="flex items-center gap-2">
        <input name="is_active" type="checkbox" id="active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
        <label for="active" class="text-sm">Activa</label>
    </div>

    <div class="flex gap-3 pt-4">
        <button type="submit" class="btn-primary">Guardar</button>
        <a href="{{ route('admin.memberships.index') }}" class="btn-ghost">Cancelar</a>
    </div>
</form>

@endsection
