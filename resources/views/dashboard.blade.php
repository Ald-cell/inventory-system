@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">

    <div class="row mb-3">

        <div class="col-md-3">

            <a href="{{ route('items.index') }}"
   class="text-decoration-none">

    <div class="card stat-card bg-primary text-white">

        <div class="card-body text-center">

            <p class="mb-1 opacity-75">
    Total Barang
</p>

<h1 class="fw-bold display-4">
    {{ $totalBarang }}
</h1>

        </div>

    </div>

</a>

        </div>

        <div class="col-md-3">

            <a href="{{ route('inventories.index') }}"
   class="text-decoration-none">

    <div class="card stat-card bg-success text-white">

        <div class="card-body text-center">

            <p class="mb-1 opacity-75">
    Total Quantity
</p>

<h1 class="fw-bold display-4">
    {{ $totalInventory }}
</h1>

        </div>

    </div>

</a>

        </div>

        <div class="col-md-3">

            <a href="{{ route('inventories.index',['status'=>'Active']) }}"
   class="text-decoration-none">

    <div class="card stat-card bg-info text-white">

        <div class="card-body text-center">

            <p class="mb-1 opacity-75">
    Barang Aktif
</p>

<h1 class="fw-bold display-4">
    {{ $barangAktif }}
</h1>

        </div>

    </div>

</a>

        </div>

        <div class="col-md-3">

            <a href="{{ route('inventories.index',['status'=>'Inactive']) }}"
   class="text-decoration-none">

    <div class="card stat-card bg-danger text-white">

        <div class="card-body text-center">

            <p class="mb-1 opacity-75">
    Barang Nonaktif
</p>

<h1 class="fw-bold mb-0"
    style="font-size:52px;">
    {{ $barangNonaktif }}
</h1>

        </div>

    </div>

</a>

        </div>

    </div>

    <div class="row">

        <!-- Grafik -->
        <div class="col-md-3">

            <div class="card shadow">

                <div class="card-header bg-dark text-white">

                    Statistik Inventory

                </div>

                <div class="card-body d-flex justify-content-center align-items-center">

                    <div style="width:200px;height:200px;">

                        <canvas id="inventoryChart"></canvas>

                    </div>

                </div>

            </div>

        </div>

        <!-- Menu Sistem -->
        <div class="col-md-9">

            <div class="card shadow">

                <div class="card-header bg-dark text-white">

                    Menu Sistem

                </div>

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-md-4">

                            <a href="{{ route('items.index') }}"
   class="btn btn-primary w-100 p-3">

    <i class="bi bi-box-seam me-2"></i>
    Data Barang

</a>

                        </div>

                        <div class="col-md-4">

                            <a href="{{ route('item-types.index') }}"
   class="btn btn-success w-100 p-3">

    <i class="bi bi-tag-fill me-2"></i>
    Jenis Barang

</a>

                        </div>

                        <div class="col-md-4">

                            <a href="{{ route('buildings.index') }}"
   class="btn btn-warning w-100 p-3">

    <i class="bi bi-building me-2"></i>
    Gedung

</a>

                        </div>

                        <div class="col-md-4">

                            <a href="{{ route('rooms.index') }}"
   class="btn btn-info w-100 p-3">

    <i class="bi bi-door-open me-2"></i>
    Ruangan

</a>

                        </div>

                        <div class="col-md-4">

                            <a href="{{ route('inventories.index') }}"
   class="btn btn-danger w-100 p-3">

    <i class="bi bi-clipboard-data me-2"></i>
    Inventory

</a>

                        </div>

                        <div class="col-md-4">

                            <a href="{{ route('inventory-rooms.index') }}"
   class="btn btn-secondary w-100 p-3">

    <i class="bi bi-geo-alt-fill me-2"></i>
    Penempatan Barang

</a>

                        </div>

                        <div class="col-md-4">

                            <a href="{{ route('inventory-transactions.index') }}"
   class="btn btn-dark w-100 p-3">

    <i class="bi bi-arrow-repeat me-2"></i>
    Transaksi Inventory

</a>

                        </div>

                        @if(auth()->user()->role == 'Admin')

<div class="col-md-4">

    <a href="{{ route('users.index') }}"
       class="btn btn-secondary w-100 p-3">

        <i class="bi bi-people-fill me-2"></i>
        Manajemen User

    </a>

</div>

@endif

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow mt-2">

    <div class="card-header bg-dark text-white">

        Informasi Sistem

    </div>

    <div class="card-body py-1 px-2">

        <marquee
            behavior="scroll"
            direction="left"
            scrollamount="6">

            Sistem Informasi Inventory Asset digunakan untuk mengelola Data Barang, Inventory, Jenis Barang, Gedung, Ruangan, Penempatan Barang, Transaksi Inventory dan Manajemen User secara real-time.

        </marquee>

    </div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(
    document.getElementById('inventoryChart'),
    {
        type: 'doughnut',

        data: {

            labels: [
                'Total Barang',
                'Aktif',
                'Nonaktif'
            ],

            datasets: [{

                data: [
                    {{ $totalBarang }},
                    {{ $barangAktif }},
                    {{ $barangNonaktif }}
                ]

            }]
        },

        options: {

            cutout:'70%',

            responsive:true,

            maintainAspectRatio:false,

            plugins:{

                legend:{
                    position:'top'
                }

            }

        }

    }
);

</script>

@endsection