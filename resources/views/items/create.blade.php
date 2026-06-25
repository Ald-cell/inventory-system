@extends('layouts.app')

@section('content')

<h2>Tambah Barang</h2>

<form action="{{ route('items.store') }}"
      method="POST">

    @csrf

    <div class="mb-3">
        <label>Nama Barang</label>

        <input
            type="text"
            name="item_name"
            class="form-control">
    </div>

    <div class="mb-3">
        <label>Satuan</label>

        <input
            type="text"
            name="unit"
            class="form-control">
    </div>

    <div class="mb-3">
        <label>Jenis Barang</label>

        <select
            name="item_type_id"
            class="form-control">

            @foreach($itemTypes as $itemType)

                <option value="{{ $itemType->item_type_id }}">
                    {{ $itemType->item_type_name }}
                </option>

            @endforeach

        </select>

    </div>

    <button
        type="submit"
        class="btn btn-success">

        Simpan

    </button>

</form>

@endsection