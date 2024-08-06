@extends('welcome')

@section('JUDUL', 'perbaikan')
    
@section('CONTENT')
    <a href="/perbaikan/create"a class="btn btn-success mb-2">Tambah perbaikan</a>
    <a href="/perbaikan/cetak" target="_blank" class="btn btn-warning mb-2">Cetak perbaikan</a>
    <form action="/perbaikan/cetak" action="GET">
        <input type="date" name="period" id="period" class="form-control">
        <button type="submit" class="btn btn-info form-control">Cetak Periode</button>
    </form>
    <table class="table table-bordered table-collapsed table-hover">
        <tr class="bg-secondary">
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Nama Ruangan</th>
            <th>Nama User</th>
            <th>Jumlah Perbaikan</th>
            <th>Nama Perbaikan</th>
            <th>Kondisi</th>
            <th>Lama Selesai</th>
            <th>Opsi</th>
        </tr>
        @foreach ($perbaikan as $index => $p)
            <tr>
                <td>{{ ($perbaikan->currentPage() - 1) * $perbaikan->perPage() + $index + 1 }}</td>
                <td>{{ $p->barang->nama_barang }}</td>
                <td>{{ $p->ruangan->nama_ruangan }}</td>
                <td>{{ $p->user->name }}</td>
                <td>{{ $p->jumlah_perbaikan }}</td>
                <td>{{ $p->nama_perbaikan }}</td>
                <td>{{ $p->lama_selesai }}</td>
                <td>{{ $p->kondisi }}</td>
                <td>
                    <form action="/perbaikan/{{ $p->id }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="/perbaikan/{{ $p->id }}" class="btn btn-sm btn-info">Lihat</a>
                        <a href="/perbaikan/{{ $p->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $perbaikan->links() }}
@endsection