@extends('welcome')

@section('JUDUL', 'Kerusakan')

@section('CONTENT')
<a href="/kerusakan/create" a class="btn btn-success mb-2">Tambah Kerusakan</a>
<table class="table table-bordered table-collapsed table-hover">
    <tr class="bg-secondary">
        <th>No.</th>
        <th>Nama Barang</th>
        <th>Nama Ruangan</th>
        <th>Nama User</th>
        <th>Jumlah Rusak</th>
        <th>Penanganan</th>
        <th>Keterangan</th>
        <th>Kondisi</th>
        <th>Opsi</th>
    </tr>
    @foreach ($kerusakan as $index => $p)
    <tr>
        <td>{{ ($kerusakan->currentPage() - 1) * $kerusakan->perPage() + $index + 1 }}</td>
        <td>{{ $p->barang->nama_barang }}</td>
        <td>{{ $p->ruangan->nama_ruangan }}</td>
        <td>{{ $p->user->name }}</td>
        <td>{{ $p->jumlah_rusak }}</td>
        <td>{{ $p->penanganan }}</td>
        <td>{{ $p->keterangan }}</td>
        <td>{{ $p->kondisi }}</td>
        <td>
            <form action="/kerusakan/{{ $p->id }}" method="post">
                @csrf
                @method('delete')
                <a href="/kerusakan/{{ $p->id }}" class="btn btn-sm btn-info">Lihat</a>
                <a href="/kerusakan/{{ $p->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $kerusakan->links() }}
@endsection