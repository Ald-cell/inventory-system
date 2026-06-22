<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MItem;
use App\Models\MItemType;

class MItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $items = MItem::with('itemType')->get();

    return view('items.index', compact('items'));
}

public function create()
{
    $itemTypes = MItemType::all();

    return view('items.create', compact('itemTypes'));
}

public function store(Request $request)
{
    MItem::create([
        'item_name'    => $request->item_name,
        'unit'         => $request->unit,
        'item_type_id' => $request->item_type_id
    ]);

    return redirect()->route('items.index');
}

public function show(string $id)
{
    //
}

public function edit(string $id)
{
    //
}

public function update(Request $request, string $id)
{
    //
}

public function destroy(string $id)
{
    //
}
}
