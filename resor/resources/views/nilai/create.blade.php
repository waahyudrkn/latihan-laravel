@extends('layouts/navbar')
@section('title')
    mapel create 
@endsection
@section('isi')

<h1>ini halaman create</h1>
<form action="/nilai" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">nis</label>
        <input type="number" class="form-control" 
        id="exampleFormControlinput2" name="nis" placeholder="harap masukan nama nis">
        @error('nis')
            <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Kode mapel</label>
        <input type="text" class="form-control" 
        id="exampleFormControlInput1" placeholder="harap masukan kode mapel" name="kode_mapel">
        @error('kode_mapel')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

 
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Nilai</label>
    <input type="text" class="form-control" 
    id="exampleFormControlinput2" name="nilai" placeholder="harap masukan nilai">
    @error('nilai')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

 

  
  

  <a href=""><button type="submit" class="btn btn-primary">submit</button></a>
  <a href="/nilai"><button type="button" class="btn btn-danger">kembali</button></a>

  
  
  


</form>
@endsection