@extends('welcome')

@section('JUDUL', 'Ubah Barang Keluar')

@section('CONTENT')
    @if (session('fail_edit'))
    <div id="fail_edit"></div>
    @endif
    <form action="/barangkeluar/{{ $barangkeluar->id }}" method="post">
    @csrf
    @method('put')
    <label for="barang_id">Nama Barang</label>
    <select name="barang_id" class="form-select">
        <option value="">--Pilih Barang--</option>
        @foreach ($barang as $b)
            @php
                $selected = $b->id == $barangkeluar->barang_id ? 'selected' : '';
            @endphp
            <option {{ $selected }} value="{{ $b->id }}">{{ $b->nama_barang }}</option>
        @endforeach
    </select>
    <label for="ruangan_id">Nama Ruangan</label>
    <select name="ruangan_id" class="form-select">
        <option value="">--Pilih Ruangan--</option>
        @foreach ($ruangan as $r)
            @php
                $selected = $r->id == $barangkeluar->ruangan_id ? 'selected' : '';
            @endphp
            <option {{ $selected }} value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>
        @endforeach
    </select>
    <label for="user_id">Nama Ruangan</label>
    <select name="user_id" class="form-select">
        <option value="">--Pilih Ruangan--</option>
        @foreach ($user as $u)
            @php
                $selected = $u->id == $barangkeluar->user_id ? 'selected' : '';
            @endphp
            <option {{ $selected }} value="{{ $u->id }}">{{ $u->name }}</option>
        @endforeach
    </select>
    <label for="jumlah_keluar">Jumlah Barang Keluar</label>
    <input type="number" name="jumlah_keluar" placeholder="Masukkan Jumlah Keluar" class="form-control" value="{{ $barangkeluar->jumlah_keluar }}">
    <label for="tanggal_keluar">Jumlah Tanggal Keluar</label>
    <input type="date" name="tanggal_keluar" placeholder="Masukkan Tanggal Keluar" class="form-control" value="{{ $barangkeluar->tanggal_keluar }}">
    <button class="btn btn-success mt-2">Ubah</button>
    </form>
@endsection