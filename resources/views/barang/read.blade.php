@extends('welcome')

@section('JUDUL', 'Barang')

@section('CONTENT')
<a href="/barang/create" a class="btn btn-success mb-2">Tambah Barang</a>
<table class="table table-bordered table-collapsed table-hover">
    <tr class="bg-secondary">
        <th>No.</th>
        <th>Nama Barang</th>
        <td>Merk</td>
        <td>Nama Merk</td>
        <td>Biaya</td>
        <th>Kategori</th>
        <td>Detail</td>
        <th>Jumlah Barang</th>
        <th>Harga Total</th>
        <th>Opsi</th>
    </tr>
    @foreach ($barang as $index => $p)
    <tr>
        <td>{{ ($barang->currentPage() - 1) * $barang->perPage() + $index + 1 }}</td>
        <td>{{ $p->nama_barang }}</td>
        <td>{{ $p->merk_barang }}</td>
        <td>{{ $p->nama_merk }}</td>
        <td>Rp. {{ number_format($p->biaya, 2) }}</td>
        <td>{{ $p->kategori->nama_kategori }}</td>
        <td>{{ $p->detail_barang }}</td>
        <td>{{ $p->jumlah_barang }}</td>
        <td>Rp. {{ number_format($p->harga_total, 2) }}</td>
        <td>
            <form action="/barang/{{ $p->id }}" method="post" id="barang-delete-form">
                @csrf
                @method('delete')
                <a href="/barang/{{ $p->id }}" class="btn btn-sm btn-info">Lihat</a>
                <a href="/barang/{{ $p->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                <button class="btn btn-sm btn-danger barang-delete" data-id="{{ $p->id }}">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $barang->links() }}
@endsection