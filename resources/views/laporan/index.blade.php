@extends('welcome')

@section('JUDUL', 'Laporan')

@section('CONTENT')
<div class="content-body">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-item-center">
                            <h3 class="card-title">Laporan Data Master</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="/user/cetak" target="_blank" class="btn btn-primary"><i
                                class="fa-solid fa-print"></i>&nbsp;Cetak User</a>
                        <a href="/kategori/cetak" target="_blank" class="btn btn-primary"><i
                                class="fa-solid fa-print"></i>&nbsp;Cetak Kategori</a>
                        <a href="/wajib-pajak/cetak" target="_blank" class="btn btn-primary"><i
                                class="fa-solid fa-print"></i>&nbsp;Cetak Wajib Pajak</a>
                        <a href="/samsat/cetak" target="_blank" class="btn btn-primary"><i
                                class="fa-solid fa-print"></i>&nbsp;Cetak Samsat</a>
                        <a href="/dealer/cetak" target="_blank" class="btn btn-primary"><i
                                class="fa-solid fa-print"></i>&nbsp;Cetak Dealer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 align="center">Laporan UPPD
            </h3>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-item-center">
                                    <h3 class="card-title">Laporan Ruangan</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="GET" action="/ruangan/cetak" target="_blank">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="period">Periode</label>
                                                <input type="date" name="period" id="period" class="form-control"
                                                    placeholder="Masukkan Periode">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label>&nbsp;</label>
                                            <button type="submit" class="btn btn-primary form-control"><i
                                                    class="fa-solid fa-print"></i> Cetak Laporan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-item-center">
                                    <h3 class="card-title">Laporan Barang</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="GET" action="/barang/cetak" target="_blank">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="period">Periode</label>
                                                <input type="date" name="period" id="period" class="form-control"
                                                    placeholder="Masukkan Periode">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label>&nbsp;</label>
                                            <button type="submit" class="btn btn-primary form-control"><i
                                                    class="fa-solid fa-print"></i> Cetak Laporan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-item-center">
                                    <h3 class="card-title"> Laporan Barang Keluar</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="GET" action="/barangkeluar/cetak" target="_blank">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="period">Periode</label>
                                                <input type="date" name="period" id="period" class="form-control"
                                                    placeholder="Masukkan Periode">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label>&nbsp;</label>
                                            <button type="submit" class="btn btn-primary form-control"><i
                                                    class="fa-solid fa-print"></i> Cetak Laporan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-item-center">
                                    <h3 class="card-title"> Laporan Kerusakan</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="GET" action="/kerusakan/cetak" target="_blank">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="period">Periode</label>
                                                <input type="date" name="period" id="period" class="form-control"
                                                    placeholder="Masukkan Periode">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label>&nbsp;</label>
                                            <button type="submit" class="btn btn-primary form-control"><i
                                                    class="fa-solid fa-print"></i> Cetak Laporan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-item-center">
                                    <h3 class="card-title"> Laporan Kehilangan Barang</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="GET" action="/kehilangan/cetak" target="_blank">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="period">Periode</label>
                                                <input type="date" name="period" id="period" class="form-control"
                                                    placeholder="Masukkan Periode">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <label>&nbsp;</label>
                                            <button type="submit" class="btn btn-primary form-control"><i
                                                    class="fa-solid fa-print"></i> Cetak Laporan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 align="center">
                Laporan Samsat
            </h3>
        </div>

        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-item-center">
                                    <h3 class="card-title"> Laporan Kendaraan</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="/kendaraan/cetak" action="GET" target="_blank">
                                    <div class="row">
                                        <div class="col-5">
                                            <select name="dealer_id" id="dealer_id" class="form-control">
                                                <option value="">-- Pilih Dealer --</option>
                                                @foreach ($dealer as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_dealer }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select name="status_bpkb" id="status_bpkb" class="form-control">
                                                <option value="">-- Pilih Status BPKB --</option>
                                                <option value="Dibuat">Dibuat</option>
                                                <option value="Belum Dibuat">Belum Dibuat</option>
                                            </select>
                                        </div>

                                        <div class="col-3">
                                            <button type="submit" class="btn btn-primary form-control"><i
                                                    class="fa-solid fa-print"></i> Cetak Laporan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-item-center">
                                    <h3 class="card-title"> Laporan BPKB</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="/bpkb/cetak" action="GET" target="_blank">
                                    <div class="row">
                                        <div class="col-5">
                                            <select name="samsat_id" id="samsat_id" class="form-control">
                                                <option value="">-- Pilih Samsat Terdaftar --</option>
                                                @foreach ($samsat as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_samsat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select name="status_stnk" id="status_stnk" class="form-control">
                                                <option value="">-- Pilih Status STNK --</option>
                                                <option value="Dibuat">Dibuat</option>
                                                <option value="Belum Dibuat">Belum Dibuat</option>
                                            </select>
                                        </div>

                                        <div class="col-3">
                                            <button type="submit" class="btn btn-primary form-control"><i
                                                    class="fa-solid fa-print"></i> Cetak Laporan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-item-center">
                                    <h3 class="card-title"> Laporan STNK</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="/stnk/cetak" action="GET">
                                    <div class="row">
                                        <div class="col-9">
                                            <select name="samsat_id" id="samsat_id" class="form-control">
                                                <option value="">-- Pilih Samsat Terdaftar --</option>
                                                @foreach ($samsat as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_samsat }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-3">
                                            <button type="submit" class="btn btn-primary form-control"><i
                                                    class="fa-solid fa-print"></i> Cetak Laporan</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-item-center">
                                    <h3 class="card-title"> Laporan STNK</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="/mutasi/cetak" action="GET">
                                    <div class="row">
                                        <div class="col-3">
                                            <select name="samsat_awal_id" id="samsat_awal_id" class="form-control">
                                                <option value="">-- Pilih Samsat Awal --</option>
                                                @foreach ($samsat as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_samsat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select name="samsat_tujuan_id" id="samsat_tujuan_id" class="form-control">
                                                <option value="">-- Pilih Samsat Tujuan --</option>
                                                @foreach ($samsat as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_samsat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">-- Pilih Status Mutasi --</option>
                                                <option value="Berlaku">Berlaku</option>
                                                <option value="Belum Berlaku">Belum Berlaku</option>
                                                <option value="Dibatalkan">Dibatalkan</option>
                                            </select>
                                        </div>

                                        <div class="col-3">
                                            <button type="submit" class="btn btn-primary form-control"><i
                                                    class="fa-solid fa-print"></i> Cetak Laporan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection