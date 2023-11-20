@extends('layouts/navbar')
@section('title', 'Index siswa ')

@section('isi')

<div class="container mt-5">
    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">
        <i class="btn-icon-prepend" data-feather="plus"></i>
        Tambah Siswa
    </a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
                
    <form method="get" action="{{ route('siswa.search') }}" class="d-flex justify-content-end mb-3">
        <div class="form-group w-50">
            <label for="search" class="d-block mr-2">Pencarian</label>
            <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Kosongkan untuk menampilkan semua data">
            <button type="submit" class="btn btn-primary mb-1">
                <i class="btn-icon-prepend" data-feather="search"></i>
            </button>
        </div>
    </form> 

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Detail</th>
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
                        <td>{{ $siswa->jenis_kelamin }}</td>
                        <td>
                            <a href="{{ route('siswa.show', $siswa->nis) }}" class="btn btn-primary btn-sm">
                                <i class="btn-icon-prepend" data-feather="info"></i>
                            </a>
                        </td> 
                        <td>
                            <form action="{{ route('siswa.destroy', $siswa->nis) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
                                    <i class="btn-icon-prepend" data-feather="trash-2"></i>
                                </button>
                            </form>
                        </td>          
                    </tr>  
                @endforeach 
            </tbody>
        </table>
    </div>

    <p>Data perhalaman: {{ $data->perPage() }} |  Jumlah Data: {{ $data->total() }}</p>

    {{ $data->links() }}
</div>

@endsection
