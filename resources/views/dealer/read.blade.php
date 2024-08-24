@extends('welcome')

@section('JUDUL', 'Dealer')

@section('CONTENT')
@if (session('success_create'))
<div id="success_create"></div>
@elseif (session('success_edit'))
<div id="success_edit"></div>
@endif

<a href="/dealer/create" a class="btn btn-success mb-2">Tambah Dealer</a>
<table class="table table-bordered table-collapsed table-hover">
    <tr class="bg-secondary">
        <th>No.</th>
        <th>Nama Dealer</th>
        <th>Opsi</th>
    </tr>
    @foreach ($dealer as $index => $d)
    <tr>
        <td>{{ ($dealer->currentPage() - 1) * $dealer->perPage() + $index + 1 }}</td>
        <td>{{ $d->nama_dealer }}</td>
        <td>
            <form action="/dealer/{{ $d->id }}" method="post" id="dealer-delete-form">
                @csrf
                @method('delete')
                <a href="/dealer/{{ $d->id }}" class="btn btn-sm btn-info">Lihat</a>
                <a href="/dealer/{{ $d->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                <button class="btn btn-sm btn-danger dealer-delete" data-id="{{ $d->id }}">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $dealer->links() }}
@endsection