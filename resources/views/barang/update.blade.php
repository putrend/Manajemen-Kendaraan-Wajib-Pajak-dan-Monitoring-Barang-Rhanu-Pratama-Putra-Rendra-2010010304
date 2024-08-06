@extends('welcome')

@section('JUDUL', 'Ubah Barang')

@section('CONTENT')
    <form action="/barang/{{ $barang->id }}" method="post">
    @csrf
    @method('put')
    <label for="nama_barang">Nama Barang</label>
    <input type="text" name="nama_barang" placeholder="Masukkan Nama Barang" class="form-control" value="{{ $barang->nama_barang }}">
    <label for="merk_barang">Merk</label>
    <input type="text" name="merk_barang" placeholder="Masukkan Merk" class="form-control" value="{{ $barang->merk_barang }}">
    <label for="nama_merk">Nama Merk</label>
    <input type="text" name="nama_merk" placeholder="Masukkan Merk" class="form-control" value="{{ $barang->nama_merk }}">
    <label for="biaya">Biaya</label>
    <input type="text" name="biaya" placeholder="Masukkan Biaya" class="form-control" value="{{ $barang->biaya }}">
    <label for="kategori_id">Kategori</label>
    <select name="kategori_id" class="form-select">
        <option value="">--Pilih Kategori--</option>
        @foreach ($kategori as $k)
            @php
                $selected = $k->id == $barang->kategori_id ? 'selected' : '';
            @endphp
            <option {{ $selected }} value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
        @endforeach
    </select>
    <label for="detail_barang">Detail</label>
    <input type="text" name="detail_barang" placeholder="Masukkan Merk" class="form-control" value="{{ $barang->detail_barang }}">
    <label for="jumlah_barang">Jumlah Barang</label>
    <input type="number" name="jumlah_barang" placeholder="Masukkan Jumlah Stok" class="form-control" value="{{ $barang->jumlah_barang }}">
    <label for="harga_total">Total</label>
    <input type="number" name="harga_total" placeholder="Masukkan Jumlah Stok" class="form-control" value="{{ $barang->harga_total }}">
    <button class="btn btn-success mt-2">Ubah</button>
    </form>
@endsection