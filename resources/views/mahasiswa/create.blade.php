@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Tambah Mahasiswa</div>
    <div class="card-body">
        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf

            @include('mahasiswa.form')

            <button type="submit" class="btn btn-success mt-2">Simpan</button>
        </form>
    </div>
</div>
@endsection
