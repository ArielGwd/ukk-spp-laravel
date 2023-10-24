@extends('layout.layout')

@section('content')            
<!-- Begin Page Content -->
<div class="container-fluid">
    <h2>Data Siswa</h2>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="{{ url('/siswa/tambah') }}"><i class="fa-solid fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>No telepon</th>
                            @if (Auth::guard('admin')->user()->level == "admin")
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($siswa as $i => $data)
                        <tr>
                            <td>{{ $data->nisn }}</td>
                            <td>{{ $data->nis }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->kelas->nama_kelas }} </td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->no_telp }}</td>

                            @if (Auth::guard('admin')->user()->level == "admin")
                            <td>
                                <a href="{{ url('/siswa/ubah/'. $data->nisn ) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Ubah</a>
                                <a href="#" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Hapus</a>
                                
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Pilih "Hapus" untuk mengahapus sebuah data.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                
                                                <a class="btn btn-danger" href="{{ url('/siswa/hapus/'.$data->nisn) }}"><i class="fa-solid fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            @endif
                            
                        </tr>
                        @endforeach
                        
                                                                                
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection