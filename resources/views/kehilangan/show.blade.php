@extends('welcome')

@section('JUDUL', 'Lihat Status Kehilangan')

@section('CONTENT')
    <label class="form-label">Nama Barang</label>
    <input type="text" class="form-control" value="{{ $kehilangan->barang->nama_barang }}">
    <label class="form-label">Nama Ruangan</label>
    <input type="text" class="form-control" value="{{ $kehilangan->ruangan->nama_ruangan }}">
    <label class="form-label">Nama User</label>
    <input type="text" class="form-control" value="{{ $kehilangan->user->name }}">
    <label class="form-label">Tanggal Hilang</label>
    <input type="text" class="form-control" value="{{ $kehilangan->tanggal_kehilangan }}">
    <label class="form-label">Keterangan</label>
    <input type="text" class="form-control" value="{{ $kehilangan->keterangan }}">
    <a href="/barang" class="btn btn-danger mt-2">Kembali</a>
@endsection