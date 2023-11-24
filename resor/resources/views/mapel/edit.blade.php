@extends('template.dashboard')

@section('template')

  <div class="col-md-12 grid-margin mt-5">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Form Edit Siswa</h6>
        <form action="{{ route('mapel.update', $data->kode_mapel) }}" method="post">
          @csrf      
          @method('PUT')
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">kode mapel</label>
                <input type="number" class="form-control" 
                        id="exampleFormControlInput1" placeholder="masukan kode mapel"
                        name="kode_mapel" value="{{ $data->kode_mapel }}">
        
            {{-- error message --}}
            @error('kode_mapel')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        

          {{-- bagian form nama --}}
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Nama mapel</label>
            <input type="text" class="form-control" 
                    id="exampleFormControlinput2" name="nama_mapel" placeholder=""
                    value="{{ $data->nama_mapel }}"
                {{-- error massage --}}
              @error('nama_mapel')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>

          <button class="btn btn-primary mt-3" type="submit">Submit</button>
          <a href="{{ route('mapel.index', $data->kode_mapel) }}"><button type="button" class="btn btn-danger mt-3">kembali</button></a>
        </form>
      </div>
    </div>
  </div>
@endsection
