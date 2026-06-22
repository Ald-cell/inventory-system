@extends('layouts.app')

@section('content')

<h2>Tambah Gedung</h2>

<form action="{{ route('buildings.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label class="form-label">
            Nama Gedung
        </label>

        <input
            type="text"
            name="building_name"
            class="form-control">
    </div>

    <button
        type="submit"
        class="btn btn-success">

        Simpan

    </button>

</form>

@endsection