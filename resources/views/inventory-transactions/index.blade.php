@extends('layouts.app')

@section('content')

<h2>Data Transaksi Inventory</h2>

<a href="{{ route('inventory-transactions.create') }}"
   class="btn btn-primary mb-3">

    Tambah Transaksi

</a>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>ID</th>
            <th>No Transaksi</th>
            <th>Tanggal</th>
            <th>Status</th>

        </tr>

    </thead>

    <tbody>

    @forelse($transactions as $row)

        <tr>

            <td>
                {{ $row->inventory_transaction_id }}
            </td>

            <td>
                {{ $row->transaction_number }}
            </td>

            <td>
                {{ $row->transaction_date }}
            </td>

            <td>
                {{ $row->status }}
            </td>

        </tr>

    @empty

        <tr>

            <td colspan="4">

                Belum ada transaksi

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

@endsection