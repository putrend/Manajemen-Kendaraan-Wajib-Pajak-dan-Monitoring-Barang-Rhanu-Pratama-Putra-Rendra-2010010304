@extends('welcome')

@section('JUDUL', 'Lihat Ruangan')

@section('CONTENT')
        <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
        <input type="text" name="nama_ruangan" placeholder="masukkan Ruangan" class="form-control" value="{{ $ruangan->nama_ruangan }}">
        <label for="status_ruangan">Status Ruangan</label>
        <input type="text" name="status_ruangan" placeholder="masukkan Status" class="form-control" value="{{ $ruangan->status_ruangan }}">
        <a href="/ruangan" class="btn btn-danger mt-2">Kembali</a>
@endsection
