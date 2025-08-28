@extends('template.sourcelayout')
@section('title', 'Data Siswa')
@section('content')

<div>
  <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3 ml-3">+ Tambah Siswa</a>
</div>

<div class="table-responsive">
  <table id="example" class="table table-bordered table-striped">
    <thead class="table-light">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Foto</th>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col">Alamat</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($murid as $s)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
            @if($s->foto)
              <img src="{{ asset('storage/' . $s->foto) }}" alt="Foto Siswa" width="100" class="img-thumbnail">
            @else
              <span class="text-muted">Tidak ada foto</span>
            @endif
          </td>
          <td>{{ $s->nama }}</td>
          <td>{{ $s->kelas }}</td>
          <td>{{ $s->alamat }}</td>
          <td>
            <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form id="delete-form-{{ $s->id }}" action="{{ route('siswa.destroy', $s->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger btn-sm" 
                onclick="confirmDelete(event, 'delete-form-{{ $s->id }}')">
                Hapus
            </button>
        </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection



