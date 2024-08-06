@extends('welcome')

@section('JUDUL', 'Lihat Wajib Pajak')

@section('CONTENT')
<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="float-left">Detail Wajib Pajak {{ $wajibPajak->nama_wp }}
                        </h4>
                        <a href="/wajib-pajak" class="btn btn-danger float-right">Kembali</a>
                    </div>
                    <div class="card-text">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nama Wajib Pajak : {{
                                $wajibPajak->nama_wp }}</li>
                            <li class="list-group-item">NO KTP : {{ $wajibPajak->no_ktp }}
                            </li>
                            <li class="list-group-item">Alamat : {{
                                $wajibPajak->alamat }}</li>
                            <li class="list-group-item">Pekerjaan : {{
                                $wajibPajak->pekerjaan }}</li>
                            <li class="list-group-item">Tanggal Daftar : {{
                                $wajibPajak->tgl_daftar }}</li>
                            <li class="list-group-item">No Telepon : {{ $wajibPajak->no_telp
                                }}
                            </li>
                            <li class="list-group-item">E-Mail : {{ ($wajibPajak->email) ?
                                $wajibPajak->email : '-' }}</li>
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
                        <form action="/wajibPajak/{{ $wajibPajak->id }}" method="post" id="wajib-pajak-delete-form">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger wajib-pajak-delete btn-block"
                                data-id="{{ $wajibPajak->id }}">Hapus</button>
                            <a href="/wajib-pajak/{{ $wajibPajak->id }}/edit"
                                class="btn btn-info btn-block mt-2">Edit</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection