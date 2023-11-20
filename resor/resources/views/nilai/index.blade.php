@extends('layouts/navbar')

@section('title', 'Index nilai ')

@section('isi')
<h1>tabel nilai siswa </h1>
 
  <a href="{{ route('nilai.create') }}"><button class="btn btn-primary mb-3">tambah nilai</button></a> <br>
  @if (session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif  
              {{-- form search nilai --}}
              {{-- <form class="form" method="get" action="{{ route('nilai.search') }}">
                <div class="form-group w-100 mb-3">
                    <label for="search" class="d-block mr-2">Pencarian</label>
                    <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                </div>
            </form> --}}

  <table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">NIS</th>
        <th scope="col">Nama Siswa</th>
        <th scope="col">Kelas</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Nama Mapel</th>
        <th scope="col">nilai</th>
        <th scope="col">Edit</th>
        <th scope="col">Hapus</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $siswa)
        <tr>
          <th scope="row">{{ $siswa->nis }}</th>
          <td>{{ $siswa->nama_siswa }}</td>
          <td>{{ $siswa->kelas }}</td>
          <td>{{ $siswa->jurusan }}</td>
          <td>{{ $siswa->nama_mapel }}</td>
          <td>{{ $siswa->nilai }}</td>
          <td><a href="{{ route('nilai.edit', $siswa->id) }}"><button class="btn btn-primary" >edit</button></a></td>
          <td><form action="{{ route('nilai.destroy', $siswa->id) }}" method="POST">
            @csrf
            @method('DELETE')
        
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus nilai ini?')">Delete</button>
        </form></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  
  <p>Data per halaman: {{ $data->perPage() }} | Jumlah Data: {{ $data->total() }}</p>

  {{ $data->links() }}
@endsection
