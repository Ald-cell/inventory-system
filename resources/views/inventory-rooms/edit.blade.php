@extends('layouts.app')

@section('content')

<h2>Edit Penempatan Barang</h2>

<form action="{{ route('inventory-rooms.update',$inventoryRoom->inventory_room_id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Barang</label>

        <select name="inventory_id"
                class="form-control">

            @foreach($inventories as $inventory)

                <option value="{{ $inventory->inventory_id }}"
                    {{ $inventoryRoom->inventory_id == $inventory->inventory_id ? 'selected' : '' }}>

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

                <option value="{{ $room->room_id }}"
                    {{ $inventoryRoom->room_id == $room->room_id ? 'selected' : '' }}>

                    {{ $room->room_name }}

                </option>

            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label>Tanggal Penempatan</label>

        <input type="date"
               name="inventory_date"
               value="{{ $inventoryRoom->inventory_date }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Status</label>

        <select name="status"
                class="form-control">

            <option value="Active"
                {{ $inventoryRoom->status == 'Active' ? 'selected' : '' }}>
                Active
            </option>

            <option value="Inactive"
                {{ $inventoryRoom->status == 'Inactive' ? 'selected' : '' }}>
                Inactive
            </option>

        </select>
    </div>

    <button class="btn btn-success">
        Update
    </button>

</form>

@endsection