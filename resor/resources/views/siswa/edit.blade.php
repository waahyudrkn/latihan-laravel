@extends('layouts/navbar')
@section('title')
    edit 
@endsection
@section('isi')

<h1>ini halaman edit</h1>

<form action="{{ route('siswa.update', $data->nis) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">NIS</label>
    <input type="number" class="form-control" 
    id="exampleFormControlInput1" placeholder="" name="nis" value="{{ $data->nis }}">
    @error('nis')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">foto</label>
    <p>foto saat ini :{{ $data->foto }}</p>
    <input type="file" name="foto" class="form-control" id="exampleFormControlInput1" >
  </div>
  @error('foto')
          <div class="text-danger">{{ $message }}</div>
      @enderror

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">dokumen</label>
    <p>dokumen saat ini :{{ $data->dokumen }}</p>
    <input type="file" name="dokumen" class="form-control" id="exampleFormControlInput1" >
  </div>
  @error('dokumen')
          <div class="text-danger">{{ $message }}</div>
      @enderror

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Nama Siswa</label>
    <input type="text" class="form-control" 
    id="exampleFormControlinput2" name="nama_siswa" value="{{ $data->nama_siswa }}">
    @error('nama_siswa')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="" class="form-label">jenis kelamin</label>
    <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
      <option value="laki-laki" {{ $data->jenis_kelamin === 'laki-laki' ? 'selected' : ''}}>laki-laki</option>
      <option value="perempuan" {{ $data->jenis_kelamin === 'perempuan' ? 'selected' : ''}}>perempuan</option>
    </select> 
    @error('jenis_kelamin')
          <div class="text-danger">{{ $message }}</div>
      @enderror
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Kelas</label>
    <select class="form-select" name="kelas" aria-label="Default select example">
      <option value="10" {{ $data->kelas === 10 ? 'selected' : ''}}>10</option>
      <option value="11" {{ $data->kelas === 11 ? 'selected' : ''}}>11</option>
      <option value="12" {{ $data->kelas === 12 ? 'selected' : ''}}>12</option>
    </select> 
    @error('kelas')
          <div class="text-danger">{{ $message }}</div>
      @enderror
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">Jurusan</label>
    <select class="form-select mb-3" name="jurusan" aria-label="Default select example">
      <option value="rekayasa perangkat lunak" {{ $data->jurusan === 'rekayasa perangkat lunak' ? 'selected' : ''}}>
        rekayasa perangkat lunak</option>
      <option value="teknik audio vidio"
       {{ $data->jurusan === 'teknik audio vidio' ? 'selected' : ''}}>
       teknik audio vidio
      </option>
      <option value="teknik kendaraan ringan" {{ $data->jurusan === 'teknik kendaraan ringan' ? 'selected' : ''}}>teknik kendaraan ringan</option>
      <option value="teknik mekanik industri"{{ $data->jurusan === 'teknik mekanik industri' ? 'selected' : ''}}>teknik mekanik industri</option>
      <option value="teknik dan bisnis sepeda motor"{{ $data->jurusan === 'teknik dan bisnis sepeda motor' ? 'selected' : ''}}>teknik dan bisnis sepeda motor</option>
    </select>
    @error('jurusan')
          <div class="text-danger">{{ $message }}</div>
      @enderror 
  </div>
  

  <a href=""><button type="submit" class="btn btn-primary">submit</button></a>
  <a href="{{ route('siswa.show', $data->nis) }}" class="btn btn-secondary">Back</a>

  


</form>
@endsection
