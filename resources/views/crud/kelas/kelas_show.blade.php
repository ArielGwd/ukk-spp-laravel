@extends('layout.layout')

@section('content')            
<!-- Begin Page Content -->
<div class="container-fluid">
    <h2>Data Kelas</h2>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="{{ url('/kelas/tambah') }}"><i class="fa-solid fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kelas</th>
                            <th>Kompetensi Keahlian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($kelas as $i => $data)
                        <tr>
                            <td>{{ $i+1 }} </td>
                            <td>{{ $data->nama_kelas }} </td>
                            <td>{{ $data->kompetensi_keahlian }}</td>
                            <td>
                                <a href="/kelas/ubah/{{ $data->id_kelas }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Ubah</a>
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
                                                
                                                <a class="btn btn-danger" href="/kelas/hapus/ {{ $data->id_kelas }}"><i class="fa-solid fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                                                                                
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection