@extends('layouts.app')

@section('title','Data Inventory')

@section('content')

<div class="card shadow border-0">

<div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

    <h4 class="mb-0">
        <i class="bi bi-box-seam"></i>
        Data Inventory
    </h4>

    <a href="{{ route('inventories.create') }}"
       class="btn btn-success">

        <i class="bi bi-plus-circle"></i>
        Tambah Inventory

    </a>

</div>

<div class="card-body">

    @if(request('status'))

        <div class="alert alert-info">

            Filter Status :
            <strong>{{ request('status') }}</strong>

        </div>

    @endif

    <div class="row mb-4">

        <div class="col-md-6">

            <form method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari barang..."
                        value="{{ request('search') }}">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-search"></i>

                    </button>

                    <a
                        href="{{ route('inventories.index') }}"
                        class="btn btn-warning">

                        <i class="bi bi-arrow-clockwise"></i>

                    </a>

                </div>

            </form>

        </div>

    </div>

    <div class="mb-4">

        <a href="{{ route('inventories.index') }}"
           class="btn btn-dark btn-sm">

            Semua

        </a>

        <a href="{{ route('inventories.index',['status'=>'Active']) }}"
           class="btn btn-success btn-sm">

            Active

        </a>

        <a href="{{ route('inventories.index',['status'=>'Inactive']) }}"
           class="btn btn-danger btn-sm">

            Inactive

        </a>

    </div>

    <div class="table-responsive">

        <table class="table table-hover table-bordered align-middle">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Barang</th>
                    <th>Foto</th>
                    <th>Merk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th width="220">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($inventories as $inventory)

                <tr>

                    <td>{{ $inventory->inventory_id }}</td>

                    <td>{{ $inventory->item->item_name }}</td>

                    <td>

                        @if($inventory->foto)

                            <img
                                src="{{ asset('storage/'.$inventory->foto) }}"
                                style="
                                    width:70px;
                                    height:70px;
                                    object-fit:cover;
                                    border-radius:10px;
                                ">

                        @endif

                    </td>

                    <td>{{ $inventory->merk }}</td>

                    <td>{{ $inventory->quantity }}</td>

                    <td>
                        Rp {{ number_format($inventory->price,0,',','.') }}
                    </td>

                    <td>

                        @if($inventory->status == 'Active')

                            <span class="badge bg-success">
                                Active
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Inactive
                            </span>

                        @endif

                    </td>

                    <td>

                        <a
                            href="{{ route('inventories.detail',$inventory->inventory_id) }}"
                            class="btn btn-primary btn-sm">

                            <i class="bi bi-eye"></i>

                        </a>

                        <a
                            href="{{ route('inventories.edit',$inventory->inventory_id) }}"
                            class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil"></i>

                        </a>

                        <form
                            action="{{ route('inventories.destroy',$inventory->inventory_id) }}"
                            method="POST"
                            style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data?')">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                        <a
                            href="{{ route('inventories.pdf',$inventory->inventory_id) }}"
                            class="btn btn-dark btn-sm">

                            <i class="bi bi-file-earmark-pdf"></i>

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8" class="text-center">

                        Tidak ada data inventory

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
