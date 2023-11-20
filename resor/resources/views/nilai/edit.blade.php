@extends('layouts/navbar')
@section('title')
    nilai edit 
@endsection
@section('isi')

<h1>ini halaman edit</h1>
<form action="{{ route('nilai.update', $data->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<input type="hidden" value="{{ $data->id }}">
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">nis</label>
        <input type="number" class="form-control" 
        id="exampleFormControlinput2" name="nis" placeholder="harap masukan nama nis" value="{{ $data->nis }}">
        @error('nis')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Kode mapel</label>
        <input type="text" class="form-control" 
        id="exampleFormControlInput1" placeholder="harap masukan kode mapel" name="kode_mapel" value="{{ $data->kode_mapel }}">
        @error('kode_mapel')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

 
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Nilai</label>
    <input type="text" class="form-control" 
    id="exampleFormControlinput2" name="nilai" placeholder="harap masukan nilai" value="{{ $data->nilai }}">
    @error('nilai')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

 

  
  

  <a href=""><button type="submit" class="btn btn-primary">submit</button></a>
  <a href="/nilai"><button type="button" class="btn btn-danger">kembali</button></a>

  
  
  


</form>
@endsection