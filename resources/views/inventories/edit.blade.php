@extends('layouts.app')

@section('content')

<h2>Edit Inventory</h2>

<form action="{{ route('inventories.update', $inventory->inventory_id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Barang</label>

        <select name="item_id" class="form-control">

            @foreach($items as $item)

                <option value="{{ $item->item_id }}"
                    {{ $inventory->item_id == $item->item_id ? 'selected' : '' }}>

                    {{ $item->item_name }}

                </option>

            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label>Merk</label>

        <input type="text"
               name="merk"
               value="{{ $inventory->merk }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Quantity</label>

        <input type="number"
               name="quantity"
               value="{{ $inventory->quantity }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Harga</label>

        <input type="number"
               name="price"
               value="{{ $inventory->price }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Spesifikasi</label>

        <textarea name="specification"
                  class="form-control"
                  rows="4">{{ $inventory->specification }}</textarea>
    </div>

    <div class="mb-3">
        <label>Barcode</label>

        <input type="text"
               name="barcode"
               value="{{ $inventory->barcode }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Status</label>

        <select name="status"
                class="form-control">

            <option value="Active"
                {{ $inventory->status == 'Active' ? 'selected' : '' }}>
                Active
            </option>

            <option value="Inactive"
                {{ $inventory->status == 'Inactive' ? 'selected' : '' }}>
                Inactive
            </option>

        </select>
    </div>

    <button type="submit"
            class="btn btn-success">

        Update

    </button>

</form>

@endsection