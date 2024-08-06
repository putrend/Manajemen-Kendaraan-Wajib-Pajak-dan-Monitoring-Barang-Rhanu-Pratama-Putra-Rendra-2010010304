@extends('welcome')

@section('JUDUL', 'Tambah Kategori')
    
@section('CONTENT')
    <form action="/kategori" method="post">
        @csrf
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" name="nama_kategori" placeholder="masukkan Kategori" class="form-control">
        <button class="btn btn-success mt-2">Simpan</button>
    </form>
@endsection