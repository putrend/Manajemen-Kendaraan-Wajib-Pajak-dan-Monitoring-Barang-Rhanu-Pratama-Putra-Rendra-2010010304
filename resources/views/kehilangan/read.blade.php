@extends('welcome')

@section('JUDUL', 'kehilangan')
    
@section('CONTENT')
    <a href="/kehilangan/create"a class="btn btn-success mb-2">Tambah kehilangan</a>
    <a href="/kehilangan/cetak" target="_blank" class="btn btn-warning mb-2">Cetak kehilangan</a>
    <form action="/kehilangan/cetak" action="GET">
        <input type="date" name="period" id="period" class="form-control">
        <button type="submit" class="btn btn-info form-control">Cetak Periode</button>
    </form>
    <table class="table table-bordered table-collapsed table-hover">
        <tr class="bg-secondary">
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Nama Ruangan</th>
            <th>Nama User</th>
            <th>Tanggal Kehilangan</th>
            <th>Keterangan</th>
            <th>Opsi</th>
        </tr>
        @foreach ($kehilangan as $index => $p)
            <tr>
                <td>{{ ($kehilangan->currentPage() - 1) * $kehilangan->perPage() + $index + 1 }}</td>
                <td>{{ $p->barang->nama_barang }}</td>
                <td>{{ $p->ruangan->nama_ruangan }}</td>
                <td>{{ $p->user->name }}</td>
                <td>{{ $p->tanggal_kehilangan }}</td>
                <td>{{ $p->keterangan }}</td>
                <td>
                    <form action="/kehilangan/{{ $p->id }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="/kehilangan/{{ $p->id }}" class="btn btn-sm btn-info">Lihat</a>
                        <a href="/kehilangan/{{ $p->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $kehilangan->links() }}
@endsection