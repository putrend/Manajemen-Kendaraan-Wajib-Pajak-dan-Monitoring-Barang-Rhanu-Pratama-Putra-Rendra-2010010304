@extends('welcome')

@section('JUDUL', 'Tambah Samsat')

@section('CONTENT')
<form action="/samsat" method="post">
    @csrf
    <label for="kd_samsat">Kode Samsat</label>
    <input type="text" name="kd_samsat" placeholder="Masukkan Kode Samsat" class="form-control">
    <label for="nama_samsat">Nama Samsat</label>
    <input type="text" name="nama_samsat" placeholder="Masukkan Nama Samsat" class="form-control">
    <label for="kota">Kota</label>
    <input type="text" name="kota" placeholder="Masukkan Kota" class="form-control">
    <button class="btn btn-success mt-2">Simpan</button>
</form>
@endsection