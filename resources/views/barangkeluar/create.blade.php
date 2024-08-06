@extends('welcome')

@section('JUDUL', 'Tambah Barang Keluar')

@section('CONTENT')
    @if (session('fail_create'))
        <div id="fail_create"></div>
    @endif
    <form action="/barangkeluar" method="post">
    @csrf
    <label for="barang_id" class="form-label">Nama Barang</label>
    <select name="barang_id" class="form-select">
        <option value="">--Pilih Barang--</option>
        @foreach ($barang as $b)
            <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
        @endforeach
    </select>
    <label for="ruangan_id" class="form-label">Nama Ruangan</label>
    <select name="ruangan_id" class="form-select">
        <option value="">--Pilih Ruangan--</option>
        @foreach ($ruangan as $r)
            <option value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>
        @endforeach
    </select>
    <label for="user_id" class="form-label">Nama User</label>
    <select name="user_id" class="form-select">
        <option value="">--Pilih User--</option>
        @foreach ($user as $u)
            <option value="{{ $u->id }}">{{ $u->name }}</option>
        @endforeach
    </select>
    <label for="jumlah_keluar">Jumlah Keluar</label>
    <input type="number" name="jumlah_keluar" placeholder="Masukkan Jumlah Keluar" class="form-control">
    <label for="tanggal_keluar">Tanggal Keluar</label>
    <input type="date" name="tanggal_keluar" placeholder="Masukkan Tanggal Keluar" class="form-control">
    <button class="btn btn-success mt-2">Simpan</button>
    </form>
@endsection