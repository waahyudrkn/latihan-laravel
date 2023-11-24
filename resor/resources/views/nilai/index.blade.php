@extends('template.dashboard')

@section('template')

<div class="page-content">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Data Nilai Siswa</h4>
            
            <div class="d-flex align-items-center">
                @hasanyrole('guru|admin')
                    <a href="{{ route('nilai.create') }}" class="btn btn-primary ml-3 mb-3">
                        <i class="btn-icon-prepend" data-feather="plus"></i>
                        Tambah Nilai
                    </a>
                @endhasanyrole

                @if (session('success'))
                    <div class="alert alert-success ml-3">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title mb-3">Tabel Data Mapel</h6>
                        <form action="{{ route('nilai.index') }}" method="get" class="form-inline">
                            <div class="form-row align-items-center">
                                <div class="form-group col-auto">
                                    <label for="order_by">Urutkan berdasarkan:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="order_by" id="order_by_jurusan" value="jurusan">
                                        <label class="form-check-label" for="order_by_jurusan">
                                            Jurusan
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="order_by" id="order_by_mapel" value="mapel.nama_mapel">
                                        <label class="form-check-label" for="order_by_mapel">
                                            Nama Mapel
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="order_by" id="order_by_kelas" value="siswas.kelas">
                                        <label class="form-check-label" for="order_by_kelas">
                                            Kelas
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-auto">
                                    <label for="order_direction">Urutan:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="order_direction" id="order_asc" value="asc">
                                        <label class="form-check-label" for="order_asc">
                                            Ascending
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="order_direction" id="order_desc" value="desc">
                                        <label class="form-check-label" for="order_desc">
                                            Descending
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-auto">
                                    <button type="submit" class="btn btn-primary">Urutkan</button>
                                </div>
                            </div>
                        </form>
                        
                        
                        
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">NIS</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Nama Mapel</th>
                                        <th scope="col">Nilai</th>
                                        @hasanyrole('guru|admin')
                                            <th scope="col">Edit</th>
                                            <th scope="col">Hapus</th>
                                        @endhasanyrole
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
                                            @hasanyrole('guru|admin')
                                                <td><a href="{{ route('nilai.edit', $siswa->id) }}"><button class="btn btn-primary">Edit</button></a></td>
                                                <td>
                                                    <form action="{{ route('nilai.destroy', $siswa->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus nilai ini?')">Delete</button>
                                                    </form>
                                                </td>
                                            @endhasanyrole
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
