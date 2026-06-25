@extends('layouts.app')

@section('title','Penempatan Barang')

@section('content')

<div class="row mb-4">

    <div class="col-md-4">

        <div class="card stat-card">

            <div class="card-body">

                <small class="text-muted">
                    Total Penempatan
                </small>

                <h2 class="mb-0">
                    {{ $inventoryRooms->count() }}
                </h2>

            </div>

        </div>

    </div>

</div>

<div class="card content-card">

    <div class="card-header d-flex justify-content-between align-items-center">

    <h5 class="mb-0">

        <i class="bi bi-geo-alt-fill"></i>

        Data Penempatan Barang

    </h5>

    <a href="{{ route('inventory-rooms.create') }}"
       class="btn btn-success">

        <i class="bi bi-plus-circle"></i>

        Tambah Penempatan

    </a>

</div>

<div class="card-body">

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Inventory</th>
                    <th>Ruangan</th>
                    <th width="150">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($inventoryRooms as $inventoryRoom)

                <tr>

                    <td>
                        {{ $inventoryRoom->inventory_room_id }}
                    </td>

                    <td>

                        <span class="fw-semibold">

                            {{ $inventoryRoom->inventory->item->item_name ?? '-' }}

                        </span>

                    </td>

                    <td>

                        <span class="badge bg-primary">

                            {{ $inventoryRoom->room->room_name ?? '-' }}

                        </span>

                    </td>

                    <td>

                        <a href="{{ route('inventory-rooms.edit',$inventoryRoom->inventory_room_id) }}"
                           class="btn btn-warning btn-sm"
                           title="Edit">

                            <i class="bi bi-pencil"></i>

                        </a>

                        <form action="{{ route('inventory-rooms.destroy',$inventoryRoom->inventory_room_id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                title="Hapus"
                                onclick="return confirm('Yakin hapus data?')">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center">

                        Tidak ada data penempatan barang

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
