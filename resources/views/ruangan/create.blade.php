@extends('welcome')

@section('JUDUL', 'Tambah Pengguna')
    
@section('CONTENT')
    <form action="/ruangan" method="post">
        @csrf
        <label for="nama_ruangan">Nama Ruangan</label>
        <input type="text" name="nama_ruangan" placeholder="masukkan Ruangan" class="form-control">
        <label for="status_ruangan">Status Ruangan</label>
        <input type="text" name="status_ruangan" placeholder="masukkan Status" class="form-control">
        <button class="btn btn-success mt-2">Simpan</button>
    </form>
@endsection