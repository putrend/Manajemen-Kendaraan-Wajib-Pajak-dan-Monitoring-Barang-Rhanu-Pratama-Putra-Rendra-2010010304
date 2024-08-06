@extends('welcome')

@section('JUDUL', 'Ruangan')
    
@section('CONTENT')
    <a href="/ruangan/create" class="btn btn-success mb-2">Tambah Ruangan</a>
    <a href="/ruangan/cetak" target="_blank" class="btn btn-warning mb-2">Cetak Ruangan</a>
    <form action="/ruangan/cetak" action="GET">
        <input type="date" name="period" id="period" class="form-control">
        <button type="submit" class="btn btn-info form-control">Cetak Periode</button>
    </form>
    <table class="table table-bordered table-collapsed table-hover">
        <tr class="bg-secondary">
            <th>No.</th>
            <th>Nama Ruangan</th>
            <th>Status Ruangan</th>
            <th>Opsi</th>
        </tr>
        @foreach ($ruangan as $index => $p)
            <tr>
                <td>{{ ($ruangan->currentPage() - 1) * $ruangan->perPage() + $index + 1 }}</td>
                <td>{{ $p->nama_ruangan }}</td>
                <td>{{ $p->status_ruangan }}</td>
                <td>
                    <form action="/ruangan/{{ $p->id }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="/ruangan/{{ $p->id }}" class="btn btn-sm btn-info">Lihat</a>
                        <a href="/ruangan/{{ $p->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $ruangan->links() }}
@endsection