@extends('welcome')

@section('JUDUL', 'Kendaraan')

@section('CONTENT')
@if (session('success_create'))
<div id="success_create"></div>
@elseif (session('success_edit'))
<div id="success_edit"></div>
@endif

<a href="/kendaraan/create" a class="btn btn-success mb-2">Tambah Kendaraan</a>
<a href="/kendaraan/cetak" target="_blank" class="btn btn-warning mb-2">Cetak Kendaraan</a>
<form action="/kendaraan/cetak" action="GET">
    <input type="date" name="period" id="period" class="form-control">
    <button type="submit" class="btn btn-info form-control">Cetak Periode</button>
</form>
<table class="table table-bordered table-collapsed table-hover">
    <tr class="bg-secondary">
        <th>No.</th>
        <th>Nama Kendaraan</th>
        <th>Merk</th>
        <th>Model</th>
        <th>Dealer</th>
        <th>BPKB</th>
        <th>Opsi</th>
    </tr>
    @foreach ($kendaraan as $index => $k)
    <tr>
        <td>{{ ($kendaraan->currentPage() - 1) * $kendaraan->perPage() + $index + 1 }}</td>
        <td>{{ $k->nama_kendaraan }}</td>
        <td>{{ $k->merk }}</td>
        <td>{{ $k->model }}</td>
        <td>{{ $k->dealer->nama_dealer }}</td>
        <td>
            @if ($k->bpkb)
            <span class="badge badge-success">Dibuat</span>
            @else
            <span class="badge badge-danger">Belum Dibuat</span>
            @endif
        </td>
        <td>
            <form action="/kendaraan/{{ $k->id }}" method="post" id="kendaraan-delete-form">
                @csrf
                @method('delete')
                <a href="/kendaraan/{{ $k->id }}" class="btn btn-sm btn-info">Lihat</a>
                <a href="/kendaraan/{{ $k->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                <button class="btn btn-sm btn-danger kendaraan-delete" data-id="{{ $k->id }}">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $kendaraan->links() }}
@endsection