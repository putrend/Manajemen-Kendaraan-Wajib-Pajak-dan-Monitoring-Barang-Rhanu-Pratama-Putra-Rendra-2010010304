@extends('welcome')

@section('JUDUL', 'Lihat Kategori')

@section('CONTENT')
        <label for="nama_kategori" class="form-label">Nama Kategori</label>
        <input type="text" name="nama_kategori" placeholder="masukkan Kategori" class="form-control" value="{{ $kategori->nama_kategori }}">
        <a href="/kategori" class="btn btn-danger mt-2">Kembali</a>
@endsection
