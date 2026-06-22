<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MItemType;

class MItemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $itemTypes = MItemType::all();

    return view(
        'item-types.index',
        compact('itemTypes')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('item-types.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    MItemType::create([
        'item_type_name' => $request->item_type_name,
        'description' => $request->description,
        'foundation_id' => $request->foundation_id
    ]);

    return redirect()
        ->route('item-types.index');
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
    $item = MItem::findOrFail($id);

    $itemTypes = MItemType::all();

    return view(
        'items.edit',
        compact(
            'item',
            'itemTypes'
        )
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(
    Request $request,
    string $id
)
{
    $item = MItem::findOrFail($id);

    $item->update([
        'item_name'    => $request->item_name,
        'unit'         => $request->unit,
        'item_type_id' => $request->item_type_id
    ]);

    return redirect()
        ->route('items.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $item = MItem::findOrFail($id);

    $item->delete();

    return redirect()
        ->route('items.index');
}
}
