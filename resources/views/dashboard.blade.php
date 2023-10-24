@extends('layout.layout')

@section('content')
    <!-- Page Heading -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <div class="card">
            <div class="card-body text-dark">
                @if (Str::length(Auth::guard('pelajar')->user()) > 0)
                    <h4>hallo selamat datang, {{ Auth::guard('pelajar')->user()->nama }}</h4>
                    <h6>Sebagai: <b>Siswa</b></h6>
                    <h6>Kelas : <b>{{ Auth::guard('pelajar')->user()->kelas->nama_kelas }}</b></h6>
                @endif

                @if (Str::length(Auth::guard('admin')->user()) > 0)
                    <h4>hallo selamat datang, {{ Auth::guard('admin')->user()->nama_petugas }}</h4>
                    <p>Level Anda: {{ Auth::guard('admin')->user()->level }}</p>
                @endif
            </div>
        </div>
    </div>

    {{-- <div class="container-fluid">
	<div class="card">
		<div class="card-body text-dark table-responsive">
			<table>
                <tr>
                    <td class="pr-5">Jumlah Siswa</td>
                    <td>:</td>
                    <td>{{ $siswa->count() }}</td>    
                </tr>
                
                <tr>
                    <td class="pr-5">Jumlah Kelas</td>
                    <td>:</td>
                    <td>{{ $kelas->count() }}</td>    
                </tr>
            </table>
		</div>
	</div>
</div> --}}

    @if (Str::length(Auth::guard('pelajar')->user()) > 0)
        <div class="container-fluid">
            <!-- DataTales Example -->
            <h4 class="h5 mt-5 text-gray-800">History Transaksi</h4>
            <div class="card shadow mb-4">
                <div class="card-body">
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
                                @if (Str::length(Auth::guard('pelajar')->user()) > 0)
                                    @foreach ($pembayaran as $i => $data)
                                        @if (Auth::guard('pelajar')->user()->nisn == $data->nisn)
                                            <tr>
                                                <td>{{ $data->petugas->nama_petugas }}</td>
                                                <td>{{ $data->siswa->nama }}</td>
                                                <td>{{ $data->tgl_bayar }}</td>
                                                <td>{{ $data->bulan_bayar }} </td>
                                                <td>{{ $data->tahun_bayar }}</td>
                                                <td>{{ $data->spp->tahun }} - Rp.
                                                    {{ number_format($data->spp->nominal, 0, ',', '.') }}
                                                </td>
                                                <td>Rp. {{ number_format($data->jumlah_bayar, 0, ',', '.') }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
