<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-mahasiswa|edit-mahasiswa|delete-mahasiswa|show-mahasiswa', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-mahasiswa', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-mahasiswa', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-mahasiswa', ['only' => ['destroy']]);
    }

    public function index()
    {
        if (auth()->user()->hasRole('mahasiswa')) {
            return view('mahasiswa.index', [
                'mahasiswa' => Mahasiswa::where('user_id', auth()->id())->paginate(1)
            ]);
        }

        return view('mahasiswa.index', [
            'mahasiswa' => Mahasiswa::latest()->paginate(3)
        ]);
    }


    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(StoreMahasiswaRequest $request)
    {
        dd([
            'email' => auth()->user()->email,
            'role' => auth()->user()->getRoleNames(),
            'permissions' => auth()->user()->getAllPermissions()->pluck('name'),
        ]);
    }


    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        if (auth()->user()->hasRole('mahasiswa') && auth()->id() !== $mahasiswa->user_id) {
            abort(403);
        }

        return view('mahasiswa.edit', compact('mahasiswa'));
    }


    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->update($request->validated());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
