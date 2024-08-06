@extends('welcome')

@section('JUDUL', 'Lihat Barang Keluar')

@section('CONTENT')
    <label class="form-label">Nama Barang</label>
    <input type="text" class="form-control" value="{{ $barangkeluar->barang->nama_barang }}">
    <label class="form-label">Ruangan</label>
    <input type="text" class="form-control" value="{{ $barangkeluar->ruangan->nama_ruangan }}">
    <label class="form-label">User</label>
    <input type="text" class="form-control" value="{{ $barangkeluar->user->name }}">
    <label class="form-label">Jumlah Barang Keluar</label>
    <input type="text" class="form-control" value="{{ $barangkeluar->jumlah_keluar }}">
    <label class="form-label">Tanggal Barang Keluar</label>
    <input type="text" class="form-control" value="{{ $barangkeluar->tanggal_keluar }}">
    <a href="/barang" class="btn btn-danger mt-2">Kembali</a>
@endsection