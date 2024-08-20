<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Dealer</title>
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
        <h1><u>Laporan Data Dealer</u></h1>
        <h5><u>Kantor Unit Pelayanan Pendapatan Daerah dan Samsat Banjarbaru</u></h5>
        <h6><u>Jl. Pangeran Suriansyah No. 9, Loktabat Utara, Kec. Banjarbaru Utara / 0511-4772-459</u></h6>
    </center>

    <table class="table table-bordered table-collapsed table-striped mt-3">
        <tr class="bg-info">
            <th>No.</th>
            <th>Nama Dealer</th>
        </tr>
        @foreach ($dealer as $index => $d)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $d->nama_dealer }}</td>
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