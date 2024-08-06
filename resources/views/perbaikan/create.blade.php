@extends('welcome')

@section('JUDUL', 'Tambah perbaikan')

@section('CONTENT')
    <form action="/perbaikan" method="post">
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
    <label for="jumlah_perbaikan">Jumlah Perbaikan</label>
    <input type="number" name="jumlah_perbaikan" placeholder="Masukkan Jumlah Perbaikan" class="form-control">
    <label for="nama_perbaikan">Nama Perbaikan</label>
    <input type="text" name="nama_perbaikan" placeholder="Masukkan keterangan" class="form-control">
    <label for="lama_selesai">Lama Selesai</label>
    <input type="date" name="lama_selesai" placeholder="Masukkan keterangan" class="form-control">
    <label for="kondisi">Kondisi</label>
    <input type="text" name="kondisi" placeholder="Masukkan kondisi" class="form-control">
    <button class="btn btn-success mt-2">Simpan</button>
    </form>
@endsection