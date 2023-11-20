@extends('layouts/navbar')
@section('title')
    show
@endsection
@section('isi')

<div class="row">
  <div class="col-3">
    @if ($data)
      <img src="{{ url('foto').'/'.$data->foto }}" class="card-img-top" alt="...">
    @endif
  </div>
  <div class="col-6">
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

        <a href="/siswa" class="btn btn-secondary btn-sm">
          <i class="btn-icon-prepend" data-feather="skip-back"></i>
          Kembali</a>
        <a href="{{ route('siswa.edit', $data->nis) }}"><button class="btn btn-primary btn-sm" >
          <i class="btn-icon-prepend" data-feather="edit"></i>
          edit
        </button></a>
        <a href="{{url('dokumen').'/'.$data->dokumen}}"><button class="btn btn-warning btn-sm">
          <i class="btn-icon-prepend" data-feather="file"></i>
          lihat dokumen
        </button></a>

        {{-- join nilai --}}
        {{-- <div class="col-3">
          @foreach ($nilai as $nilai)
          <ul>
            <li>{{ $nilai->nilai }} : {{ $nilai->kode_mapel }}</li>
          </ul>
          @endforeach
        </div> --}}
        
      </div>
      </div>
    </div>
  </div>
</div>


@endsection