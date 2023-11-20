@extends('layouts/navbar')
@section('title')
    mapel index
@endsection
@section('isi')

<table class="table">
  <a href="{{ route('mapel.create') }}"><button class="btn btn-primary mb-3">tambah mapel</button></a> <br>
  @if (session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
              
    <p>
Data perhalaman: {{ $data->perPage() }} |  Jumlah Data: {{ $data->total() }} 
    </p>
    <thead class="table table-dark">
      <tr>
        <th scope="col">kode mapel</th>
        <th scope="col">nama mapel</th>
        <th scope="col">Hapus</th>
        <th scope="col">Edit</th>
        
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $mapel)
        <tr>
            <th scope="row">{{ $mapel->kode_mapel }}</th>
            <td>{{ $mapel->nama_mapel }}</td>
            <td><form action="{{ route('mapel.destroy', $mapel->kode_mapel) }}" method="POST">
              @csrf
              @method('DELETE')
          
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus mapel ini?')">Delete</button>
          </form>
          </td>
          <td><a href="{{ route('mapel.edit', $mapel->kode_mapel) }}"><button class="btn btn-primary" >edit</button></a></td>
        </tr>  
       
        @endforeach 
    </tbody>
  </table>
  {{ $data->links() }}

@endsection

