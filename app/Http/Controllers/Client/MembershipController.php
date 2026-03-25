<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Membership;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::where('is_active', true)->orderBy('price')->get();

        return view('client.memberships.index', compact('memberships'));
    }
}
