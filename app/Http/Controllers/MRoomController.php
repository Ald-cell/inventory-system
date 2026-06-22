<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MRoom;
use App\Models\MBuilding;

class MRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $rooms = MRoom::with('building')->get();

    return view(
        'rooms.index',
        compact('rooms')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $buildings = MBuilding::all();

    return view(
        'rooms.create',
        compact('buildings')
    );
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    MRoom::create([
        'room_name'   => $request->room_name,
        'floor'       => $request->floor,
        'building_id' => $request->building_id
    ]);

    return redirect()->route('rooms.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $room = MRoom::findOrFail($id);

    $buildings = MBuilding::all();

    return view(
        'rooms.edit',
        compact('room', 'buildings')
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $room = MRoom::findOrFail($id);

    $room->update([
        'room_name' => $request->room_name,
        'floor' => $request->floor,
        'building_id' => $request->building_id
    ]);

    return redirect()->route('rooms.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $room = MRoom::findOrFail($id);

    $room->delete();

    return redirect()
        ->route('rooms.index');
}
}
