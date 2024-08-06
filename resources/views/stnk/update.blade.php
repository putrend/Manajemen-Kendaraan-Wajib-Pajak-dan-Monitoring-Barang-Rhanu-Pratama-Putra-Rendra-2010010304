@extends('welcome')

@section('JUDUL', 'Ubah STNK')

@section('CONTENT')
@if (session('fail_edit'))
<div id="fail_edit"></div>
@endif

<form action="/stnk/{{ $stnk->id }}" method="post">
    @csrf
    @method('PUT')

    <label for="no_stnk">Nomor STNK</label>
    <input type="text" name="no_stnk" placeholder="Masukkan Nomor STNK" class="form-control"
        value="{{ $stnk->no_stnk }}">

    <label for="bpkb_id" class="form-label">BPKB</label>
    <select name="bpkb_id" class="form-select">
        <option value="">--Pilih BPKB--</option>
        <option value="{{ $stnk->bpkb_id }}" selected>{{ $stnk->bpkb->no_bpkb }}</option>
        @foreach ($bpkb as $b)
        <option value="{{ $b->id }}">{{ $b->no_bpkb }}</option>
        @endforeach
    </select>

    <label for="warna_tnkb">Warna TNKB</label>
    <input type="text" name="warna_tnkb" placeholder="Masukkan Warna TNKB" class="form-control"
        value="{{ $stnk->warna_tnkb }}">

    <button class="btn btn-success mt-2">Simpan</button>

    <p class="mt-5">Catatan: Masa Berlaku STNK dan TNKB Otomatis Terbuat Selama 5 Tahun Sesaat Setelah STNK Dibuat.</p>
</form>
@endsection