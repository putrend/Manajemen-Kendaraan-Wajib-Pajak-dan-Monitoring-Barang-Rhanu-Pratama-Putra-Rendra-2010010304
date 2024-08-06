@extends('welcome')

@section('JUDUL', 'Tambah Kendaraan Baru')

@section('CONTENT')
@if (session('fail_create'))
<div id="fail_create"></div>
@endif
<form action="/kendaraan" method="post">
    @csrf
    <label for="nama_kendaraan">Nama Kendaraan</label>
    <input type="text" name="nama_kendaraan" placeholder="Masukkan Nama Kendaraan" required class="form-control">

    <label for="jenis">Jenis Motor</label>
    <input type="text" name="jenis" placeholder="Masukkan Jenis Motor" required class="form-control">

    <div class="row">
        <div class="col-6">
            <label for="no_rangka">Nomor Rangka</label>
            <input type="text" name="no_rangka" placeholder="Masukkan Nomor Rangka" required class="form-control">
        </div>

        <div class="col-6">
            <label for="no_mesin">Nomor Mesin</label>
            <input type="text" name="no_mesin" placeholder="Masukkan Nomor Mesin" required class="form-control">
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <label for="warna">Warna Motor</label>
            <input type="text" name="warna" placeholder="Masukkan Warna Motor" required class="form-control">
        </div>

        <div class="col-6">
            <label for="kondisi">Kondisi Motor</label>
            <input type="text" name="kondisi" placeholder="Masukkan Kondisi Motor" required class="form-control">
        </div>
    </div>

    <label for="merk">Merk Motor</label>
    <input type="text" name="merk" placeholder="Masukkan Merk Motor" required class="form-control">

    <label for="model">Model Motor</label>
    <input type="text" name="model" placeholder="Masukkan Model Motor" required class="form-control">

    <label for="isi_silinder">Isi Silinder</label>
    <input type="text" name="isi_silinder" placeholder="Masukkan Isi Silinder" required class="form-control">


    <label for="dealer_id" class="form-label">Nama Dealer</label>
    <select name="dealer_id" class="form-select">
        <option value="">--Pilih Dealer--</option>
        @foreach ($dealer as $d)
        <option value="{{ $d->id }}">{{ $d->nama_dealer }}</option>
        @endforeach
    </select>

    <button class="btn btn-success mt-2">Simpan</button>
</form>
@endsection