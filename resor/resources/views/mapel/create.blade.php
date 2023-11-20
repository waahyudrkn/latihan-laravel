@extends('layouts/navbar')
@section('title')
    mapel create 
@endsection
@section('isi')

<h1>ini halaman create</h1>
<form action="/mapel" method="post" enctype="multipart/form-data">
    @csrf
    
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Kode mapel</label>
    <input type="text" class="form-control" 
    id="exampleFormControlInput1" placeholder="harap masukan kode mapel" name="kode_mapel">
    @error('kode_mapel')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

 
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Nama mapel</label>
    <input type="text" class="form-control" 
    id="exampleFormControlinput2" name="nama_mapel" placeholder="harap masukan nama mapel">
    @error('nama_mapel')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

 

  
  

  <a href=""><button type="submit" class="btn btn-primary">submit</button></a>
  <a href="/mapel"><button type="button" class="btn btn-danger">kembali</button></a>

  
  
  


</form>
@endsection