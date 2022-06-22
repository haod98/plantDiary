<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\PlantImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);

        $plants = $user
            ->plants()
            ->with('plantImages')
            ->get();
        $isCollapsed = $user->select('collapse_plant')->where('id', $userId)->get();
        return Inertia::render('Dashboard', compact('plants', 'isCollapsed'));
    }
}
