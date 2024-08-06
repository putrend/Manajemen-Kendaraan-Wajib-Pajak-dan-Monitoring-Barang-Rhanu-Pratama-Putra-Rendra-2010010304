@extends('welcome')

@section('JUDUL', 'Ubah Kategori')

@section('CONTENT')
    <form action="/kategori/{{ $kategori->id }}" method="post">
        @csrf
        @method('PUT')
        <label for="nama_kategori" class="form-label">Nama Kategori</label>
        <input type="text" name="nama_kategori" placeholder="masukkan Kategori" class="form-control" value="{{ $kategori->nama_kategori }}">
        <button class="btn btn-primary mt-2">Ubah</button>
    </form>
@endsection
