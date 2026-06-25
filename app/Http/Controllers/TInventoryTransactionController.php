<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TInventoryTransaction;

class TInventoryTransactionController extends Controller
{
    public function index()
    {
        $transactions =
            TInventoryTransaction::all();

        return view(
            'inventory-transactions.index',
            compact('transactions')
        );
    }

    public function create()
    {
        return view(
            'inventory-transactions.create'
        );
    }

    public function store(Request $request)
{
    TInventoryTransaction::create([
        'transaction_number'  => $request->transaction_number,
        'transaction_date'    => $request->transaction_date,
        'status'              => $request->status,
        'transaction_type_id' => 1
    ]);

    return redirect()
            ->route('inventory-transactions.index');
}
}