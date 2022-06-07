<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Symfony\Component\VarDumper\VarDumper;

class PlantsController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants = User::find(auth()->user()->id)->plants;
        return Inertia::render('Dashboard', compact('plants'));
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
        if ($plant->user_id !== $userId) abort(403);

        return Inertia::render('Plants/PlantsForm', compact('plant'));
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
