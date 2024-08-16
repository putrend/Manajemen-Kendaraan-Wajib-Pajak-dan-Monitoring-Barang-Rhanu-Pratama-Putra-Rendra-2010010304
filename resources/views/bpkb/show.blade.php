@extends('welcome')

@section('JUDUL', 'Lihat BPKB')

@section('CONTENT')
<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="float-left">Detail BPKB {{ $bpkb->no_bpkb }}
                        </h4>
                        <a href="/bpkb" class="btn btn-danger float-right">Kembali</a>
                    </div>
                    <div class="card-text">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nama Pemilik : {{
                                $bpkb->wajib_pajak->nama_wp }}</li>
                            <li class="list-group-item">No BPKB : {{
                                $bpkb->no_bpkb }}</li>
                            <li class="list-group-item">Kendaraan : {{ $bpkb->kendaraan->nama_kendaraan }}
                            </li>
                            <li class="list-group-item">No Polisi : {{ $bpkb->no_polisi }}
                            </li>
                            <li class="list-group-item">Tahun Pembuatan : {{
                                \Carbon\Carbon::parse($bpkb->tahun_buat)->isoFormat('dddd, D MMMM Y'); }}</li>
                            <li class="list-group-item">Didaftarkan Pada Samsat : {{
                                $bpkb->samsat_awal->nama_samsat }}</li>
                            <li class="list-group-item">Terdaftar Sekarang : {{
                                $bpkb->samsat_sekarang->nama_samsat }}</li>
                            <li class="list-group-item">Keterangan : {{ $bpkb->keterangan
                                }}
                            </li>
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
                        <form action="/bpkb/{{ $bpkb->id }}" method="post" id="bpkb-delete-form">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger bpkb-delete btn-block"
                                data-id="{{ $bpkb->id }}">Hapus</button>
                            <a href="/bpkb/{{ $bpkb->id }}/edit" class="btn btn-info btn-block mt-2">Edit</a>
                            @if ($bpkb->stnk)
                            <a href="/stnk/{{ $bpkb->stnk->id}}" class="btn btn-success btn-block mt-2">Lihat
                                STNK</a>
                            @else
                            <a href="/stnk/create" class="btn btn-secondary btn-block mt-2">Buat
                                STNK</a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection