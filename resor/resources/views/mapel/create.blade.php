@extends('template.dashboard')

@section('template')

  <div class="col-md-6 grid-margin mt-5">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Form Buat Siswa Baru</h6>
        <form action="/mapel" method="post" enctype="multipart/form-data">
          @csrf      
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Kode mapel</label>
            <input type="text" class="form-control" 
                    id="exampleFormControlInput1"
                    placeholder="harap masukan kode mapel" name="kode_mapel">
        
            {{-- error message --}}
            @error('kode_mapel')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        

          {{-- bagian form nama --}}
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Nama mapel</label>
            <input type="text" class="form-control" 
                    id="exampleFormControlinput2" name="nama_mapel"
                    placeholder="harap masukan nama mapel">
                {{-- error massage --}}
              @error('nama_mapel')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>

          <button class="btn btn-primary" type="submit">Submit</button>
          <a href="/mapel"><button type="button" class="btn btn-danger">kembali</button></a>
        </form>
      </div>
    </div>
  </div>
@endsection
