@extends('layout.layout')

@section('content')
    <div class="container">
      <h2><i class="fa-solid fa-square-plus"></i> Ubah Data Siswa</h2>
        <form action="{{ route('ubah.spp', $spp->id_spp) }}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Tahun</label>
              <input type="number" name="tahun" value="{{ $spp->tahun }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nominal</label>
              <input type="number" name="nominal" value="{{ $spp->nominal }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="100000">
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-up-right-from-square"></i> Ubah</button>
            <a class="btn btn-secondary" href="{{ url('/spp') }}">Kembali</a>

          </form>
          
    </div>
@endsection