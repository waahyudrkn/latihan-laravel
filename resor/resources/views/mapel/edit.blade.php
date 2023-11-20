@extends('layouts/navbar')
@section('title')
    mapel edit 
@endsection
@section('isi')

<h1>ini halaman edit</h1>

<form action="{{ route('mapel.update', $data->kode_mapel) }}" method="post" >
    @csrf
    @method('PUT')
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">kode mapel</label>
    <input type="number" class="form-control" 
    id="exampleFormControlInput1" placeholder="" name="kode_mapel" value="{{ $data->kode_mapel }}">
    @error('kode_mapel')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Nama mapel</label>
    <input type="text" class="form-control" 
    id="exampleFormControlinput2" name="nama_mapel" value="{{ $data->nama_mapel }}">
    @error('nama_mapel')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  


  <a href=""><button type="submit" class="btn btn-primary">submit</button></a>
  <a href="{{ route('siswa.index', $data->kode_mapel) }}" class="btn btn-secondary">Back</a>

  


</form>
@endsection
