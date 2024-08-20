@extends('welcome')

@section('JUDUL', 'STNK')

@section('CONTENT')
@if (session('success_create'))
<div id="success_create"></div>
@elseif (session('success_edit'))
<div id="success_edit"></div>
@endif

<form action="/stnk/cetak" action="GET">
    <div class="row">
        <div class="col-9">
            <select name="samsat_id" id="samsat_id" class="form-control">
                <option value="">-- Pilih Samsat Terdaftar --</option>
                @foreach ($samsat as $item)
                <option value="{{ $item->id }}">{{ $item->nama_samsat }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-3">
            <button type="submit" class="btn btn-info">Cetak STNK</button>
            <a href="/stnk/create" class="btn btn-success">Tambah STNK</a>
        </div>
    </div>
</form>
<table class="table table-bordered table-collapsed table-hover mt-2">
    <tr class="bg-secondary">
        <th>No.</th>
        <th>No STNK</th>
        <th>No BPKB</th>
        <th>Kendaraan</th>
        <th>Tanggal Dibuat</th>
        <th>Opsi</th>
    </tr>
    @foreach ($stnk as $index => $s)
    <tr>
        <td>{{ ($stnk->currentPage() - 1) * $stnk->perPage() + $index + 1 }}</td>
        <td>{{ $s->no_stnk }}</td>
        <td>{{ $s->bpkb->no_bpkb }}</td>
        <td>{{ $s->bpkb->kendaraan->nama_kendaraan }}</td>
        <td>{{ $s->tgl_buat }}</td>
        <td>
            <form action="/stnk/{{ $s->id }}" method="post" id="stnk-delete-form">
                @csrf
                @method('delete')
                <a href="/stnk/{{ $s->id }}" class="btn btn-sm btn-info">Lihat</a>
                <a href="/stnk/{{ $s->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                <button class="btn btn-sm btn-danger stnk-delete" data-id="{{ $s->id }}">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $stnk->links() }}
@endsection