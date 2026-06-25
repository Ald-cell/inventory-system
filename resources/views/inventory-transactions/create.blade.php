@extends('layouts.app')

@section('content')

<h2>Tambah Transaksi Inventory</h2>

<form
action="{{ route('inventory-transactions.store') }}"
method="POST">

    @csrf

    <div class="mb-3">

        <label>
            Nomor Transaksi
        </label>

        <input
            type="text"
            name="transaction_number"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>
            Tanggal
        </label>

        <input
            type="date"
            name="transaction_date"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>
            Status
        </label>

        <select
            name="status"
            class="form-control">

            <option value="Pending">
                Pending
            </option>

            <option value="Approved">
                Approved
            </option>

        </select>

    </div>

    <button
        type="submit"
        class="btn btn-success">

        Simpan

    </button>

</form>

@endsection