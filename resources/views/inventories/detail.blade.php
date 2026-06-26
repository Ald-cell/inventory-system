@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h3 class="mb-0">
                Detail Inventory
            </h3>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 text-center">

                    @if($inventory->foto)

                        <img
                            src="{{ asset('storage/'.$inventory->foto) }}"
                            class="img-fluid rounded shadow"
                            style="max-height:300px;">

                    @endif

                    <div class="mt-3">

    <div class="alert alert-info">
        <strong>Barcode:</strong><br>
        {{ $inventory->barcode }}
    </div>

</div>

                </div>

                <div class="col-md-8">

                    <table class="table table-bordered">

                        <tr>
                            <th width="30%">Barang</th>
                            <td>{{ $inventory->item->item_name }}</td>
                        </tr>

                        <tr>
                            <th>Merk</th>
                            <td>{{ $inventory->merk }}</td>
                        </tr>

                        <tr>
                            <th>Barcode</th>
                            <td>{{ $inventory->barcode }}</td>
                        </tr>

                        <tr>
                            <th>Quantity</th>
                            <td>{{ $inventory->quantity }}</td>
                        </tr>

                        <tr>
                            <th>Harga</th>
                            <td>
                                Rp {{ number_format($inventory->price,0,',','.') }}
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{ $inventory->status }}</td>
                        </tr>

                        <tr>
                            <th>Spesifikasi</th>
                            <td>{{ $inventory->specification }}</td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

        <div class="card-footer">

            <a href="{{ route('inventories.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection