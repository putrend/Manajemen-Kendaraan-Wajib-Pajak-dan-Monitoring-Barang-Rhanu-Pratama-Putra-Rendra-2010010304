@extends('welcome')

@section('JUDUL', 'Lihat Pengguna')

@section('CONTENT')
<label for="name" class="form-label">Nama</label>
<input type="text" name="name" placeholder="masukkan nama" class="form-control" value="{{ $user->name }}">
<label for="username">Username</label>
<input type="text" name="username" placeholder="masukkan username" class="form-control" value="{{ $user->username }}">
<label for="email">Email</label>
<input type="email" name="email" placeholder="masukkan email" class="form-control" value="{{ $user->email }}">
<label for="role">Role</label>
@if ($user->role == 1)
<input type="text" class="form-control" value="Admin">
@elseif ($user->role == 2)
<input type="text" class="form-control" value="Petugas UPPD">
@elseif ($user->role == 3)
<input type="text" class="form-control" value="Petugas Samsat">
@endif

<a href="/user" class="btn btn-danger mt-2">Kembali</a>
@endsection