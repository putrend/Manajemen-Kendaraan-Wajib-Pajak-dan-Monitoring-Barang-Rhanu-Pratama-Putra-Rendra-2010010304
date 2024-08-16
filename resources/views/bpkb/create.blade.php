@extends('welcome')

@section('JUDUL', 'Tambah BPKB')

@section('CONTENT')
@if (session('fail_create'))
<div id="fail_create"></div>
@endif

<form action="/bpkb" method="post">
    @csrf

    <label for="wajib_pajak_id" class="form-label">Nama Pemilik</label>
    <select name="wajib_pajak_id" class="form-select" required>
        <option value="">--Pilih Wajib Pajak--</option>
        @foreach ($wajibpajak as $wp)
        <option value="{{ $wp->id }}">{{ $wp->nama_wp }}</option>
        @endforeach
    </select>

    <label for="no_bpkb">Nomor BPKB</label>
    <input type="number" name="no_bpkb" placeholder="Masukkan Nomor BPKB" class="form-control" required>

    <label for="no_polisi">Nomor Polisi (Masukkan Hanya Angka, MAX : 4 Nomor)</label>
    <input type="number" name="no_polisi" placeholder="Masukkan Nomor Polisi" class="form-control" required>

    <label for="kendaraan_id" class="form-label">Kendaraan</label>
    <select name="kendaraan_id" class="form-select" required>
        <option value="">--Pilih Kendaraan--</option>
        @foreach ($kendaraan as $k)
        <option value="{{ $k->id }}">{{ $k->nama_kendaraan }}</option>
        @endforeach
    </select>

    <label for="samsat_awal_id" class="form-label">Lokasi Pembuatan</label>
    <select name="samsat_awal_id" class="form-select" required>
        <option value="">--Pilih Samsat--</option>
        @foreach ($samsat as $s)
        <option value="{{ $s->id }}">{{ $s->nama_samsat }}</option>
        @endforeach
    </select>

    <label for="pajak">Pajak</label>
    <input type="number" name="pajak" id="pajak" class="form-control" placeholder="Masukkan Pajak" required>

    <label for="keterangan">Keterangan</label>
    <textarea name="keterangan" id="keterangan" cols="30" rows="5" placeholder="Masukkan Keterangan"
        class="form-control" required></textarea>

    <button class="btn btn-success mt-2">Simpan</button>
</form>
@endsection