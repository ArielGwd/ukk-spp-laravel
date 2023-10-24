@extends('layout.layout')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
	<h4 class="h5 mt-5 text-gray-800">History Transaksi</h4>
    <div class="card shadow mb-4">
        <div class="card-body">
            <a class="mb-3 btn btn-warning" href="{{ url('/laporan/generate') }}"><i class="fa-solid fa-print"></i> Generate Laporan</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama petugas</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Bayar</th>
                            <th>Bulan Bayar</th>
                            <th>Tahun Bayar</th>
                            <th>SPP</th>
                            <th>Jumlah Bayar</th>
                            
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($pembayaran as $i => $data)
                        <tr>
                            <td>{{ $data->petugas->nama_petugas }}</td>
                            <td>{{ $data->siswa->nama }}</td>
                            <td>{{ $data->tgl_bayar }}</td>
                            <td>{{ $data->bulan_bayar }} </td>
                            <td>{{ $data->tahun_bayar }}</td>
                            <td>{{ $data->spp->tahun }} - Rp. {{ number_format($data->spp->nominal, 0, ',', '.') }}</td>
                            <td>{{ $data->spp->tahun }}</td>
                        </tr>
                        @endforeach
                        
                                                                                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection