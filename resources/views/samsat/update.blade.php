@extends('welcome')

@section('JUDUL', 'Ubah Samsat')

@section('CONTENT')
<form action="/samsat/{{ $samsat->id }}" method="post">
    @csrf
    @method('PUT')
    <label for="kd_samsat" class="form-label">Kode Samsat</label>
    <input type="text" name="kd_samsat" placeholder="Masukkan Kode Samsat" class="form-control"
        value="{{ $samsat->kd_samsat }}">

    <label for="nama_samsat">Nama Samsat</label>
    <input type="text" name="nama_samsat" placeholder="Masukkan Nama Samsat" class="form-control"
        value="{{ $samsat->nama_samsat }}">

    <label for="kota">Kota</label>
    <input type="text" name="kota" placeholder="Masukkan Kota" class="form-control" value="{{ $samsat->kota }}">
    <button class="btn btn-primary mt-2">Ubah</button>
</form>
@endsection