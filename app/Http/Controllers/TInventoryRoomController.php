<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TInventoryRoom;
use App\Models\TInventory;
use App\Models\MRoom;

class TInventoryRoomController extends Controller
{
    public function index()
    {
        $inventoryRooms = TInventoryRoom::with([
            'inventory.item',
            'room'
        ])->get();

        return view(
            'inventory-rooms.index',
            compact('inventoryRooms')
        );
    }

    public function create()
    {
        $inventories = TInventory::with('item')->get();

        $rooms = MRoom::all();

        return view(
            'inventory-rooms.create',
            compact(
                'inventories',
                'rooms'
            )
        );
    }

    public function store(Request $request)
    {
        TInventoryRoom::create([
            'inventory_id'   => $request->inventory_id,
            'room_id'        => $request->room_id,
            'inventory_date' => $request->inventory_date,
            'status'         => $request->status,
        ]);

        return redirect()->route('inventory-rooms.index');
    }

    public function edit(string $id)
    {
        $inventoryRoom = TInventoryRoom::findOrFail($id);

        $inventories = TInventory::with('item')->get();

        $rooms = MRoom::all();

        return view(
            'inventory-rooms.edit',
            compact(
                'inventoryRoom',
                'inventories',
                'rooms'
            )
        );
    }

    public function update(Request $request, string $id)
    {
        $inventoryRoom = TInventoryRoom::findOrFail($id);

        $inventoryRoom->update([
            'inventory_id'   => $request->inventory_id,
            'room_id'        => $request->room_id,
            'inventory_date' => $request->inventory_date,
            'status'         => $request->status,
        ]);

        return redirect()->route('inventory-rooms.index');
    }

    public function destroy(string $id)
    {
        $inventoryRoom = TInventoryRoom::findOrFail($id);

        $inventoryRoom->delete();

        return redirect()->route('inventory-rooms.index');
    }
}