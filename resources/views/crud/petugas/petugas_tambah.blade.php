@extends('layout.layout')

@section('content')
    <div class="container">
      <h2><i class="fa-solid fa-square-plus"></i> Tambah Data Petugas</h2>
        <form action="{{ route('create.petugas') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Petugas</label>
              <input type="text" name="nama_petugas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Petugas">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password ****">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Pilih Level</label>
                <select name="level" class="form-select form-control" aria-label="Default select example">
                    <option > -- Pilih Level --  </option>
                    <option value="Admin">Admin</option>
                    <option value="Petugas">Petugas</option>
                  </select>
            </div>           
          
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-arrow-up-right-from-square"></i> Tambah</button>
            <a class="btn btn-secondary" href="{{ url('/petugas') }}">Kembali</a>

          </form>
          
    </div>
@endsection