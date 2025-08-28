@extends('template.sourcelayout')
@section('title', 'Tambah Siswa')
@section('content')

<h2>Tambah Data Siswa</h2>

<form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
    <label for="foto" class="form-label">Foto:</label>
    <input type="file" name="foto" class="form-control">
    @if(!empty($siswa->foto))
        <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto Siswa" width="100" class="mt-2">
    @endif
</div>
    <div class="mb-3">
        <label>Nama:</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kelas:</label>
        <input type="text" name="kelas" class="form-control" required>
    </div>
    <div class="mb-3">
    <label for="alamat" class="form-label">Alamat:</label>
    <textarea name="alamat" class="form-control">{{ old('alamat', $siswa->alamat ?? '') }}</textarea>
</div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@endsection