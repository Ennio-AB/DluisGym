@extends('layouts.admin')
@section('title', 'Membresías')

@section('actions')
    <a href="{{ route('admin.memberships.create') }}" class="btn-primary">+ Nueva</a>
@endsection

@section('content')

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
    @forelse($memberships as $m)
    <div class="card p-6 flex flex-col anim-1">
        <div class="flex items-start justify-between mb-4">
            <div>
                <h3 class="font-display text-2xl tracking-wide">{{ strtoupper($m->name) }}</h3>
                <p class="text-ash text-xs mt-1">{{ $m->duration_days }} días</p>
            </div>
            @if($m->is_active)
                <span class="badge-green">Activo</span>
            @else
                <span class="badge badge-red">Inactivo</span>
            @endif
        </div>
        <p class="font-display text-3xl mb-4">${{ number_format($m->price, 2) }}</p>
        @if($m->description)
            <p class="text-sm text-ash mb-4 leading-relaxed flex-1">{{ $m->description }}</p>
        @endif
        <a href="{{ route('admin.memberships.edit', $m) }}" class="btn-ghost text-xs mt-auto">Editar</a>
    </div>
    @empty
        <p class="text-ash col-span-3">No hay membresías aún.</p>
    @endforelse
</div>

<div class="mt-4">{{ $memberships->links() }}</div>

@endsection
