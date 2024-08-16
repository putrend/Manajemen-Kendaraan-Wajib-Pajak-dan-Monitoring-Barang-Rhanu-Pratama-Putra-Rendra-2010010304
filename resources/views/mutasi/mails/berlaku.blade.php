<!DOCTYPE html>
<html>

<head>
    <title>Notifikasi Mutasi Berlaku</title>
</head>

<body>
    <h1>Notifikasi Mutasi Berlaku</h1>
    <p>Halo {{ $mutasi->wajib_pajak->nama_wp }} !</p>
    <p>Mutasi dengan No Polisi {{ $mutasi->no_pol_lama }} menjadi {{ $mutasi->no_pol_baru }} telah diberlakukan.
    </p>
    <p>Berlaku untuk kendaraan {{ $mutasi->bpkb->kendaraan->nama_kendaraan }} dengan ID BPKB {{ $mutasi->bpkb_id }}.</p>
    <br>
    <p>Silahkan segera datang ke {{ $mutasi->samsat_tujuan->nama_samsat }} untuk membayar biaya mutasi sebesar Rp. {{
        number_format($mutasi->biaya, 2) }}.</p>
    <p>Terima kasih !</p>
</body>

</html>