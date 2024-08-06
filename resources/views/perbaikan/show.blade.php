@extends('welcome')

@section('JUDUL', 'Lihat Status Perbaikan')

@section('CONTENT')
    <label class="form-label">Nama Barang</label>
    <input type="text" class="form-control" value="{{ $perbaikan->barang->nama_barang }}">
    <label class="form-label">Nama Ruangan</label>
    <input type="text" class="form-control" value="{{ $perbaikan->ruangan->nama_ruangan }}">
    <label class="form-label">Nama User</label>
    <input type="text" class="form-control" value="{{ $perbaikan->user->name }}">
    <label class="form-label">Jumlah Perbaikan</label>
    <input type="text" class="form-control" value="{{ $perbaikan->jumlah_perbaikan }}">
    <label class="form-label">Nama Perbaikan</label>
    <input type="text" class="form-control" value="{{ $perbaikan->nama_perbaikan }}">
    <label class="form-label">Lama Perbaikan</label>
    <input type="date" class="form-control" value="{{ $perbaikan->lama_selesai }}">
    <label class="form-label">Kondisi</label>
    <input type="text" class="form-control" value="{{ $perbaikan->kondisi }}">
    <a href="/barang" class="btn btn-danger mt-2">Kembali</a>
@endsection