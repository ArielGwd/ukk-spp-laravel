@extends('layout.layout')

@section('content')
    <div class="container">
      <h2><i class="fa-solid fa-square-plus"></i> Tambah Data Siswa</h2>
      <div class="card">
        <div class="card-body">
          <form action="{{ route('create.siswa') }}" method="post">
            @include('crud.alert.alert')
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">NISN</label>
                <input type="number" name="nisn" value="{{ Session::get('nisn') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="NISN: 1234567891">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">NIS</label>
                <input type="number" name="nis" value="{{ Session::get('nis') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="NIS: 12345678">
              </div>
  
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Siswa</label>
                <input type="text" name="nama" value="{{ Session::get('nama') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Putin Dhoe">
              </div>
  
              <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Password: ****">
              </div>
  
              <div class="form-group">
                <label for="exampleInputEmail1">Kelas</label>
                <select name="kelas" class="form-select form-control" aria-label="Default select example" required>
                  <option > -- Pilih Kelas --  </option>
                  @foreach ($kelas as $data)
                  <option value="{{ $data->id_kelas }}">  {{ $data->nama_kelas }} </option>                  
                  @endforeach
                </select>        
              </div>
  
              <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Alamat">
              </div>
  
              <div class="form-group">
                <label for="exampleInputEmail1">No Telepon</label>
                <input type="number" name="no_telp" value="{{ Session::get('no_telp') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="No telepon: 123456789123">
              </div>
            
              <button type="submit" class="btn btn-success"><i class="fa-solid fa-arrow-up-right-from-square"></i> Tambah</button>
              <a class="btn btn-secondary" href="{{ url('/siswa') }}">Kembali</a>
  
            </form>
        </div>
      </div>      
    </div>
@endsection