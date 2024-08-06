@extends('welcome')

@section('JUDUL', 'Ubah Ruangan')

@section('CONTENT')
    <form action="/ruangan/{{ $ruangan->id }}" method="post">
        @csrf
        @method('PUT')
        <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
        <input type="text" name="nama_ruangan" placeholder="masukkan Ruangan" class="form-control" value="{{ $ruangan->nama_ruangan }}">
        <label for="status_ruangan">Status Ruangan</label>
        <input type="text" name="status_ruangan" placeholder="masukkan Status" class="form-control"
            value="{{ $ruangan->status_ruangan }}">
        <button class="btn btn-primary mt-2">Ubah</button>
    </form>
@endsection
