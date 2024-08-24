@extends('welcome')

@section('JUDUL', 'Kategori')

@section('CONTENT')
<a href="/kategori/create" a class="btn btn-success mb-2">Tambah Kategori</a>
<table class="table table-bordered table-collapsed table-hover">
    <tr class="bg-secondary">
        <th>No.</th>
        <th>Kategori</th>
        <th>Opsi</th>
    </tr>
    @foreach ($kategori as $index => $p)
    <tr>
        <td>{{ ($kategori->currentPage() - 1) * $kategori->perPage() + $index + 1 }}</td>
        <td>{{ $p->nama_kategori }}</td>
        <td>
            <form action="/kategori/{{ $p->id }}" method="post" id="kategori-delete-form">
                @csrf
                @method('delete')
                <a href="/kategori/{{ $p->id }}" class="btn btn-sm btn-info">Lihat</a>
                <a href="/kategori/{{ $p->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                <button class="btn btn-sm btn-danger kategori-delete" data-id="{{ $p->id }}">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $kategori->links() }}
@endsection