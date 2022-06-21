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
        $plants = User::find($userId)
            ->plants()
            ->with('plantImages')
            ->get();
        // $plants = DB::table('plants')
        //     // ->rightJoin('plants', 'plant_images.plant_id', '=', 'plants.id')
        //     ->where('user_id', '=', $userId)
        //     ->leftJoin('plant_images', 'plants.id', '=', 'plant_images.plant_id')
        //     ->get();
        // $Plants = Plant
        // $image = $plants->map(function ($plant) {
        //     return $plant->plantImage;
        // });
        // dd($plants->toArray());
        return Inertia::render('Dashboard', compact('plants'));
    }
}
