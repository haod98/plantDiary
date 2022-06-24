<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class LocalShopController extends Controller
{
    public function index()
    {
        // dd(config('GOOGLE_MAPS_API'));
        // Inertia::share('test', config('app.name'));
        // dd($share);

        return Inertia::render('LocalShop/Index');
    }
}
