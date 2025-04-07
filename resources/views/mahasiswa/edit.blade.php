@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit Mahasiswa</div>
    <div class="card-body">
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('mahasiswa.form')

            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>
    </div>
</div>
@endsection
