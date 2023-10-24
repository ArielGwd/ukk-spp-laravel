@extends('layout.layout')

@section('content')
    <div class="container">
      <h2><i class="fa-solid fa-square-plus"></i> Tambah Transaksi</h2>
        <form action="{{ route('transaksi') }}" method="post">
            @include('crud.alert.alert')
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Siswa</label>
              <select name="nama_siswa" class="form-select form-control" aria-label="Default select example" required>
                <option > -- Pilih Siswa --  </option>
                @foreach ($siswa as $data)
                <option value="{{ $data->nisn }}">  {{ $data->nama }} - {{ $data->kelas->nama_kelas }} </option>                  
                @endforeach
              </select>    
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Tanggal Bayar</label>
              <input type="date" name="tanggal_bayar" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Putin Dhoe">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Bulan Bayar</label>
              <input type="text" name="bulan_bayar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Bulan Dibayar: Januari">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Tahun Bayar</label>
              <input type="number" name="tahun_bayar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Tahun Dibayar: 1951">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">SPP</label>
              <select name="spp" class="form-select form-control" aria-label="Default select example" required>
                <option > -- Pilih SPP --  </option>
                @foreach ($spp as $data)
                <option value="{{ $data->id_spp }}"> Tahun {{ $data->tahun }} - Rp. {{ number_format($data->nominal, 0, ',', '.') }} </option>                  
                @endforeach
              </select>        
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Jumlah Bayar</label>
              <input type="number" name="jumlah_bayar" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="No telepon: 123456789123">
            </div>
          
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-arrow-up-right-from-square"></i> Tambah</button>
            <a class="btn btn-secondary" href="{{ url('/') }}">Kembali</a>

          </form>
          
    </div>
@endsection