@extends('welcome')

@section('JUDUL', 'Lihat Mutasi')

@section('CONTENT')
@if (session('success_berlaku'))
<div id="success_berlaku"></div>
@elseif (session('success_edit'))
<div id="success_edit"></div>
@elseif (session('gagal_berlaku'))
<div id="gagal_berlaku"></div>
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
                            <button class="btn btn-success btn-block mutasi-confirm" data-id="{{ $mutasi->id }}" {{
                                ($no_polisi==0000 || $mutasi->biaya == 0) ? 'disabled' : '' }}>Berlakukan
                                Mutasi</button>
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="float-left">Berkas Mutasi</h4>
                    </div>
                    <div class="card-text">
                        <ul class="list-group list-group-flush">

                            {{-- STNK --}}
                            <li class="list-group-item">
                                <div class="float-left">
                                    STNK Asli :
                                    @if ($mutasi->stnk_asli)
                                    <span class="badge badge-success">Terupload</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Ada</span>
                                    @endif
                                </div>

                                <div class="float-right">
                                    <form action="/mutasi/{{ $mutasi->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="file" name="stnk_asli" id="stnk_asli" class="form-control">
                                                <span class="text-sm">Max: 2048 kb</span>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-success" {{ ($mutasi->status ==
                                                    'Belum Berlaku')
                                                    ? '' : 'disabled' }}>Submit</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#stnkModal{{ $mutasi->id }}" {{ ($mutasi->stnk_asli)
                                                    ? '' : 'disabled' }}>
                                                    Lihat
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            {{-- BPKB --}}
                            <li class="list-group-item">
                                <div class="float-left">
                                    BPKB Asli :
                                    @if ($mutasi->bpkb_asli)
                                    <span class="badge badge-success">Terupload</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Ada</span>
                                    @endif
                                </div>

                                <div class="float-right">
                                    <form action="/mutasi/{{ $mutasi->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="file" name="bpkb_asli" id="bpkb_asli" class="form-control">
                                                <span class="text-sm">Max: 2048 kb</span>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-success" {{ ($mutasi->status ==
                                                    'Belum Berlaku')
                                                    ? '' : 'disabled' }}>Submit</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#bpkbModal{{ $mutasi->id }}" {{ ($mutasi->bpkb_asli)
                                                    ? '' : 'disabled' }}>
                                                    Lihat
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            {{-- KTP --}}
                            <li class="list-group-item">
                                <div class="float-left">
                                    KTP Asli :
                                    @if ($mutasi->ktp_asli)
                                    <span class="badge badge-success">Terupload</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Ada</span>
                                    @endif
                                </div>

                                <div class="float-right">
                                    <form action="/mutasi/{{ $mutasi->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="file" name="ktp_asli" id="ktp_asli" class="form-control">
                                                <span class="text-sm">Max: 2048 kb</span>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-success" {{ ($mutasi->status ==
                                                    'Belum Berlaku')
                                                    ? '' : 'disabled' }}>Submit</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#ktpModal{{ $mutasi->id }}" {{ ($mutasi->ktp_asli)
                                                    ? '' : 'disabled' }}>
                                                    Lihat
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            {{-- Kwitansi_jb --}}
                            <li class="list-group-item">
                                <div class="float-left">
                                    Kwitansi Jual Beli :
                                    @if ($mutasi->kwitansi_jb)
                                    <span class="badge badge-success">Terupload</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Ada</span>
                                    @endif
                                </div>

                                <div class="float-right">
                                    <form action="/mutasi/{{ $mutasi->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="file" name="kwitansi_jb" id="kwitansi_jb"
                                                    class="form-control">
                                                <span class="text-sm">Max: 2048 kb</span>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-success" {{ ($mutasi->status ==
                                                    'Belum Berlaku')
                                                    ? '' : 'disabled' }}>Submit</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#kwitansiJbModal{{ $mutasi->id }}" {{
                                                    ($mutasi->kwitansi_jb)
                                                    ? '' : 'disabled' }}>
                                                    Lihat
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            {{-- Surat Pelepasan --}}
                            <li class="list-group-item">
                                <div class="float-left">
                                    Surat Pelepasan (Opsional, Apabila PT ke Perorangan) :
                                    @if ($mutasi->surat_pelepasan)
                                    <span class="badge badge-success">Terupload</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Ada</span>
                                    @endif
                                </div>

                                <div class="float-right">
                                    <form action="/mutasi/{{ $mutasi->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="file" name="surat_pelepasan" id="surat_pelepasan"
                                                    class="form-control">
                                                <span class="text-sm">Max: 2048 kb</span>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-success" {{ ($mutasi->status ==
                                                    'Belum Berlaku')
                                                    ? '' : 'disabled' }}>Submit</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#suratPelepasanModal{{ $mutasi->id }}" {{
                                                    ($mutasi->surat_pelepasan)
                                                    ? '' : 'disabled' }}>
                                                    Lihat
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            {{-- Cek Fisik Kendaraan --}}
                            <li class="list-group-item">
                                <div class="float-left">
                                    Cek Fisik Kendaraan :
                                    @if ($mutasi->cek_fisik_kendaraan)
                                    <span class="badge badge-success">Terupload</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Ada</span>
                                    @endif
                                </div>

                                <div class="float-right">
                                    <form action="/mutasi/{{ $mutasi->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="file" name="cek_fisik_kendaraan" id="cek_fisik_kendaraan"
                                                    class="form-control">
                                                <span class="text-sm">Max: 2048 kb</span>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-success" {{ ($mutasi->status ==
                                                    'Belum Berlaku')
                                                    ? '' : 'disabled' }}>Submit</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#cekFisikKendaraanModal{{ $mutasi->id }}" {{
                                                    ($mutasi->cek_fisik_kendaraan)
                                                    ? '' : 'disabled' }}>
                                                    Lihat
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            {{-- Surat Kuasa --}}
                            <li class="list-group-item">
                                <div class="float-left">
                                    Surat Kuasa :
                                    @if ($mutasi->surat_kuasa)
                                    <span class="badge badge-success">Terupload</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Ada</span>
                                    @endif
                                </div>

                                <div class="float-right">
                                    <form action="/mutasi/{{ $mutasi->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="file" name="surat_kuasa" id="surat_kuasa"
                                                    class="form-control">
                                                <span class="text-sm">Max: 2048 kb</span>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-success" {{ ($mutasi->status ==
                                                    'Belum Berlaku')
                                                    ? '' : 'disabled' }}>Submit</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#suratKuasaModal{{ $mutasi->id }}" {{
                                                    ($mutasi->surat_kuasa)
                                                    ? '' : 'disabled' }}>
                                                    Lihat
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal STNK --}}
<div class="modal fade" id="stnkModal{{ $mutasi->id }}" tabindex="-1" aria-labelledby="stnkModalLabel{{ $mutasi->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stnkModalLabel{{ $mutasi->id }}">Preview STNK Asli</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('images/' . $mutasi->id . '/' . $mutasi->stnk_asli) }}" alt="{{ $mutasi->id }}"
                    class="img-fluid d-block mx-auto">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal BPKB -->
