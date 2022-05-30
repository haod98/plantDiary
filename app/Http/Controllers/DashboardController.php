<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $plants = User::find(auth()->user()->id)->plants;
        return Inertia::render('Dashboard', compact('plants'));
    }
}
