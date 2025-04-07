@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Daftar Mahasiswa</div>
    <div class="card-body">
        @can('create-mahasiswa')
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-success btn-sm my-2">
                <i class="bi bi-plus-circle"></i> Tambah Mahasiswa
            </a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NIM</th>
                    <th>Program Studi</th>
                    <th>Fakultas</th>
                    <th>Tahun Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mhs->name }}</td>
                        <td>{{ $mhs->email }}</td>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->program_studi }}</td>
                        <td>{{ $mhs->fakultas }}</td>
                        <td>{{ $mhs->tahun_masuk }}</td>
                        <td>
                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-eye"></i> Lihat
                                </a>

                                @can('edit-mahasiswa')
                                    <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                @endcan

                                @can('delete-mahasiswa')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus mahasiswa ini?');">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Belum ada data mahasiswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $mahasiswa->links() }}
    </div>
</div>
@endsection
