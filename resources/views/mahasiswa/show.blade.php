@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Detail Mahasiswa</div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item"><strong>Nama:</strong> {{ $mahasiswa->name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $mahasiswa->email }}</li>
            <li class="list-group-item"><strong>NIM:</strong> {{ $mahasiswa->nim }}</li>
            <li class="list-group-item"><strong>Program Studi:</strong> {{ $mahasiswa->program_studi }}</li>
            <li class="list-group-item"><strong>Fakultas:</strong> {{ $mahasiswa->fakultas }}</li>
            <li class="list-group-item"><strong>Tahun Masuk:</strong> {{ $mahasiswa->tahun_masuk }}</li>
        </ul>

        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
