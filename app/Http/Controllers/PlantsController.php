<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\PlantImage;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Symfony\Component\VarDumper\VarDumper;

class PlantsController extends Controller
{
    const BASE_PATH_TO_PLANTS_IMG = "/storage/plantImage/";
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function loadImage(Request $request)
    {
        $image = $request->image;
        $content = Storage::disk('public')->get($image);
        return response($content, 200, [
            'Content-type' => 'image/jpg'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = User::find(auth()->user()->id)->rooms;
        return Inertia::render('Plants/PlantsForm', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Plant::create([
            'name' => $request->plantName,
            'description' => $request->description,
            'days_to_water' => $request->daysToWater,
            'water_count' => $request->waterCount,
            'sun' => $request->sun,
            'user_id' => auth()->user()->id,
            'room_id' => $request->roomId,
        ]);

        if ($request->hasFile('image')) {
            PlantImage::create([
                'image_path' => $request->file('image')->store('plantsImage', 'public'),
                'plant_id' => Plant::latest('id')->value('id')
            ]);
        }
        return redirect("dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = auth()->user()->id;
        $plant = Plant::findOrFail($id);
        $rooms = User::findOrFail($userId)->rooms;
        if ($plant->user_id !== $userId) abort(403);

        return Inertia::render('Plants/PlantsForm', compact('plant', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userId = auth()->user()->id;
        $plant = Plant::findOrFail($id);
        if ($plant->user_id !== $userId) abort(403);

        $plant->update([
            'name' => $request->plantName,
            'description' => $request->description,
            'days_to_water' => $request->daysToWater,
            'water_count' => $request->waterCount,
            'sun' => $request->sun,
            'room_id' => $request->roomId
        ]);
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plant = Plant::findOrFail($id);
        $plant->delete();
        return redirect("/dashboard");
    }
}
