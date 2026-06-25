@extends('layouts.app')

@section('content')

<h2>Tambah Penempatan Barang</h2>

<form action="{{ route('inventory-rooms.store') }}"
      method="POST">

    @csrf

    <div class="mb-3">
        <label>Barang</label>

        <select name="inventory_id"
                class="form-control">

            @foreach($inventories as $inventory)

                <option value="{{ $inventory->inventory_id }}">
                    {{ $inventory->item->item_name }}
                </option>

            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label>Ruangan</label>

        <select name="room_id"
                class="form-control">

            @foreach($rooms as $room)

                <option value="{{ $room->room_id }}">
                    {{ $room->room_name }}
                </option>

            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label>Tanggal Penempatan</label>

        <input
            type="date"
            name="inventory_date"
            class="form-control"
            value="{{ date('Y-m-d') }}">
    </div>

    <div class="mb-3">
        <label>Status</label>

        <select
            name="status"
            class="form-control">

            <option value="Active">
                Active
            </option>

            <option value="Inactive">
                Inactive
            </option>

        </select>
    </div>

    <button type="submit"
            class="btn btn-success">
        Simpan
    </button>

</form>

@endsection