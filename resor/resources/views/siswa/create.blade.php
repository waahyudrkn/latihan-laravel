@extends('layouts/navbar')
@section('title')
    create 
@endsection
@section('isi')

<h1>ini halaman create</h1>
<form action="/siswa" method="post" enctype="multipart/form-data">
    @csrf
    
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">NIS</label>
    <input type="number" class="form-control" 
    id="exampleFormControlInput1" placeholder="harap masukan NIS" name="nis">
    @error('nis')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">foto</label>
    <input type="file" name="foto" class="form-control" id="exampleFormControlInput1" placeholder="Gambar">
  </div>
  @error('foto')
          <div class="text-danger">{{ $message }}</div>
      @enderror

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">dokumen</label>
    <input type="file" name="dokumen" class="form-control" id="exampleFormControlInput1" placeholder="Gambar">
  </div>
  @error('dokumen')
          <div class="text-danger">{{ $message }}</div>
      @enderror

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Nama Siswa</label>
    <input type="text" class="form-control" 
    id="exampleFormControlinput2" name="nama_siswa" placeholder="harap masukan nama siswa">
    @error('nama_siswa')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="" class="form-label">jenis kelamin</label>
    <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
      <option selected></option>
      <option value="laki-laki">laki-laki</option>
      <option value="perempuan">perempuan</option>
    </select> 
    @error('jenis_kelamin')
          <div class="text-danger">{{ $message }}</div>
      @enderror
  </div>

 

  <div class="mb-3">
    <label for="" class="form-label">Kelas</label>
    <select class="form-select" name="kelas" aria-label="Default select example">
      <option selected></option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
    </select> 
    @error('kelas')
          <div class="text-danger">{{ $message }}</div>
      @enderror
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">Jurusan</label>
    <select class="form-select mb-3" name="jurusan" aria-label="Default select example">
      <option selected></option>
      <option value="rekayasa perangkat lunak">rekayasa perangkat lunak</option>
      <option value="teknik audio vidio">teknik audio vidio</option>
      <option value="teknik kendaraan ringan">teknik kendaraan ringan</option>
      <option value="teknik mekanik industri">teknik mekanik industri</option>
      <option value="teknik dan bisnis sepeda motor">teknik dan bisnis sepeda motor</option>
    </select>
    @error('jurusan')
          <div class="text-danger">{{ $message }}</div>
      @enderror 
  </div>
  

  <a href=""><button type="submit" class="btn btn-primary">submit</button></a>
  <a href="/siswa"><button type="button" class="btn btn-danger">kembali</button></a>

  
  
  


</form>
@endsection