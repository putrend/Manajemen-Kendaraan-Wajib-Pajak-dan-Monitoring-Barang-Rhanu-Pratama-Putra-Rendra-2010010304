<!DOCTYPE html>
<html>

<head>
    <title>Notifikasi Mutasi Dibatalkan</title>
</head>

<body>
    <h1>Notifikasi Mutasi Dibatalkan</h1>
    <p>Halo {{ $mutasi->wajib_pajak->nama_wp }} !</p>
    <p>Mutasi dengan No Polisi {{ $mutasi->no_pol_lama }} menjadi {{ $mutasi->no_pol_baru }} telah dibatalkan.
    </p>
    <p>Proses pembatalan dilakukan pada kendaraan {{ $mutasi->bpkb->kendaraan->nama_kendaraan }} dengan ID BPKB {{
        $mutasi->bpkb_id }}.
    </p>
    <br>
    <p>Silahkan segera datang ke {{ $mutasi->samsat_tujuan->nama_samsat }} untuk mengetahui informasi selanjutnya.</p>
    <p>Terima kasih !</p>
</body>

</html>