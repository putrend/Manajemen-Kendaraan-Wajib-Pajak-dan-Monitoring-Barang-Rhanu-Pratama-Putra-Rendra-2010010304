@extends('welcome')

@section('JUDUL', 'Tambah dealer')

@section('CONTENT')
@if (session('fail_create'))
<div id="fail_create"></div>
@endif
<form action="/dealer" method="post">
    @csrf
    <label for="nama_dealer">Nama Dealer</label>
    <input type="text" name="nama_dealer" placeholder="Masukkan Nama Dealer" class="form-control">
    <button class="btn btn-success mt-2">Simpan</button>
</form>
@endsection