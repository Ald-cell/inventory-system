<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MBuilding;
class MBuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index()
{
    $buildings = MBuilding::all();

    return view(
        'buildings.index',
        compact('buildings')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('buildings.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    MBuilding::create([
        'building_name' => $request->building_name
    ]);

    return redirect()->route('buildings.index');
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
    $building = MBuilding::findOrFail($id);

    return view('buildings.edit', compact('building'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'building_name' => 'required'
    ]);

    $building = MBuilding::findOrFail($id);

    $building->update([
        'building_name' => $request->building_name
    ]);

    return redirect()->route('buildings.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $building = MBuilding::findOrFail($id);

    $building->delete();

    return redirect()->route('buildings.index');
}
}
