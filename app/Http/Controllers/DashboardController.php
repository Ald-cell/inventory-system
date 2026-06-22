<?php

namespace App\Http\Controllers;

use App\Models\MItem;
use App\Models\TInventory;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = MItem::count();

        $totalInventory = TInventory::sum('quantity');

        $barangAktif = TInventory::where(
            'status',
            'Active'
        )->count();

        $barangNonaktif = TInventory::where(
            'status',
            'Inactive'
        )->count();

        return view(
            'dashboard',
            compact(
                'totalBarang',
                'totalInventory',
                'barangAktif',
                'barangNonaktif'
            )
        );
    }
}