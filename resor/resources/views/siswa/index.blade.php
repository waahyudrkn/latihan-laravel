@extends('template.dashboard')

@section('template')

<div class="page-content">
    
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Data Siswa</h4>
            <form method="get" action="{{ route('siswa.search') }}" class="d-flex ml-3 mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Pencarian"
                        aria-label="Pencarian" aria-describedby="button-search">
                    <button type="submit" class="btn btn-primary" id="button-search">
                        <i class="btn-icon-prepend" data-feather="search"></i>
                    </button>
                </div>
            </form>
            <div class="d-flex">
                @can('tambah-siswa')
                <a href="{{ route('siswa.create') }}" class="btn btn-primary ml-3 mb-3">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Tambah Siswa
                </a>
                @endcan
       
                
            </div>
        </div>

        

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title mb-3">tabel Data Siswa</h6>
                        
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">NIS</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Detail</th>
                                        @can('hapus-siswa')
                                            <th scope="col">Hapus</th>
                                        @endcan
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
                                            <a href="{{ route('siswa.show', $siswa->nis) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="btn-icon-prepend" data-feather="info"></i>
                                            </a>
                                        </td>
                                        @can('hapus-siswa')
                                        <td>
                                            <form action="{{ route('siswa.destroy', $siswa->nis) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
                                                    <i class="btn-icon-prepend" data-feather="trash-2"></i>
                                                </button>
                                            </form>
                                        </td>
                                        @endcan
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pagination pagination-sm justify-content-end pagination-separated">
            {{ $data->links() }}
        </div>
    </div>
</div>

@endsection
