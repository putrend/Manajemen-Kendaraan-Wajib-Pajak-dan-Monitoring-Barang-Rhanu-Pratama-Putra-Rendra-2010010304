@extends('welcome')

@section('JUDUL', 'Mutasi')

@section('CONTENT')
@if (session('success_create'))
<div id="success_create"></div>
@elseif (session('success_edit'))
<div id="success_edit"></div>
@elseif (session('fail_edit'))
<div id="fail_edit"></div>
@elseif (session('fail_search'))
<div id="fail_search"></div>
@endif

@if (auth()->guard('web')->check())
<form action="/mutasi/cetak" action="GET">
    <div class="row">
        <div class="col-3">
            <select name="samsat_awal_id" id="samsat_awal_id" class="form-control">
                <option value="">-- Pilih Samsat Awal --</option>
                @foreach ($samsat as $item)
                <option value="{{ $item->id }}">{{ $item->nama_samsat }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <select name="samsat_tujuan_id" id="samsat_tujuan_id" class="form-control">
                <option value="">-- Pilih Samsat Tujuan --</option>
                @foreach ($samsat as $item)
                <option value="{{ $item->id }}">{{ $item->nama_samsat }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <select name="status" id="status" class="form-control">
                <option value="">-- Pilih Status Mutasi --</option>
                <option value="Berlaku">Berlaku</option>
                <option value="Belum Berlaku">Belum Berlaku</option>
                <option value="Dibatalkan">Dibatalkan</option>
            </select>
        </div>

        <div class="col-3">
            <button type="submit" class="btn btn-info">Cetak BPKB</button>
            <a href="/mutasi/create" a class="btn btn-success">Tambah Mutasi</a>
        </div>
    </div>
</form>
@else
<a href="/mutasi/create" a class="btn btn-success mb-2">Tambah Mutasi</a>
@endif
<table class="table table-bordered table-collapsed table-hover mt-2">
    <tr class="bg-secondary">
        <th>No.</th>
        <th>No BPKB</th>
        <th>Wajib Pajak</th>
        <th>Samsat Awal</th>
        <th>Samsat Tujuan</th>
        <th>Biaya</th>
        <th>Status</th>
        <th>Opsi</th>
    </tr>
    @foreach ($mutasi as $index => $m)
    <tr>
        <td>{{ ($mutasi->currentPage() - 1) * $mutasi->perPage() + $index + 1 }}</td>
        <td>{{ $m->bpkb->no_bpkb }}</td>
        <td>{{ $m->wajib_pajak->nama_wp }}</td>
        <td>{{ $m->samsat_awal->nama_samsat }}</td>
        <td>{{ $m->samsat_tujuan->nama_samsat }}</td>
        <td>Rp. {{ number_format($m->biaya, 2) }}</td>
        <td>
            @if ($m->status == 'Berlaku')
            <span class="badge badge-success">{{ $m->status }}</span>
            @elseif ($m->status == 'Belum Berlaku')
            <span class="badge badge-warning">{{ $m->status }}</span>
            @else
            <span class="badge badge-danger">{{ $m->status }}</span>
            @endif

        </td>
        <td>
            <form action="/mutasi/{{ $m->id }}" method="post" id="mutasi-delete-form">
                @csrf
                @method('delete')
                <a href="/mutasi/{{ $m->id }}" class="btn btn-sm btn-info">Lihat</a>
                @if (Auth()->guard('web')->check())
                @if ($m->status == 'Belum Berlaku')
                <a href="/mutasi/{{ $m->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                @else
                <a href="/mutasi/{{ $m->id }}/edit" class="btn btn-sm btn-primary disabled">Ubah</a>
                @endif
                <button class="btn btn-sm btn-danger mutasi-delete" data-id="{{ $m->id }}">Hapus</button>
                @endif
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $mutasi->links() }}
@endsection