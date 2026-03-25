<?php

namespace App\Http\Controllers;

use App\Models\Membership;

class PublicMembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::where('is_active', true)->get();

        return view('public.memberships', compact('memberships'));
    }
}
