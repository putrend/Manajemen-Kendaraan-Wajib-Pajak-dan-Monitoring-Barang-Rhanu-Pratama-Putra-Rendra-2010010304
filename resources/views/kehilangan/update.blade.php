@extends('welcome')

@section('JUDUL', 'Ubah kehilangan')

@section('CONTENT')
    <form action="/kehilangan/{{ $kehilangan->id }}" method="post">
    @csrf
    @method('put')
    <label for="barang_id">Nama Barang</label>
    <select name="barang_id" class="form-select">
        <option value="">--Pilih Barang--</option>
        @foreach ($barang as $b)
            @php
                $selected = $b->id == $kehilangan->barang->id ? 'selected' : '';
            @endphp
            <option {{ $selected }} value="{{ $b->id }}">{{ $b->nama_barang }}</option>
        @endforeach
    </select>
    <label for="ruangan_id">Nama Ruangan</label>
    <select name="ruangan_id" class="form-select">
        <option value="">--Pilih Ruangan--</option>
        @foreach ($ruangan as $r)
            @php
                $selected = $r->id == $kehilangan->ruangan->id ? 'selected' : '';
            @endphp
            <option {{ $selected }} value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>
        @endforeach
    </select>
    <label for="user_id">Nama User</label>
    <select name="user_id" class="form-select">
        <option value="">--Pilih User--</option>
        @foreach ($user as $u)
            @php
                $selected = $u->id == $kehilangan->user->id ? 'selected' : '';
            @endphp
            <option {{ $selected }} value="{{ $u->id }}">{{ $u->name }}</option>
        @endforeach
    </select>
    <label for="tanggal_kehilangan">Tanggal Kehilangan</label>
    <input type="date" name="tanggal_kehilangan" placeholder="Masukkan Tanggal Kehilangan" class="form-control" value="{{ $kehilangan->tanggal_kehilangan }}">
    <label for="keterangan">Keterangan</label>
    <input type="text" name="keterangan" placeholder="Masukkan Keterangan" class="form-control" value="{{ $kehilangan->keterangan }}">
    <button class="btn btn-success mt-2">Ubah</button>
    </form>
@endsection