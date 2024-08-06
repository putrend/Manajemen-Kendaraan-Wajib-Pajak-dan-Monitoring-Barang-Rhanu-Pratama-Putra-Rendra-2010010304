@extends('welcome')

@section('JUDUL', 'Lihat Barang')

@section('CONTENT')
    <label class="form-label">Nama Barang</label>
    <input type="text" class="form-control" value="{{ $barang->nama_barang }}">
    <label class="form-label">Merk</label>
    <input type="text" class="form-control" value="{{ $barang->merk_barang }}">
    <label class="form-label">nama Merk</label>
    <input type="text" class="form-control" value="{{ $barang->nama_merk }}">
    <label class="form-label">Biaya</label>
    <input type="text" class="form-control" value="{{ $barang->biaya }}">
    <label class="form-label">Kategori</label>
    <input type="text" class="form-control" value="{{ $barang->kategori->nama_kategori }}">
    <label class="form-label">Detail</label>
    <input type="text" class="form-control" value="{{ $barang->detail_barang }}">
    <label class="form-label">Jumlah Barang</label>
    <input type="text" class="form-control" value="{{ $barang->jumlah_barang }}">
    <label class="form-label">Total</label>
    <input type="text" class="form-control" value="{{ $barang->harga_total }}">
    <a href="/barang" class="btn btn-danger mt-2">Kembali</a>
@endsection