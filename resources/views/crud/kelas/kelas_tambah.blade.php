@extends('layout.layout')

@section('content')
    <div class="container">
      <h2><i class="fa-solid fa-square-plus"></i> Tambah Data Kelas</h2>
        <form action="{{ route('tambah.kelas') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Kelas</label>
              <input type="text" name="nama_kelas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="XII RPL B">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Kompetensi Keahlian</label>
              <input type="text" name="kompetensi_keahlian" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teknik blablba">
            </div>
                      
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-arrow-up-right-from-square"></i> Tambah</button>
            <a class="btn btn-secondary" href="{{ url('/kelas') }}">Kembali</a>

          </form>
          
    </div>
@endsection