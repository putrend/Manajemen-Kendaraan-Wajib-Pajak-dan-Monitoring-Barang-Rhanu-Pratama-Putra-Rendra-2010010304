@extends('welcome')

@section('JUDUL', 'Tambah Mutasi Baru')

@section('CONTENT')
@if (session('fail_create'))
<div id="fail_create"></div>
@endif
<form action="/mutasi" method="post">
    @csrf
    <label for="bpkb_id" class="form-label">BPKB</label>
    <select name="bpkb_id" class="form-select">
        <option value="">--Pilih BPKB--</option>
        @foreach ($bpkb as $b)
        <option value="{{ $b->id }}">{{ $b->no_bpkb }}</option>
        @endforeach
    </select>

    <label for="samsat_tujuan_id" class="form-label">Samsat Tujuan</label>
    <select name="samsat_tujuan_id" class="form-select">
        <option value="">--Pilih Samsat Tujuan--</option>
        @foreach ($samsat as $s)
        <option value="{{ $s->id }}">{{ $s->nama_samsat }}</option>
        @endforeach
    </select>

    @if (Auth::guard('web')->check())
    <label for="wajib_pajak_id" class="form-label">Wajib Pajak</label>
    <select name="wajib_pajak_id" class="form-select">
        <option value="">--Pilih Wajib Pajak--</option>
        @foreach ($wajibpajak as $wp)
        <option value="{{ $wp->id }}">{{ $wp->nama_wp }}</option>
        @endforeach
    </select>
    @elseif (Auth::guard('wajibpajak')->check())
    <input type="hidden" name="wajib_pajak_id" value="{{ Auth::guard('wajibpajak')->user()->id }}">
    @endif

    <label for="no_polisi_baru">Nomor Polisi Baru (Masukkan Hanya Angka, MAX : 4 Nomor)</label>
    <input type="number" name="no_polisi_baru" placeholder="Masukkan Nomor Polisi Baru" class="form-control">

    <label for="keterangan">Keterangan</label>
    <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"
        placeholder="Masukkan Keterangan (Tidak Wajib)"></textarea>

    <button class="btn btn-success mt-2">Simpan</button>
</form>
@endsection