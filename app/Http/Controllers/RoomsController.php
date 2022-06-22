<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Room;
use App\Models\User;
use Faker\Provider\ar_EG\Internet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = User::find(auth()->user()->id)->rooms;
        return Inertia::render('Rooms/Index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Rooms/Create');
    }

    public static function handleValidation(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:2', 'max:50', 'string']
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
        RoomsController::handleValidation($request);
        $room = Room::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id
        ]);
        $roomName = $room->name;
        return redirect(route("rooms.index"))
            ->with("success", "Room ($roomName) was successfully created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);
        $userId = auth()->user()->id;
        $plants = User::find($userId)
            ->plants()
            ->where('room_id', '=', $room->id)
            ->with('plantImages')
            ->get();
        return Inertia::render('Rooms/Show', compact('plants', 'room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return Inertia::render("Rooms/Edit", compact('room'));
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
        RoomsController::handleValidation($request);
        $room = Room::findOrFail($id);
        $room->update([
            'name' => $request->name,
        ]);
        $roomName = $room->name;
        return redirect('/rooms')
            ->with("success", "Room ($roomName) was successfully edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('plants')->where('room_id', $id)->update(['room_id' => null]);
        $room = Room::findOrFail($id);
        $roomName = $room->name;
        $room->delete();
        return redirect("/rooms")
            ->with("success", "Room ($roomName) was successfully deleted");
    }
}
