<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {

        $mahasiswas = Mahasiswa::with('jurusan')->get();

        return view('mahasiswa.index', compact('mahasiswas'));
        // $mahasiswas = Mahasiswa::all();

    }

    public function create()
    {
        $jurusans = Jurusan::all();
        return view('mahasiswa.create', compact('jurusans'));
        // return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nim'           => 'required|size:8|unique:mahasiswas',
            'nama'          => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan_id'       => 'required',
            'alamat'        => '',
        ]);

        Mahasiswa::create($validateData);

        return redirect()->route('mahasiswas.index')->with('pesan', "Penambahan data {$validateData['nama']} berhasil");
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', ['mahasiswa' => $mahasiswa]);
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $jurusans = Jurusan::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'jurusans'));
        // return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validateData = $request->validate([
            'nim'           => 'required|size:8|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama'          => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan_id' => 'required',
            'alamat'        => '',
        ]);

        $mahasiswa->update($validateData);

        return redirect()->route('mahasiswas.show', ['mahasiswa' => $mahasiswa->id])
            ->with('pesan', "Update data {$validateData['nama']} berhasil");
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')
            ->with('pesan', "Hapus data $mahasiswa->nama berhasil");
    }
}
