@extends('welcome')

@section('JUDUL', 'Ubah Pengguna')

@section('CONTENT')
<form action="/user/{{ $user->id }}" method="post">
    @csrf
    @method('PUT')
    <label for="name" class="form-label">Nama</label>
    <input type="text" name="name" placeholder="masukkan nama" class="form-control" value="{{ $user->name }}">
    <label for="username">Username</label>
    <input type="text" name="username" placeholder="masukkan username" class="form-control"
        value="{{ $user->username }}">
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="masukkan email" class="form-control" value="{{ $user->email }}">
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="kosongkan jika tidak ingin merubah password"
        class="form-control">
    <label for="role">Role</label>
    <select name="role" class="form-select">
        <option value="1" <?=($user->role) == '1' ? 'selected' : ''; ?>>Admin</option>
        <option value="2" <?=($user->role) == '2' ? 'selected' : ''; ?>>Petugas UPPD</option>
        <option value="3" <?=($user->role) == '3' ? 'selected' : ''; ?>>Petugas Samsat</option>
    </select>
    <button class="btn btn-primary mt-2">Ubah</button>
</form>
@endsection