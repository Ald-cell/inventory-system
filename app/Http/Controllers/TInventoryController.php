<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\TInventory;
use App\Models\MItem;

class TInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pdf($id)
{
    $inventory = TInventory::with('item')
        ->findOrFail($id);

    $pdf = Pdf::loadView(
        'inventories.pdf',
        compact('inventory')
    );

    return $pdf->download(
        'Inventory_'.$inventory->inventory_id.'.pdf'
    );
}

    public function index(Request $request)
{
    $inventories = TInventory::with('item');

    if ($request->search) {

        $inventories->whereHas(
            'item',
            function ($query) use ($request) {

                $query->where(
                    'item_name',
                    'like',
                    '%' . $request->search . '%'
                );
            }
        );

    }

    $inventories = $inventories->get();

    return view(
        'inventories.index',
        compact('inventories')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $items = MItem::all();

    return view(
        'inventories.create',
        compact('items')
    );
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $foto = null;

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto')
                        ->store('inventories', 'public');
    }

    TInventory::create([
        'quantity'      => $request->quantity,
        'price'         => $request->price,
        'specification' => $request->specification,
        'status'        => $request->status,
        'merk'          => $request->merk,
        'barcode'       => $request->barcode,
        'item_id'       => $request->item_id,
        'foto'          => $foto
    ]);

    return redirect()->route('inventories.index');
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
        $inventory = TInventory::findOrFail($id);
        $items = MItem::all();

        return view(
            'inventories.edit',
            compact('inventory', 'items')
        );
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, string $id)
    {
        $inventory = TInventory::findOrFail($id);

        $inventory->update([
            'quantity'      => $request->quantity,
            'price'         => $request->price,
            'specification' => $request->specification,
            'status'        => $request->status,
            'merk'          => $request->merk,
            'barcode'       => $request->barcode,
            'item_id'       => $request->item_id
        ]);

        return redirect()->route('inventories.index');
    }
public function detail($id)
{
    $inventory = TInventory::with('item')
                    ->findOrFail($id);

    return view(
        'inventories.detail',
        compact('inventory')
    );
}
    /**
     * Remove the specified resource.
     */
    public function destroy(string $id)
    {
        $inventory = TInventory::findOrFail($id);

        $inventory->delete();

        return redirect()->route('inventories.index');
    }
}