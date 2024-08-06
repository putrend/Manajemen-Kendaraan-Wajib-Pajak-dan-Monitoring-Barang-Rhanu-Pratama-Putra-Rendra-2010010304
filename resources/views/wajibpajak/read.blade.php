@extends('welcome')

@section('JUDUL', 'Wajib Pajak')

@section('CONTENT')
@if (session('success_create'))
<div id="success_create"></div>
@elseif (session('success_edit'))
<div id="success_edit"></div>
@endif

<a href="/wajib-pajak/create" class="btn btn-success mb-2">Tambah Wajib Pajak</a>
<a href="/wajib-pajak/cetak" class="btn btn-warning mb-2">Cetak Wajib Pajak</a>
<table class="table table-bordered table-collapsed table-hover">
    <tr class="bg-secondary">
        <th>No.</th>
        <th>Nama</th>
        <th>No KTP</th>
        <th>Alamat</th>
        <th>Pekerjaan</th>
        <th>Tanggal Daftar</th>
        <th>No Telepon</th>
        <th>Email</th>
        <th>Opsi</th>
    </tr>
    @foreach ($wajibpajak as $index => $wp)
    <tr>
        <td>{{ ($wajibpajak->currentPage() - 1) * $wajibpajak->perPage() + $index + 1 }}</td>
        <td>{{ $wp->nama_wp }}</td>
        <td>{{ $wp->no_ktp }}</td>
        <td>{{ $wp->alamat }}</td>
        <td>{{ $wp->pekerjaan }}</td>
        <td>{{ $wp->tgl_daftar }}</td>
        <td>{{ $wp->no_telp }}</td>
        <td>{{ ($wp->email) ? $wp->email : '-' }}</td>
        <td>
            <form action="/wajib-pajak/{{ $wp->id }}" method="post" id="wajib-pajak-delete-form">
                @csrf
                @method('delete')
                <a href="/wajib-pajak/{{ $wp->id }}" class="btn btn-sm btn-info">Lihat</a>
                <a href="/wajib-pajak/{{ $wp->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                <button class="btn btn-sm btn-danger wajib-pajak-delete" data-id="{{ $wp->id }}">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $wajibpajak->links() }}
@endsection