<div class="modal fade" id="bpkbModal{{ $mutasi->id }}" tabindex="-1" aria-labelledby="bpkbModalLabel{{ $mutasi->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bpkbModalLabel{{ $mutasi->id }}">Preview BPKB Asli</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('images/' . $mutasi->id . '/' . $mutasi->bpkb_asli) }}" alt="{{ $mutasi->id }}"
                    class="img-fluid d-block mx-auto">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal KTP -->
<div class="modal fade" id="ktpModal{{ $mutasi->id }}" tabindex="-1" aria-labelledby="ktpModalLabel{{ $mutasi->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ktpModalLabel{{ $mutasi->id }}">Preview KTP Asli</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('images/' . $mutasi->id . '/' . $mutasi->ktp_asli) }}" alt="{{ $mutasi->id }}"
                    class="img-fluid d-block mx-auto">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kwitansi JB -->
<div class="modal fade" id="kwitansiJbModal{{ $mutasi->id }}" tabindex="-1"
    aria-labelledby="kwitansiJbModalLabel{{ $mutasi->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kwitansiJbModalLabel{{ $mutasi->id }}">Preview Kwitansi Jual Beli</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('images/' . $mutasi->id . '/' . $mutasi->kwitansi_jb) }}" alt="{{ $mutasi->id }}"
                    class="img-fluid d-block mx-auto">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Surat Pelepasan -->
<div class="modal fade" id="suratPelepasanModal{{ $mutasi->id }}" tabindex="-1"
    aria-labelledby="suratPelepasanModalLabel{{ $mutasi->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="suratPelepasanModalLabel{{ $mutasi->id }}">Preview Surat Pelepasan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('images/' . $mutasi->id . '/' . $mutasi->surat_pelepasan) }}" alt="{{ $mutasi->id }}"
                    class="img-fluid d-block mx-auto">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cek Fisik Kendaraan -->
<div class="modal fade" id="cekFisikKendaraanModal{{ $mutasi->id }}" tabindex="-1"
    aria-labelledby="cekFisikKendaraanModalLabel{{ $mutasi->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cekFisikKendaraanModalLabel{{ $mutasi->id }}">Preview Cek Fisik Kendaraan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('images/' . $mutasi->id . '/' . $mutasi->cek_fisik_kendaraan) }}"
                    alt="{{ $mutasi->id }}" class="img-fluid d-block mx-auto">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Surat Kuasa -->
<div class="modal fade" id="suratKuasaModal{{ $mutasi->id }}" tabindex="-1"
    aria-labelledby="suratKuasaModalLabel{{ $mutasi->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="suratKuasaModalLabel{{ $mutasi->id }}">Preview Surat Kuasa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('images/' . $mutasi->id . '/' . $mutasi->surat_kuasa) }}" alt="{{ $mutasi->id }}"
                    class="img-fluid d-block mx-auto">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection