@extends('welcome')

@section('JUDUL', 'Ubah Dealer')

@section('CONTENT')
<form action="/dealer/{{ $dealer->id }}" method="post">
    @csrf
    @method('PUT')
    <label for="nama_dealer" class="form-label">Nama Dealer</label>
    <input type="text" name="nama_dealer" placeholder="Masukkan Nama Dealer" class="form-control"
        value="{{ $dealer->nama_dealer }}">
    <button class="btn btn-primary mt-2">Ubah</button>
</form>
@endsection