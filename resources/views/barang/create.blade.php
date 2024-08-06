@extends('welcome')

@section('JUDUL', 'Tambah Barang')

@section('CONTENT')
    <form action="/barang" method="post">
    @csrf
    <label for="nama_barang" class="form-label">Nama Barang</label>
    <input type="text" name="nama_barang" placeholder="masukkan Nama Barang" class="form-control">
    <label for="merk_barang" class="form-label">merk barang</label>
    <input type="text" name="merk_barang" placeholder="masukkan merk_barang" class="form-control">
    <label for="nama_merk" class="form-label">nama merk</label>
    <input type="text" name="nama_merk" placeholder="masukkan nama_merk" class="form-control">
    <label for="biaya" class="form-label">Biaya</label>
    <input type="text" name="biaya" placeholder="masukkan Biaya" class="form-control">
    <label for="kategori_id" class="form-label">Kategori</label>
    <select name="kategori_id" class="form-select">
        <option value="">--Pilih Kategori</option>
        @foreach ($kategori as $k)
            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
        @endforeach
    </select>
    <label for="detail_barang" class="form-label">Detail Barang</label>
    <input type="text" name="detail_barang" placeholder="masukkan detail_barang" class="form-control">
    <label for="jumlah_barang">Jumlah Stok</label>
    <input type="number" name="jumlah_barang" placeholder="Masukkan Stok" class="form-control">
    <label for="harga_total">Total</label>
    <input type="number" name="harga_total" placeholder="Masukkan Stok" class="form-control">
    <button class="btn btn-success mt-2">Simpan</button>
    </form>
@endsection