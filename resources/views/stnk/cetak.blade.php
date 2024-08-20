<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data STNK</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-x0olHFLEh87PJGoPKLV1IbcEPTNtaed22xpHsDESMhqlYddBnLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        table tr th,
        table tr td {
            font-size: 9pt
        }
    </style>
</head>

<body>
    <img src="dist/img/kalselprovlogo.png" height="50px" width="50px" class="img-square ml-5" alt="Logo Image">
    <center>
        <h1><u>Laporan Data STNK</u></h1>
        <h5><u>Kantor Unit Pelayanan Pendapatan Daerah dan Samsat Banjarbaru</u></h5>
        <h6><u>Jl. Pangeran Suriansyah No. 9, Loktabat Utara, Kec. Banjarbaru Utara / 0511-4772-459</u></h6>
    </center>

    <table class="table table-bordered table-collapsed table-striped mt-3">
        <tr class="bg-info">
            <th>No.</th>
            <th>Pemilik STNK</th>
            <th>Nomor STNK</th>
            <th>Warna TNKB</th>
            <th>Kode Lokasi</th>
            <th>Masa Berlaku STNK</th>
            <th>Masa Berlaku TNKB</th>
            <th>Tanggal Dibuat</th>
        </tr>
        @foreach ($stnk as $index => $s)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $s->bpkb->wajib_pajak->nama_wp }}</td>
            <td>{{ $s->no_stnk }}</td>
            <td>{{ $s->warna_tnkb }}</td>
            <td>{{ $s->kode_lokasi }}</td>
            <td>{{ $s->masa_berlaku_stnk }}</td>
            <td>{{ $s->masa_berlaku_tnkb }}</td>
            <td>{{ $s->tgl_buat }}</td>
        </tr>
        @endforeach
    </table>
    <div class="row mr-2">
        <div class="signature-space float-right">
            <?php setlocale(LC_ALL, 'IND'); ?>
            <p><u>Banjarbaru, {{ \Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</u></p>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="signature-space float-right">
            <p><u>Mas Admin</u></p>
        </div>
    </div>
</body>

</html>