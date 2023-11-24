@extends('template.dashboard')

@section('template')

  <div class="col-md-6 grid-margin mt-5">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Form Buat Siswa Baru</h6>
        <form action="/siswa" method="post" enctype="multipart/form-data">
          @csrf      
          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Masukan Nis:</label>
            <input type="number" class="form-control" id="nis" name="nis" placeholder="Masukan NIS">
        
            {{-- error message --}}
            @error('nis')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        

          {{-- bagian form nama --}}
          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Masukan Nama:</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukan Nama">
                {{-- error massage --}}
              @error('nama_siswa')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>

          

          {{-- bagian form kelas --}}
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Pilih Kelas:</label>
            <select class="form-select" id="kelas" name="kelas">
              <option selected disabled>Pilih kelas</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>

              {{-- error massage --}}
                @error('kelas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
          </div>

          

          {{-- bagian form jurusan --}}
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Pilih jurusan:</label>
            <select class="form-select" id="jurusan" name="jurusan">
              <option selected disabled>Pilih Jurusan</option>
              <option value="rekayasa perangkat lunak">rekayasa perangkat lunak</option>
              <option value="teknik audio vidio">teknik audio vidio</option>
              <option value="teknik kendaraan ringan">teknik kendaraan ringan</option>
              <option value="teknik mekanik industri">teknik mekanik industri</option>
              <option value="teknik dan bisnis sepeda motor">teknik dan bisnis sepeda motor</option>
            </select>

                  {{-- error massage --}}
                @error('jurusan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
          </div>

         

          {{-- bagian form jenis kelamin --}}
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Pilih jenis kelamin:</label>
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
              <option selected disabled>Pilih jenis kelamin</option>
              <option value="laki-laki">laki-laki</option>
              <option value="perempuan">perempuan</option>
            </select>

                {{-- error massage --}}
              @error('jenis_kelamin')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>

          

          {{-- bagian form foto --}}
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">foto</label>
            <input type="file" name="foto" class="form-control" id="exampleFormControlInput1" placeholder="Gambar">
            @error('foto')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          
        
          {{-- bagian form file --}}
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">dokumen</label>
            <input type="file" name="dokumen" class="form-control" id="exampleFormControlInput1" placeholder="Gambar">
            @error('dokumen')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          

          <button class="btn btn-primary" type="submit">Submit</button>
          <a href="/siswa"><button type="button" class="btn btn-danger">kembali</button></a>
        </form>
      </div>
    </div>
  </div>
@endsection
