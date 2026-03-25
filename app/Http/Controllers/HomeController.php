<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.home');
    }

    public function location()
    {
        return view('public.location');
    }
}
