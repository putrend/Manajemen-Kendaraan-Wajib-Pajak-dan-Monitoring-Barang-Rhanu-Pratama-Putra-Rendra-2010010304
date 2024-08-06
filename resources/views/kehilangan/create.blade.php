@extends('welcome')

@section('JUDUL', 'Tambah kehilangan')

@section('CONTENT')
    <form action="/kehilangan" method="post">
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
    <label for="tanggal_kehilangan">Tanggal Hilang</label>
    <input type="date" name="tanggal_kehilangan" placeholder="Masukkan Tanggal Hilang" class="form-control">
    <label for="keterangan">Keterangan</label>
    <input type="text" name="keterangan" placeholder="Masukkan keterangan" class="form-control">
    <button class="btn btn-success mt-2">Simpan</button>
    </form>
@endsection