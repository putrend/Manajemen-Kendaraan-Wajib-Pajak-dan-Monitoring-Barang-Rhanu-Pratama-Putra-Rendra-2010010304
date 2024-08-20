@extends('welcome')

@section('JUDUL', 'Kendaraan')

@section('CONTENT')
@if (session('success_create'))
<div id="success_create"></div>
@elseif (session('success_edit'))
<div id="success_edit"></div>
@endif

<form action="/kendaraan/cetak" action="GET" target="_blank">
    <div class="row">
        <div class="col-5">
            <select name="dealer_id" id="dealer_id" class="form-control">
                <option value="">-- Pilih Dealer --</option>
                @foreach ($dealer as $item)
                <option value="{{ $item->id }}">{{ $item->nama_dealer }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-4">
            <select name="status_bpkb" id="status_bpkb" class="form-control">
                <option value="">-- Pilih Status BPKB --</option>
                <option value="Dibuat">Dibuat</option>
                <option value="Belum Dibuat">Belum Dibuat</option>
            </select>
        </div>

        <div class="col-3">
            <button type="submit" class="btn btn-info">Cetak Kendaraan</button>
            <a href="/kendaraan/create" class="btn btn-success">Tambah Kendaraan</a>
        </div>
    </div>
</form>
<table class="table table-bordered table-collapsed table-hover mt-2">
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