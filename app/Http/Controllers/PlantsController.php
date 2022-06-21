<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\PlantImage;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use SebastianBergmann\GlobalState\Restorer;
use Symfony\Component\VarDumper\VarDumper;

class PlantsController extends Controller
{
    const SNOOZE_DAYS = 2;
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $plants = User::find($userId)
            ->plants()
            ->with('plantImages')
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

    public static function handleImageUpload(Request $request, Plant $plant)
    {
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['image', 'mimes:jpeg,jpg,png', 'max:10240']
            ]);
            PlantImage::create([
                'image_path' => $request->file('image')->store('plantsImage', 'public'),
                'plant_id' => $plant->id
            ]);
        }
    }

    public static function handleValidation(Request $request)
    {
        $request->validate([
            'plantName' => ['required', 'min:3', 'max:100', 'string'],
            'description' => ['max:255', 'nullable'],
            'daysToWater' => ['integer', 'nullable'],
            'waterCount' => ['integer', 'digits_between:0,3', 'nullable'],
            'sun' => ['digits_between:0,3', 'nullable'],
        ]);
    }

    public function castWater(Request $request)
    {
        $id = $request->id;
        $plant = Plant::findOrFail($id);
        $daysToAdd = $plant->days_to_water;
        $nextTimeToWater = Carbon::now()->addDays($daysToAdd);
        $plant->update([
            'next_water' => $nextTimeToWater
        ]);
    }

    public function snoozeWater(Request $request)
    {
        $id = $request->id;
        $plant = Plant::findOrFail($id);
        $nextTimeToWater = Carbon::parse($plant->next_water)->addDays(self::SNOOZE_DAYS);
        $plant->update([
            'next_water' => $nextTimeToWater
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PlantsController::handleValidation($request);
        $plant = Plant::create([
            'name' => $request->plantName,
            'description' => $request->description,
            'days_to_water' => $request->daysToWater,
            'water_count' => $request->waterCount,
            'sun' => $request->sun,
            'user_id' => auth()->user()->id,
            'room_id' => $request->roomId,
            'next_water' => $request->daysToWater ? Carbon::now()->addDays($request->daysToWater) : null
        ]);

        $plantName = $plant->name;

        PlantsController::handleImageUpload($request, $plant);
        return redirect("dashboard")
            ->with("success", "Plant ($plantName) was successfully created");
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
        $images = DB::table('plant_images')
            ->where('plant_id', '=', $plant->id)
            ->get();
        if ($plant->user_id !== $userId) abort(403);

        return Inertia::render('Plants/PlantsForm', compact('plant', 'rooms', 'images'));
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

        PlantsController::handleValidation($request);
        $plant->update([
            'name' => $request->plantName,
            'description' => $request->description,
            'days_to_water' => $request->daysToWater,
            'water_count' => $request->waterCount,
            'sun' => $request->sun,
            'room_id' => $request->roomId,
            'next_water' => $request->daysToWater ? Carbon::now()->addDays($request->daysToWater) : null
        ]);
        $plantName = $plant->name;
        PlantsController::handleImageUpload($request, $plant);
        return redirect('/dashboard')
            ->with("success", "Plant ($plantName) was successfully edited");
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
        $plantName = $plant->name;
        $plant->delete();
        return redirect("/dashboard")
            ->with("success", "Plant ($plantName) was successfully deleted");
    }
}
