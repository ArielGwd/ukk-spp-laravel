@extends('layout.layout')

@section('content')
    <div class="container">
      <h2><i class="fa-solid fa-pen-to-square"></i> Ubah Data Petugas</h2>
      @foreach ($kelas as $k)
        <form action="{{ route('ubahKelas', $k->id_kelas) }}" method="post">
            @csrf
            
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Kelas</label>
              <input type="text" name="nama_kelas" value="{{ $k->nama_kelas }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="XII RPL B">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Kompetensi Keahlian</label>
              <input type="text" name="kompetensi_keahlian" value="{{ $k->kompetensi_keahlian }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teknik blablba">
            </div>
                      
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-up-right-from-square"></i> Ubah</button>
            <a class="btn btn-secondary" href="{{ url('/kelas') }}">Kembali</a>
                       
          </form>
        @endforeach
    </div>
@endsection