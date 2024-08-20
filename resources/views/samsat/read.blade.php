@extends('welcome')

@section('JUDUL', 'Samsat')

@section('CONTENT')
@if (session('success_create'))
<div id="success_create"></div>
@elseif (session('success_edit'))
<div id="success_edit"></div>
@endif

<a href="/samsat/create" a class="btn btn-success mb-2">Tambah Samsat</a>
<a href="/samsat/cetak" target="_blank" class="btn btn-warning mb-2">Cetak Samsat</a>
<table class="table table-bordered table-collapsed table-hover">
    <tr class="bg-secondary">
        <th>No.</th>
        <th>Kode Samsat</th>
        <td>Nama Samsat</td>
        <td>Kota</td>
        <th>Opsi</th>
    </tr>
    @foreach ($samsat as $index => $s)
    <tr>
        <td>{{ ($samsat->currentPage() - 1) * $samsat->perPage() + $index + 1 }}</td>
        <td>{{ $s->kd_samsat }}</td>
        <td>{{ $s->nama_samsat }}</td>
        <td>{{ $s->kota }}</td>
        <td>
            <form action="/samsat/{{ $s->id }}" method="post" id="samsat-delete-form">
                @csrf
                @method('delete')
                <a href="/samsat/{{ $s->id }}" class="btn btn-sm btn-info">Lihat</a>
                <a href="/samsat/{{ $s->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                <button class="btn btn-sm btn-danger samsat-delete" data-id="{{ $s->id }}">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $samsat->links() }}
@endsection