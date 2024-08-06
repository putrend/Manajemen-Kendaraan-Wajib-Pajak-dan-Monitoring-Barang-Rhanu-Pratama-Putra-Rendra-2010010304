@extends('welcome')

@section('JUDUL', 'Tambah Wajib Pajak')

@section('CONTENT')
<form action="/wajib-pajak" method="post">
    @csrf
    <label for="nama_wp" class="form-label">Nama Wajib Pajak</label>
    <input type="text" name="nama_wp" placeholder="Masukkan Nama Wajib Pajak" class="form-control" required>

    <label for="no_ktp">NO KTP</label>
    <input type="text" name="no_ktp" placeholder="Masukkan NO KTP" class="form-control" required>

    <label for="alamat">Alamat</label>
    <textarea name="alamat" id="alamat" cols="30" rows="5" placeholder="Masukkan Alamat" class="form-control"
        required></textarea>

    <label for="pekerjaan">Pekerjaan</label>
    <input type="text" name="pekerjaan" placeholder="Masukkan Pekerjaan" class="form-control" required>

    <label for="no_telp">No Telpon</label>
    <input type="number" name="no_telp" placeholder="Masukkan Nomor Telepon" class="form-control" required>

    <label for="email">Email</label>
    <input type="email" name="email" placeholder="Masukkan E-Mail" class="form-control">
    <button class="btn btn-success mt-2">Simpan</button>
</form>
@endsection