@extends('welcome')

@section('JUDUL', 'Barang Keluar')

@section('CONTENT')
@if (session('success_create'))
<div id="success_create"></div>
@elseif (session('success_edit'))
<div id="success_edit"></div>
@endif

<a href="/barangkeluar/create" a class="btn btn-success mb-2">Tambah Barang Keluar</a>
<table class="table table-bordered table-collapsed table-hover">
    <tr class="bg-secondary">
        <th>No.</th>
        <th>Nama Barang</th>
        <th>Nama Ruangan</th>
        <th>Nama User</th>
        <th>Jumlah Keluar</th>
        <th>Tanggal Keluar</th>
        <th>Opsi</th>
    </tr>
    @foreach ($barangkeluar as $index => $p)
    <tr>
        <td>{{ ($barangkeluar->currentPage() - 1) * $barangkeluar->perPage() + $index + 1 }}</td>
        <td>{{ $p->barang->nama_barang }}</td>
        <td>{{ $p->ruangan->nama_ruangan }}</td>
        <td>{{ $p->user->name }}</td>
        <td>{{ $p->jumlah_keluar }}</td>
        <td>{{ $p->tanggal_keluar }}</td>
        <td>
            <form action="/barangkeluar/{{ $p->id }}" method="post" id="barangkeluar-delete-form">
                @csrf
                @method('delete')
                <a href="/barangkeluar/{{ $p->id }}" class="btn btn-sm btn-info">Lihat</a>
                <a href="/barangkeluar/{{ $p->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                <button class="btn btn-sm btn-danger barangkeluar-delete" data-id="{{ $p->id }}">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $barangkeluar->links() }}
@endsection