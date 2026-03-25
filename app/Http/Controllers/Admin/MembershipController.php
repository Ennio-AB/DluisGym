<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMembershipRequest;
use App\Models\Membership;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::orderBy('price')->paginate(15);

        return view('admin.memberships.index', compact('memberships'));
    }

    public function create()
    {
        return view('admin.memberships.create');
    }

    public function store(StoreMembershipRequest $request)
    {
        Membership::create($request->validated());

        return redirect()->route('admin.memberships.index')
            ->with('success', 'Membresía creada.');
    }

    public function show(Membership $membership)
    {
        return view('admin.memberships.show', compact('membership'));
    }

    public function edit(Membership $membership)
    {
        return view('admin.memberships.edit', compact('membership'));
    }

    public function update(StoreMembershipRequest $request, Membership $membership)
    {
        $membership->update($request->validated());

        return redirect()->route('admin.memberships.index')
            ->with('success', 'Membresía actualizada.');
    }

    public function destroy(Membership $membership)
    {
        $membership->delete();

        return redirect()->route('admin.memberships.index')
            ->with('success', 'Membresía eliminada.');
    }
}
