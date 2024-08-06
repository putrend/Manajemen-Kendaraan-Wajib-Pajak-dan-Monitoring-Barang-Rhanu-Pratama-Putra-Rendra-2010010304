@extends('welcome')

@section('JUDUL', 'Lihat Dealer')

@section('CONTENT')
<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="float-left">Detail Dealer {{ $dealer->nama_dealer }}</h4>
                        <a href="/dealer" class="btn btn-danger float-right">Kembali</a>
                    </div>
                    <div class="card-text">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Jumlah Kendaraan Pada Dealer Ini : {{ $kendaraanCount
                                }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="float-left">Aksi</h4>
                    </div>
                    <div class="card-text">
                        <form action="/dealer/{{ $dealer->id }}" method="post" id="dealer-delete-form">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-block mt-2 dealer-delete btn-block"
                                data-id="{{ $dealer->id }}">Hapus</button>
                            <a href="/dealer/{{ $dealer->id }}/edit" class="btn btn-info btn-block mt-2">Edit</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-collapsed table-hover">
        <tr class="bg-secondary">
            <th>No.</th>
            <th>Nama Kendaraan</th>
            <th>Merk</th>
            <th>Model</th>
            <th>Dealer</th>
            <th>Opsi</th>
        </tr>
        @foreach ($kendaraan as $index => $k)
        <tr>
            <td>{{ ($kendaraan->currentPage() - 1) * $kendaraan->perPage() + $index + 1 }}</td>
            <td>{{ $k->nama_kendaraan }}</td>
            <td>{{ $k->merk }}</td>
            <td>{{ $k->model }}</td>
            <td>{{ $k->dealer->nama_dealer }}</td>
            <td>
                <form action="/kendaraan/{{ $k->id }}" method="post" id="kendaraan-delete-form">
                    @csrf
                    @method('delete')
                    <a href="/kendaraan/{{ $k->id }}" class="btn btn-sm btn-info">Lihat</a>
                    <a href="/kendaraan/{{ $k->id }}/edit" class="btn btn-sm btn-primary">Ubah</a>
                    <button class="btn btn-sm btn-danger kendaraan-delete" data-id="{{ $k->id }}">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection