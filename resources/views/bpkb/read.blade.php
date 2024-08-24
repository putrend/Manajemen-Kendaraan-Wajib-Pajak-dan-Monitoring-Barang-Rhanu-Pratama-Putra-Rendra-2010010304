@extends('welcome')

@section('JUDUL', 'BPKB')

@section('CONTENT')
@if (session('success_create'))
<div id="success_create"></div>
@elseif (session('success_edit'))
<div id="success_edit"></div>
@endif

<a href="/bpkb/create" class="btn btn-success">Tambah BPKB</a>
<table class="table table-bordered table-collapsed table-hover mt-2">
    <tr class="bg-secondary">
        <th>No.</th>
        <th>Nama Pemilik</th>
        <th>Nomor BPKB</th>
        <th>Kendaraan</th>
        <th>STNK</th>
        <th>Pajak</th>
        <th>Opsi</th>
    </tr>
    @foreach ($bpkb as $index => $b)
    <tr>
        <td>{{ ($bpkb->currentPage() - 1) * $bpkb->perPage() + $index + 1 }}</td>
        <td>{{ $b->wajib_pajak->nama_wp }}</td>
        <td>{{ $b->no_bpkb }}</td>
        <td>{{ $b->kendaraan->nama_kendaraan }}</td>
        <td>
            @if ($b->stnk)
            <span class="badge badge-success">Dibuat</span>
            @else
            <span class="badge badge-danger">Belum Dibuat</span>
            @endif
        </td>
        <td>
            Rp. {{ number_format($b->pajak, 2) }}
        </td>
        <td>
            <form action="/bpkb/{{ $b->id }}" method="post" id="bpkb-delete-form">
                @csrf
                @method('delete')
                <a href="/bpkb/{{ $b->id }}" class="btn btn-sm btn-info">Lihat</a>
                <a href="/bpkb/{{ $b->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                <button class="btn btn-sm btn-danger bpkb-delete" data-id="{{ $b->id }}">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $bpkb->links() }}
@endsection