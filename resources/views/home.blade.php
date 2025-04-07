@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>Hai, {{ Auth::user()->name }}!</h5>
                    <p>Ini adalah halaman dashboard aplikasi.</p>

                    @canany(['create-mahasiswa', 'edit-mahasiswa', 'delete-mahasiswa', 'show-mahasiswa'])
                        <a class="btn btn-primary" href="{{ route('mahasiswa.index') }}">
                            <i class="bi bi-mortarboard-fill"></i> Kelola Data Mahasiswa
                        </a>
                    @endcanany
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
