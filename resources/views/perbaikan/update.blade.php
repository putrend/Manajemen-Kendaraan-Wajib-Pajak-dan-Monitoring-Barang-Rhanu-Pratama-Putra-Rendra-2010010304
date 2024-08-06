@extends('welcome')

@section('JUDUL', 'Ubah Perbaikan')

@section('CONTENT')
    <form action="/perbaikan/{{ $perbaikan->id }}" method="post">
    @csrf
    @method('put')
    <label for="barang_id">Nama Barang</label>
    <select name="barang_id" class="form-select">
        <option value="">--Pilih Barang--</option>
        @foreach ($barang as $b)
            @php
                $selected = $b->id == $perbaikan->barang->id ? 'selected' : '';
            @endphp
            <option {{ $selected }} value="{{ $b->id }}">{{ $b->nama_barang }}</option>
        @endforeach
    </select>
    <label for="ruangan_id">Nama Ruangan</label>
    <select name="ruangan_id" class="form-select">
        <option value="">--Pilih Ruangan--</option>
        @foreach ($ruangan as $r)
            @php
                $selected = $r->id == $perbaikan->ruangan->id ? 'selected' : '';
            @endphp
            <option {{ $selected }} value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>
        @endforeach
    </select>
    <label for="user_id">Nama User</label>
    <select name="user_id" class="form-select">
        <option value="">--Pilih User--</option>
        @foreach ($user as $u)
            @php
                $selected = $u->id == $perbaikan->user->id ? 'selected' : '';
            @endphp
            <option {{ $selected }} value="{{ $u->id }}">{{ $u->name }}</option>
        @endforeach
    </select>
    <label for="jumlah_perbaikan">Jumlah Perbaikan</label>
    <input type="date" name="jumlah_perbaikan" placeholder="Masukkan Jumlah perbaikan" class="form-control" value="{{ $perbaikan->jumlah_perbaikan }}">
    <label for="nama_perbaikan">Nama Perbaikan</label>
    <input type="text" name="nama_perbaikan" placeholder="Masukkan nama_perbaikan" class="form-control" value="{{ $perbaikan->nama_perbaikan }}">
    <label for="lama_selesai">Lama Selesai</label>
    <input type="text" name="lama_selesai" placeholder="Masukkan Lama Selesai" class="form-control" value="{{ $perbaikan->lama_selesai }}">
    <label for="kondisi">kondisi</label>
    <input type="text" name="kondisi" placeholder="Masukkan kondisi" class="form-control" value="{{ $perbaikan->kondisi }}">
    <button class="btn btn-success mt-2">Ubah</button>
    </form>
@endsection