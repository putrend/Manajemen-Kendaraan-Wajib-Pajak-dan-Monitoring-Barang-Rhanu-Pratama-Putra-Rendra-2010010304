@extends('welcome')

@section('JUDUL', 'Lihat Kendaraan')

@section('CONTENT')
<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="float-left">Detail Kendaraan {{ $kendaraan->nama_kendaraan }}</h4>
                        <a href="/kendaraan" class="btn btn-danger float-right">Kembali</a>
                    </div>
                    <div class="card-text">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nama Kendaraan : {{ $kendaraan->nama_kendaraan }}</li>
                            <li class="list-group-item">Jenis : {{ $kendaraan->jenis }}</li>
                            <li class="list-group-item">Nomor Rangka : {{ $kendaraan->no_rangka }}</li>
                            <li class="list-group-item">Nomor Mesin : {{ $kendaraan->no_mesin }}</li>
                            <li class="list-group-item">Warna : {{ $kendaraan->warna }}</li>
                            <li class="list-group-item">Kondisi : {{ $kendaraan->kondisi }}</li>
                            <li class="list-group-item">Merk : {{ $kendaraan->merk }}</li>
                            <li class="list-group-item">Model : {{ $kendaraan->model }}</li>
                            <li class="list-group-item">Isi Silinder : {{ $kendaraan->isi_silinder }}</li>
                            <li class="list-group-item">Dealer Motor : {{ $kendaraan->dealer->nama_dealer }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @if (Auth()->guard('web')->check())
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="float-left">Aksi</h4>
                    </div>
                    <div class="card-text">
                        <form action="/kendaraan/{{ $kendaraan->id }}" method="post" id="kendaraan-delete-form">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger kendaraan-delete btn-block"
                                data-id="{{ $kendaraan->id }}">Hapus</button>
                            <a href="/kendaraan/{{ $kendaraan->id }}/edit" class="btn btn-info btn-block mt-2">Edit</a>
                            @if ($kendaraan->bpkb)
                            <a href="/bpkb/{{ $kendaraan->bpkb->id}}" class="btn btn-success btn-block mt-2">Lihat
                                BPKB</a>
                            @else
                            <a href="/bpkb/create" class="btn btn-secondary btn-block mt-2">Buat
                                BPKB</a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection