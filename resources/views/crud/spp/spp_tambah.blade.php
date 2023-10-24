@extends('layout.layout')

@section('content')
    <div class="container">
      <h2><i class="fa-solid fa-square-plus"></i> Tambah Data Siswa</h2>
        <form action="{{ route('tambah.spp') }}" method="post">
            @include('crud.alert.alert')           
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Tahun</label>
              <input type="number" name="tahun" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="2023,2024,2025">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nominal</label>
              <input type="number" name="nominal" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="100000">
            </div>
            
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-arrow-up-right-from-square"></i> Tambah</button>
            <a class="btn btn-secondary" href="{{ url('/spp') }}">Kembali</a>

          </form>
          
    </div>
@endsection