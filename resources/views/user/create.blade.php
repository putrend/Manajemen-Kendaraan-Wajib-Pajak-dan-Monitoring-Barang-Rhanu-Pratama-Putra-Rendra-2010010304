@extends('welcome')

@section('JUDUL', 'Tambah Pengguna')
    
@section('CONTENT')
    <form action="/user" method="post">
        @csrf
        <label for="name" class="form-label">Nama</label>
        <input type="text" name="name" placeholder="masukkan nama" class="form-control">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="masukkan username" class="form-control">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="masukkan email" class="form-control">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="masukkan password" class="form-control">
        <label for="role">Role</label>
        <select name="role" class="form-select">
            <option value="admin">Admin</option>
            <option value="pegawai">Pegawai</option>
        </select>
        <button class="btn btn-success mt-2">Simpan</button>
    </form>
@endsection