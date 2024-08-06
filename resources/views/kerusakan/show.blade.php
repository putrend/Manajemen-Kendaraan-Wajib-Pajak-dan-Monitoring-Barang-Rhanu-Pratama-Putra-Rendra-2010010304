@extends('welcome')

@section('JUDUL', 'Lihat Barang Keluar')

@section('CONTENT')
    <label class="form-label">Nama Barang</label>
    <input type="text" class="form-control" value="{{ $kerusakan->barang->nama_barang }}">
    <label class="form-label">Nama Ruangan</label>
    <input type="text" class="form-control" value="{{ $kerusakan->ruangan->nama_ruangan }}">
    <label class="form-label">Nama User</label>
    <input type="text" class="form-control" value="{{ $kerusakan->user->name }}">
    <label class="form-label">Jumlah Rusak</label>
    <input type="text" class="form-control" value="{{ $kerusakan->jumlah_rusak }}">
    <label class="form-label">Penanganan</label>
    <input type="text" class="form-control" value="{{ $kerusakan->penanganan }}">
    <label class="form-label">Keterangan</label>
    <input type="text" class="form-control" value="{{ $kerusakan->keterangan }}">
    <label class="form-label">Kondisi</label>
    <input type="text" class="form-control" value="{{ $kerusakan->kondisi }}">
    <a href="/barang" class="btn btn-danger mt-2">Kembali</a>
@endsection