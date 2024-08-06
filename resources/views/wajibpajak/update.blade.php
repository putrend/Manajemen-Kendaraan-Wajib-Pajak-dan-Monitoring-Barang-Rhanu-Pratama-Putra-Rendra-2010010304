@extends('welcome')

@section('JUDUL', 'Ubah Wajib Pajak')

@section('CONTENT')
<form action="/wajib-pajak/{{ $wajibPajak->id }}" method="post">
    @csrf
    @method('PUT')
    <label for="nama_wp" class="form-label">Nama Wajib Pajak</label>
    <input type="text" name="nama_wp" placeholder="Masukkan Nama Wajib Pajak" class="form-control" required
        value="{{ $wajibPajak->nama_wp }}">

    <label for="no_ktp">NO KTP</label>
    <input type="text" name="no_ktp" placeholder="Masukkan NO KTP" class="form-control" required
        value="{{ $wajibPajak->no_ktp }}">

    <label for="alamat">Alamat</label>
    <textarea name="alamat" id="alamat" cols="30" rows="5" placeholder="Masukkan Alamat" class="form-control"
        required>{{ $wajibPajak->alamat }}</textarea>

    <label for="pekerjaan">Pekerjaan</label>
    <input type="text" name="pekerjaan" placeholder="Masukkan Pekerjaan" class="form-control" required
        value="{{ $wajibPajak->pekerjaan }}">

    <label for="no_telp">No Telpon</label>
    <input type="number" name="no_telp" placeholder="Masukkan Nomor Telepon" class="form-control" required
        value="{{ $wajibPajak->no_telp }}">

    <label for="email">Email</label>
    <input type="email" name="email" placeholder="Masukkan E-Mail" class="form-control"
        value="{{ $wajibPajak->email }}">
    <button class="btn btn-primary mt-2">Ubah</button>
</form>
@endsection