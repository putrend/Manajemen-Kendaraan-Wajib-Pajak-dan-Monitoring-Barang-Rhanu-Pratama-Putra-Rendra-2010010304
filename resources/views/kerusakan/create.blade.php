@extends('welcome')

@section('JUDUL', 'Tambah Kerusakan')

@section('CONTENT')
    <form action="/kerusakan" method="post">
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
    <label for="jumlah_rusak">Jumlah Rusak</label>
    <input type="number" name="jumlah_rusak" placeholder="Masukkan Jumlah Rusak" class="form-control">
    <div>
        <label for="penanganan">Penanganan</label>
        <select name="penanganan" id="penanganan" class="form-select">
            <option value="perbaikan">Perbaikan</option>
            <option value="rusak_total">Rusak Total</option>
        </select>
    </div>
    <label for="keterangan">Keterangan</label>
    <input type="text" name="keterangan" placeholder="Masukkan Keterangan" class="form-control">
    <label for="kondisi">Kondisi</label>
    <input type="text" name="kondisi" placeholder="Masukkan kondisi" class="form-control">
    <button class="btn btn-success mt-2">Simpan</button>
    </form>
@endsection