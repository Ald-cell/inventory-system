@extends('layouts.app')

@section('content')

<h2>Edit User</h2>

<form
    action="{{ route('users.update',$user->id) }}"
    method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Nama</label>

        <input
            type="text"
            name="name"
            value="{{ $user->name }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Email</label>

        <input
            type="email"
            name="email"
            value="{{ $user->email }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Role</label>

        <select
            name="role"
            class="form-control">

            <option
                value="Admin"
                {{ $user->role == 'Admin' ? 'selected' : '' }}>
                Admin
            </option>

            <option
                value="Staff Inventory"
                {{ $user->role == 'Staff Inventory' ? 'selected' : '' }}>
                Staff Inventory
            </option>

        </select>

    </div>

    <button
        type="submit"
        class="btn btn-success">
        Update
    </button>

</form>

@endsection