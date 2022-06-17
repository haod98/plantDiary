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
        $plants = User::find($userId)->plants;
        $plants = DB::table('plant_images')
            ->rightJoin('plants', 'plant_images.plant_id', '=', 'plants.id')
            ->where('user_id', '=', $userId)
            ->get();
        return Inertia::render('Dashboard', compact('plants'));
    }
}
