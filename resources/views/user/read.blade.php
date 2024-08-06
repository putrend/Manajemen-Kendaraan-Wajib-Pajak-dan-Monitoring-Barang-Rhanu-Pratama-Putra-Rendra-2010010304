@extends('welcome')

@section('JUDUL', 'Pengguna')

@section('CONTENT')
    <a href="/user/create" class="btn btn-success mb-2">Tambah User</a>
    <a href="/user/cetak" class="btn btn-warning mb-2">Cetak User</a>
    <table class="table table-bordered table-collapsed table-hover">
        <tr class="bg-secondary">
            <th>No.</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Opsi</th>
        </tr>
        @foreach ($user as $index => $p)
            <tr>
                <td>{{ ($user->currentPage() - 1) * $user->perPage() + $index + 1 }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->username }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->role }}</td>
                <td>
                    <form action="/user/{{ $p->id }}" method="post" id="user-delete-form">
                        @csrf
                        @method('delete')
                        <a href="/user/{{ $p->id }}" class="btn btn-sm btn-info">Lihat</a>
                        <a href="/user/{{ $p->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                        <button class="btn btn-sm btn-danger user-delete" data-id="{{ $p->id }}">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $user->links() }}
@endsection