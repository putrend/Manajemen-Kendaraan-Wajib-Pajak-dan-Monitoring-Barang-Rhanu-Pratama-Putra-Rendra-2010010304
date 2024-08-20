@extends('welcome')

@section('JUDUL', 'Lihat Mutasi')

@section('CONTENT')
@if (session('success_berlaku'))
<div id="success_berlaku"></div>
@endif
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="float-left">Detail Mutasi BPKB {{ $mutasi->bpkb->no_bpkb }}</h4>
                    </div>
                    <div class="card-text">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nomor BPKB : {{ $mutasi->bpkb->no_bpkb }}</li>
                            <li class="list-group-item">Samsat Sebelum Mutasi : {{ $mutasi->samsat_awal->nama_samsat }}
                            </li>
                            <li class="list-group-item">Samsat Setelah Mutasi : {{ $mutasi->samsat_tujuan->nama_samsat
                                }}</li>
                            <li class="list-group-item">Pemutasi : {{ $mutasi->wajib_pajak->nama_wp }}</li>
                            <li class="list-group-item">Nomor Polisi Sebelum Mutasi : {{ $mutasi->no_pol_lama }}</li>
                            <li class="list-group-item">
                                Nomor Polisi Setelah Mutasi : {{ $mutasi->no_pol_baru }}
                                <?php $no_polisi = Str::between($mutasi->no_pol_baru, 'DA ', ' ' . $mutasi->samsat_tujuan->kd_samsat); ?>
                                @if (Auth()->guard('web')->check())
                                @if ($no_polisi == 0000)
                                &nbsp;<span class="badge badge-danger">Harus Diisi</span>
                                @endif
                                @endif
                            </li>
                            <li class="list-group-item">
                                Biaya : Rp. {{ number_format($mutasi->biaya, 2) }}
                                @if (Auth()->guard('web')->check())
                                @if ($mutasi->biaya == 0)
                                &nbsp;<span class="badge badge-danger">Harus Diisi</span>
                                @endif
                                @endif
                            </li>
                            <li class="list-group-item">Status Mutasi :
                                @if ($mutasi->status == 'Berlaku')
                                <span class="badge badge-success">{{ $mutasi->status }}</span>
                                @elseif ($mutasi->status == 'Belum Berlaku')
                                <span class="badge badge-warning">{{ $mutasi->status }}</span>
                                @elseif ($mutasi->status == 'Dibatalkan')
                                <span class="badge badge-danger">{{ $mutasi->status }}</span>
                                @endif
                            </li>
                        </ul>
                        @if ($mutasi->status == 'Belum Berlaku')
                        @if (Auth()->guard('wajibpajak')->check())
                        <form action="/mutasi/{{ $mutasi->id }}/batalkan" method="post" id="mutasi-cancel-form">
                            @csrf
                            <button class="btn btn-danger btn-block mutasi-cancel" data-id="{{ $mutasi->id }}">Batalkan
                                Mutasi</button>
                        </form>
                        @else
                        <form action="/mutasi/{{ $mutasi->id }}/berlakukan" method="post" id="mutasi-confirm-form">
                            @csrf
                            <button class="btn btn-success btn-block mutasi-confirm"
                                data-id="{{ $mutasi->id }}">Berlakukan Mutasi</button>
                        </form>
                        <form action="/mutasi/{{ $mutasi->id }}/batalkan" method="post" id="mutasi-cancel-form">
                            @csrf
                            <button class="btn btn-danger btn-block my-2 mutasi-cancel"
                                data-id="{{ $mutasi->id }}">Batalkan Mutasi</button>
                        </form>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="float-left">Detail BPKB {{ $mutasi->bpkb->no_bpkb }}</h4>
                        <a href="/mutasi" class="btn btn-danger float-right">Kembali</a>
                    </div>
                    <div class="card-text">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nama Pemilik : {{
                                $mutasi->bpkb->wajib_pajak->nama_wp }}
                                @if (Auth()->guard('web')->check())
                                <a href="/wajib-pajak/{{ $mutasi->bpkb->wajib_pajak->id }}"
                                    class="btn btn-info btn-sm float-right">Lihat Wajib Pajak</a>
                                @endif
                            </li>
                            <li class="list-group-item">No BPKB : {{
                                $mutasi->bpkb->no_bpkb }}</li>
                            <li class="list-group-item">Kendaraan : {{
                                $mutasi->bpkb->kendaraan->nama_kendaraan }}
                                <a href="/kendaraan/{{ $mutasi->bpkb->kendaraan->id }}"
                                    class="btn btn-info btn-sm float-right">Lihat
                                    Kendaraan</a>
                            </li>
                            <li class="list-group-item">No Polisi : {{ $mutasi->bpkb->no_polisi }}
                            </li>
                            <li class="list-group-item">Tahun Pembuatan : {{
                                \Carbon\Carbon::parse($mutasi->bpkb->tahun_buat)->isoFormat('dddd, D
                                MMMM Y'); }} </li>
                            <li class="list-group-item">Didaftarkan Pada Samsat : {{
                                $mutasi->bpkb->samsat_awal->nama_samsat }}</li>
                            <li class="list-group-item">Terdaftar Sekarang : {{
                                $mutasi->bpkb->samsat_sekarang->nama_samsat }}</li>
                            <li class="list-group-item">Keterangan : {{ $mutasi->bpkb->keterangan
                                }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection