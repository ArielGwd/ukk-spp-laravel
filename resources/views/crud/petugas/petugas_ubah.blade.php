@extends('layout.layout')

@section('content')
    <div class="container">
      <h2><i class="fa-solid fa-pen-to-square"></i> Ubah Data Petugas</h2>
        <form action="{{ route('update.petugas', $petugas->id_petugas) }}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" name="username" value="{{ $petugas->username }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Petugas</label>
              <input type="text" name="nama_petugas" value="{{ $petugas->nama_petugas }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Petugas">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password <span class="text-danger">* isi apabila ingin di ubah</span></label>
              <input type="password" name="password" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password ****">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Pilih Level</label>
                <select name="level" class="form-select form-control" aria-label="Default select example">
                    <option value=""> -- Pilih Level --  </option>
                    <option value="Admin" {{ $petugas->level != "admin" ?: "selected"}}>Admin</option>
                    <option value="Petugas" {{ $petugas->level != "petugas" ?: "selected" }}>Petugas</option>
                  </select>
            </div>
            
          
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-up-right-from-square"></i> Ubah</button>
            <a class="btn btn-secondary" href="{{ url('/petugas') }}">Kembali</a>
          </form>
          
    </div>
@endsection