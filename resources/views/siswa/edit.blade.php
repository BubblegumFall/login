@extends('template.sourcelayout')
@section('title', 'Edit Siswa')

@section('content')
    <h2>Edit Data Siswa</h2>

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $siswa->nama) }}" required>
        </div>

        {{-- Kelas --}}
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" name="kelas" class="form-control" id="kelas" value="{{ old('kelas', $siswa->kelas) }}" required>
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" rows="3">{{ old('alamat', $siswa->alamat) }}</textarea>
        </div>

        {{-- Foto --}}
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            @if($siswa->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto Siswa" width="120" class="img-thumbnail">
                </div>
            @endif
            <input type="file" name="foto" class="form-control" id="foto" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection