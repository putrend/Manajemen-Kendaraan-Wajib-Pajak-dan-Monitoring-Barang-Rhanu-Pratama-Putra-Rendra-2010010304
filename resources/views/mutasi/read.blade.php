@extends('welcome')

@section('JUDUL', 'Mutasi')

@section('CONTENT')
@if (session('success_create'))
<div id="success_create"></div>
@elseif (session('success_edit'))
<div id="success_edit"></div>
@elseif (session('fail_edit'))
<div id="fail_edit"></div>
@endif

<a href="/mutasi/create" a class="btn btn-success mb-2">Tambah Mutasi</a>
<a href="/mutasi/cetak" target="_blank" class="btn btn-warning mb-2">Cetak Mutasi</a>
<form action="/mutasi/cetak" action="GET">
    <input type="date" name="period" id="period" class="form-control">
    <button type="submit" class="btn btn-info form-control">Cetak Periode</button>
</form>
<table class="table table-bordered table-collapsed table-hover">
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