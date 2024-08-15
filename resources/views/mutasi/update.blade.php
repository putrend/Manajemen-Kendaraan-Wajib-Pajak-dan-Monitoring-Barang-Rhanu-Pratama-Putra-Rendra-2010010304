@extends('welcome')

@section('JUDUL', 'Ubah Mutasi')

@section('CONTENT')
@if (session('fail_edit'))
<div id="fail_edit"></div>
@endif
<form action="/mutasi/{{ $mutasi->id }}" method="post">
    @csrf
    @method('PUT')
    <label for="bpkb_id" class="form-label">BPKB</label>
    <select name="bpkb_id" class="form-select" disabled>
        <option value="">--Pilih BPKB--</option>
        <option value="{{ $mutasi->bpkb_id }}" selected>{{ $mutasi->bpkb->no_bpkb }}</option>
        @foreach ($bpkb as $b)
        <option value="{{ $b->id }}">{{ $b->no_bpkb }}</option>
        @endforeach
    </select>

    <label for="samsat_tujuan_id" class="form-label">Samsat Tujuan</label>
    <select name="samsat_tujuan_id" class="form-select">
        <option value="">--Pilih Samsat Tujuan--</option>
        @foreach ($samsat as $s)
        @php
        $selected = $s->id == $mutasi->samsat_tujuan_id ? 'selected' : '';
        @endphp
        <option value="{{ $s->id }}" {{ $selected }}>{{ $s->nama_samsat }}</option>
        @endforeach
    </select>

    @if (Auth::guard('web')->check())
    <label for="wajib_pajak_id" class="form-label">Wajib Pajak</label>
    <select name="wajib_pajak_id" class="form-select">
        <option value="">--Pilih Wajib Pajak--</option>
        @foreach ($wajibpajak as $wp)
        @php
        $selected = $wp->id == $mutasi->wajib_pajak_id ? 'selected' : '';
        @endphp
        <option value="{{ $wp->id }}" {{ $selected }}>{{ $wp->nama_wp }}</option>
        @endforeach
    </select>
    @elseif (Auth::guard('wajibpajak')->check())
    <input type="hidden" name="wajib_pajak_id" value="{{ Auth::guard('wajibpajak')->user()->id }}">
    @endif

    {{-- Get Only Number From No Polisi --}}
    <?php $no_polisi = Str::between($mutasi->no_pol_baru, 'DA ', ' ' . $mutasi->samsat_tujuan->kd_samsat); ?>
    <label for="no_polisi_baru">Nomor Polisi Baru (Masukkan Hanya Angka, MAX : 4 Nomor)</label>
    <input type="number" name="no_polisi_baru" placeholder="Masukkan Nomor Polisi Baru" class="form-control"
        value="{{ $no_polisi }}">

    <label for="keterangan">Keterangan</label>
    <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"
        placeholder="Masukkan Keterangan (Tidak Wajib)">{{ $mutasi->keterangan }}</textarea>

    <button class="btn btn-success mt-2">Simpan</button>
</form>
@endsection