<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    // Tampilkan semua data siswa

        public function index()
    {
        $murid = Siswa::all();
        return view('siswa.siswa', compact('murid'));
    }

    
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }
    
    public function create()
{
    return view('siswa.create');
}
public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:100',
        'kelas' => 'required|string|max:50',
        'alamat' => 'required|string',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only(['nama', 'kelas', 'alamat']);

    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('foto_siswa', 'public');
    }

    \App\Models\Siswa::create($data);

    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
}


public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'kelas' => 'required|string|max:255',
        'alamat' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $siswa = Siswa::findOrFail($id);

    $data = $request->only(['nama', 'kelas', 'alamat']);

    if ($request->hasFile('foto')) {
        // hapus foto lama jika ada
        if ($siswa->foto && \Storage::disk('public')->exists($siswa->foto)) {
            \Storage::disk('public')->delete($siswa->foto);
        }
        $data['foto'] = $request->file('foto')->store('foto_siswa', 'public');
    }

    $siswa->update($data);

    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
}
public function destroy($id)
{
    $siswa = Siswa::findOrFail($id);

    // hapus foto kalau ada
    if ($siswa->foto && \Storage::exists($siswa->foto)) {
        \Storage::delete($siswa->foto);
    }

    $siswa->delete();

    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
}


}
