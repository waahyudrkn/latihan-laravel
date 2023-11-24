@extends('template.dashboard')

@section('template')

<div class="page-content">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Data Mata Pelajaran</h4>
            <div class="d-flex">
                @can('tambah-mapel')
                <a href="{{ route('mapel.create') }}" class="btn btn-primary ml-3">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Tambah Mata pelajaran
                </a>
                @endcan
                

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
                        <h6 class="card-title">tabel Data Mapel</h6>
                        
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                      <th scope="col">kode mapel</th>
                                        <th scope="col">nama mapel</th>
                                          @hasrole('admin')
                                            <th scope="col">Hapus</th>
                                            <th scope="col">Edit</th>
                                          @endhasrole
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($data as $mapel)
                                    <tr>
                                        <th scope="row">{{ $mapel->kode_mapel }}</th>
                                        <td>{{ $mapel->nama_mapel }}</td>

                                        @hasrole('admin')
                                            <td>
                                              <form action="{{ route('mapel.destroy', $mapel->kode_mapel) }}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                          
                                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus mapel ini?')">Delete</button>
                                              </form>
                                            </td>
                                        <td><a href="{{ route('mapel.edit', $mapel->kode_mapel) }}"><button class="btn btn-primary" >edit</button></a></td>
                                       @endhasrole

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
