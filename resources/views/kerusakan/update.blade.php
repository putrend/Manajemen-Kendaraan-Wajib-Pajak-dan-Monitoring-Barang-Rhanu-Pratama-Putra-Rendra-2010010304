@extends('welcome')

@section('JUDUL', 'Ubah Kerusakan')

@section('CONTENT')
    <form action="/kerusakan/{{ $kerusakan->id }}" method="post">
    @csrf
    @method('put')
    <label for="barang_id">Nama Barang</label>
    <select name="barang_id" class="form-select">
        <option value="">--Pilih Barang--</option>
        @foreach ($barang as $b)
            @php
                $selected = $b->id == $kerusakan->barang->id ? 'selected' : '';
            @endphp
            <option {{ $selected }} value="{{ $b->id }}">{{ $b->nama_barang }}</option>
        @endforeach
    </select>
    <label for="ruangan_id">Nama Ruangan</label>
    <select name="ruangan_id" class="form-select">
        <option value="">--Pilih Ruangan--</option>
        @foreach ($ruangan as $r)
            @php
                $selected = $r->id == $kerusakan->ruangan->id ? 'selected' : '';
            @endphp
            <option {{ $selected }} value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>
        @endforeach
    </select>
    <label for="user_id">Nama User</label>
    <select name="user_id" class="form-select">
        <option value="">--Pilih User--</option>
        @foreach ($user as $u)
            @php
                $selected = $u->id == $kerusakan->user->id ? 'selected' : '';
            @endphp
            <option {{ $selected }} value="{{ $u->id }}">{{ $u->name }}</option>
        @endforeach
    </select>
    <label for="jumlah_rusak">Jumlah Rusak</label>
    <input type="number" name="jumlah_rusak" placeholder="Masukkan Jumlah Rusak" class="form-control" value="{{ $kerusakan->jumlah_rusak }}">
    <label for="penanganan">Penanganan</label>
        <select name="penanganan" id="penanganan" required>
            <option value="perbaikan">Perbaikan</option>
            <option value="rusak_total">Rusak Total</option>
        </select>
    <label for="keterangan">Keterangan</label>
    <input type="text" name="keterangan" placeholder="Masukkan Keterangan" class="form-control" value="{{ $kerusakan->keterangan }}">
    <label for="kondisi">Kondisi</label>
    <input type="text" name="kondisi" placeholder="Masukkan Kondisi" class="form-control" value="{{ $kerusakan->kondisi }}">
    <button class="btn btn-success mt-2">Ubah</button>
    </form>
@endsection