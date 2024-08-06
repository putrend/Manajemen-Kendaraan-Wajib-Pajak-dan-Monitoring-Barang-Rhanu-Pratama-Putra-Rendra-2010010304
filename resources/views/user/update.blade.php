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
            @php
                $options = ['admin', 'pegawai'];
            @endphp
            @foreach ($options as $option)
            @php
                $selected = $user->role == $option ? 'selected' : '';
            @endphp
            <option {{ $selected }} value="{{ $option }}">{{ ucfirst($option) }}</option>
            @endforeach
        </select>
        <button class="btn btn-primary mt-2">Ubah</button>
    </form>
@endsection
