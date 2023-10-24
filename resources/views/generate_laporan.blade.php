<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generate Laporan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style type="text/css">
        .center h1 {
            text-align: center;
        }

        .center tr td {
            text-align: center;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="center">
        <h1><i class="fa-solid fa-book rotate-n-15"></i> Laporan Entri Pembayaran</h1>
        <div class="nama">
        </div>
        <table border="1" align="center">
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

</body>

</html>
