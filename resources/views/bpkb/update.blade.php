@extends('welcome')

@section('JUDUL', 'Ubah BPKB')

@section('CONTENT')
@if (session('fail_edit'))
<div id="fail_edit"></div>
@endif

<form action="/bpkb/{{ $bpkb->id }}" method="post">
    @csrf
    @method('PUT')
    <label for="wajib_pajak_id" class="form-label">Nama Pemilik</label>
    <input type="text" name="wajib_pajak_id" id="wajib_pajak_id" class="form-control" required
        value="{{ $bpkb->wajib_pajak->nama_wp }}" readonly>

    <label for="no_bpkb">Nomor BPKB</label>
    <input type="number" name="no_bpkb" placeholder="Masukkan Nomor BPKB" class="form-control" required
        value="{{ $bpkb->no_bpkb }}">

    {{-- Get Only Number From No Polisi --}}
    <?php $no_polisi = Str::between($bpkb->no_polisi, 'DA ', ' '.$bpkb->samsat_sekarang->kd_samsat); ?>
    <label for="no_polisi">Nomor Polisi (Masukkan Hanya Angka, MAX : 4 Nomor)</label>
    <input type="text" name="no_polisi" placeholder="Masukkan Nomor Polisi" class="form-control" required
        value="{{ $no_polisi }}">

    <label for="kendaraan_id" class="form-label">Kendaraan</label>
    <input type="text" name="kendaraan_id" id="kendaraan_id" class="form-control" required
        value="{{ $bpkb->kendaraan->nama_kendaraan }}" readonly>

    <label for="samsat_awal_id" class="form-label">Lokasi Pembuatan</label>
    <input type="text" name="samsat_awal_id" id="samsat_awal_id" class="form-control" required
        value="{{ $bpkb->samsat_awal->nama_samsat }}" readonly>

    <label for="pajak">Pajak</label>
    <input type="number" name="pajak" placeholder="Masukkan Pajak" class="form-control" required
        value="{{ $bpkb->pajak }}">

    <label for="keterangan">Keterangan</label>
    <textarea name="keterangan" id="keterangan" cols="30" rows="5" placeholder="Masukkan Keterangan"
        class="form-control">{{ $bpkb->keterangan }}</textarea>

    <button class="btn btn-success mt-2">Simpan</button>
</form>
@endsection