@extends('template.dashboard')

@section('template')

<div class="container-fluid mt-5">
  <div class="row">
    <div class="col-md-3 mt-5">
      @if ($data)
        <img src="{{ url('foto').'/'.$data->foto }}" class="img-fluid card-img-top" alt="...">
      @endif
    </div>
    <div class="col-md-9">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            <i class="btn-icon-prepend" data-feather="info"></i>
            Detail
          </h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Nama: {{ $data->nama_siswa }}</li>
            <li class="list-group-item">Nis: {{ $data->nis }}</li>
            <li class="list-group-item">Kelas: {{ $data->kelas }}</li>
            <li class="list-group-item">Jurusan: {{ $data->jurusan }}</li>
            <li class="list-group-item">Kelamin: {{ $data->jenis_kelamin }}</li>
          </ul><br>

          <a href="/siswa" class="btn btn-danger btn-sm">
            Kembali
          </a>
          @can('edit-siswa')
          <a href="{{ route('siswa.edit', $data->nis) }}" class="btn btn-primary btn-sm">
            Edit
          </a>
          @endcan
          <a href="{{url('dokumen').'/'.$data->dokumen}}" class="btn btn-warning btn-sm">
            Lihat Dokumen
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
