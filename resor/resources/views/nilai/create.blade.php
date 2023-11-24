@extends('template.dashboard')

@section('template')
<div class="row">
  <div class="col-md-6 grid-margin mt-5">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Form Buat Siswa Baru</h6>
        <form action="/nilai" method="post" enctype="multipart/form-data">
          @csrf      
          {{-- bagian form nama --}}
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">nis</label>
            <input type="number" class="form-control" 
                    id="exampleFormControlinput2" name="nis"
                    placeholder="harap masukan Nis Siswa yang Ingin dinilai">
                {{-- error massage --}}
              @error('nis')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Kode mapel</label>
            <input type="text" class="form-control" 
                    id="exampleFormControlInput1"
                    placeholder="harap masukan kode mapel yang sesuai dengan mata pelajaran" name="kode_mapel">
        
            {{-- error message --}}
            @error('kode_mapel')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
                  
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Nilai</label>
            <input type="text" class="form-control" 
                    id="exampleFormControlinput2" name="nilai"
                    placeholder="harap masukan nilai">
              @error('nilai')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>

          <button class="btn btn-primary" type="submit">Submit</button>
          <a href="/nilai"><button type="button" class="btn btn-danger">kembali</button></a>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin mt-5">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Info Kode mata pelajaran dan nama matapelajaran</h6>
        <div class="table-responsive" style="max-height: 285px; overflow-y: auto;">
          <table id="dataTableExample" class="table">
              <thead>
                  <tr>
                    <th scope="col">kode mapel</th>
                      <th scope="col">nama mapel</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($mapel as $mapel)
                  <tr>
                      <th scope="row">{{ $mapel->kode_mapel }}</th>
                      <td>{{ $mapel->nama_mapel }}</td>
                  </tr> 
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
