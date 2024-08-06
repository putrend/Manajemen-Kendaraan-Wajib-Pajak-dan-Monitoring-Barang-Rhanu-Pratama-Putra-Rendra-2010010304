@extends('welcome')

@section('JUDUL', 'Lihat STNK')

@section('CONTENT')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="float-left">Detail STNK {{ $stnk->no_stnk }}</h4>
                    </div>
                    <div class="card-text">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nomor STNK : {{ $stnk->no_stnk }}</li>
                            <li class="list-group-item">Warna TNKB : {{ $stnk->warna_tnkb }}</li>
                            <li class="list-group-item">Kode Lokasi : {{ $stnk->kode_lokasi }}</li>
                            <li class="list-group-item">Masa Berlaku STNK : Hingga <span class="badge badge-warning">{{
                                    \Carbon\Carbon::parse($stnk->masa_berlaku_stnk)->isoFormat('MMMM-Y'); }}</span></li>
                            <li class="list-group-item">Masa Berlaku TNKB : Hingga <span class="badge badge-warning">{{
                                    \Carbon\Carbon::parse($stnk->masa_berlaku_tnkb)->isoFormat('MMMM-Y'); }}</span></li>
                            <li class="list-group-item">Tanggal Pembuatan : {{
                                \Carbon\Carbon::parse($stnk->tgl_buat)->isoFormat('dddd, D MMMM Y'); }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="float-left">Detail BPKB {{ $stnk->bpkb->no_bpkb }}</h4>
                        <a href="/stnk" class="btn btn-danger float-right">Kembali</a>
                    </div>
                    <div class="card-text">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nama Pemilik : {{
                                $stnk->bpkb->wajib_pajak->nama_wp }}
                                <a href="/wajib-pajak/{{ $stnk->bpkb->wajib_pajak->id }}"
                                    class="btn btn-info btn-sm float-right">Lihat Wajib Pajak</a>
                            </li>
                            <li class="list-group-item">No BPKB : {{
                                $stnk->bpkb->no_bpkb }}</li>
                            <li class="list-group-item">Kendaraan : {{ $stnk->bpkb->kendaraan->nama_kendaraan }}
                                <a href="/kendaraan/{{ $stnk->bpkb->kendaraan->id }}"
                                    class="btn btn-info btn-sm float-right">Lihat
                                    Kendaraan</a>
                            </li>
                            <li class="list-group-item">No Polisi : {{ $stnk->bpkb->no_polisi }}
                            </li>
                            <li class="list-group-item">Tahun Pembuatan : {{
                                \Carbon\Carbon::parse($stnk->bpkb->tahun_buat)->isoFormat('dddd, D MMMM Y'); }} ({{
                                \Carbon\Carbon::parse($stnk->bpkb->tahun_buat)->diffForHumans() }})</li>
                            <li class="list-group-item">Didaftarkan Pada Samsat : {{
                                $stnk->bpkb->samsat_awal->nama_samsat }}</li>
                            <li class="list-group-item">Terdaftar Sekarang : {{
                                $stnk->bpkb->samsat_sekarang->nama_samsat }}</li>
                            <li class="list-group-item">Keterangan : {{ $stnk->bpkb->keterangan
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