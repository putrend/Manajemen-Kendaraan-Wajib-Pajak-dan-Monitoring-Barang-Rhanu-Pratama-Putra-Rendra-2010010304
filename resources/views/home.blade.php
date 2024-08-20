@extends('welcome')

@section('JUDUL', 'Home')

@section('CONTENT')
@if (session('login_sukses'))
<div id="login_sukses"></div>
@elseif (session('fail_access'))
<div id="fail_access"></div>
@endif

<div class="container">
    @if (Auth()->guard('web')->check())
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- {{ dd(Auth()) }} --}}
                    <h3>Halo {{ Auth()->user()->name }} !</h3>
                    <p>Selamat datang di Sistem Informasi Monitoring Barang Samsat Banjarbaru. Sistem ini digunakan
                        untuk memonitoring barang pada kantor Samsat Banjarbaru.</p>
                    <p>Silahkan Klik pada tombol dibawah untuk melakukan pendataan barang, ruangan, ataupun barang yang
                        keluar pada kantor Samsat Banjarbaru !</p>
                </div>
            </div>
        </div>
    </div>

    @if (auth()->user()->isAdmin())
    <div class="row">
        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Barang</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Barang</h5>
                    <p class="card-text">Saat ini terdapat {{ $barang }} barang pada sistem.</p>
                    <a href="/barang" class="btn btn-primary">Menuju Halaman Barang !</a>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Ruangan</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Ruangan</h5>
                    <p class="card-text">Saat ini terdapat {{ $ruangan }} ruangan pada sistem.</p>
                    <a href="/ruangan" class="btn btn-primary">Menuju Halaman Ruangan !</a>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Barang Keluar</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Barang Keluar</h5>
                    <p class="card-text">Saat ini terdapat {{ $barangkeluar }} Barang yang Keluar pada sistem.</p>
                    <a href="/barangkeluar" class="btn btn-primary">Menuju Halaman Barang Keluar !</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Kerusakan Barang</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Kerusakan Barang</h5>
                    <p class="card-text">Saat ini terdapat {{ $kerusakan }} Barang yang ada pada sistem.</p>
                    <a href="/kerusakan" class="btn btn-primary">Menuju Halaman Kerusakan !</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Wajib Pajak</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Wajib Pajak</h5>
                    <p class="card-text">Saat ini terdapat {{ $wajibpajak }} Wajib Pajak yang ada pada sistem.</p>
                    <a href="/wajib-pajak" class="btn btn-primary">Menuju Halaman Wajib Pajak !</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Dealer</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Dealer</h5>
                    <p class="card-text">Saat ini terdapat {{ $dealer }} Dealer yang ada pada sistem.</p>
                    <a href="/dealer" class="btn btn-primary">Menuju Halaman Dealer !</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Kendaraan</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Kendaraan</h5>
                    <p class="card-text">Saat ini terdapat {{ $kendaraan }} Kendaraan yang ada pada sistem.</p>
                    <a href="/kendaraan" class="btn btn-primary">Menuju Halaman Kendaraan !</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Mutasi</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Mutasi</h5>
                    <p class="card-text">Saat ini terdapat {{ $mutasi }} Mutasi yang ada pada sistem.</p>
                    <a href="/mutasi" class="btn btn-primary">Menuju Halaman Mutasi !</a>
                </div>
            </div>
        </div>
    </div>
    @elseif (Auth()->user()->isUPPD())
    <div class="row">
        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Barang</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Barang</h5>
                    <p class="card-text">Saat ini terdapat {{ $barang }} barang pada sistem.</p>
                    <a href="/barang" class="btn btn-primary">Menuju Halaman Barang !</a>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Ruangan</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Ruangan</h5>
                    <p class="card-text">Saat ini terdapat {{ $ruangan }} ruangan pada sistem.</p>
                    <a href="/ruangan" class="btn btn-primary">Menuju Halaman Ruangan !</a>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Barang Keluar</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Barang Keluar</h5>
                    <p class="card-text">Saat ini terdapat {{ $barangkeluar }} Barang yang Keluar pada sistem.</p>
                    <a href="/barangkeluar" class="btn btn-primary">Menuju Halaman Barang Keluar !</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Kerusakan Barang</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Kerusakan Barang</h5>
                    <p class="card-text">Saat ini terdapat {{ $kerusakan }} Barang yang ada pada sistem.</p>
                    <a href="/kerusakan" class="btn btn-primary">Menuju Halaman Kerusakan !</a>
                </div>
            </div>
        </div>
    </div>
    @elseif (auth()->user()->isSamsat())
    <div class="row">
        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Wajib Pajak</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Wajib Pajak</h5>
                    <p class="card-text">Saat ini terdapat {{ $wajibpajak }} Wajib Pajak yang ada pada sistem.</p>
                    <a href="/wajib-pajak" class="btn btn-primary">Menuju Halaman Wajib Pajak !</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Dealer</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Dealer</h5>
                    <p class="card-text">Saat ini terdapat {{ $dealer }} Dealer yang ada pada sistem.</p>
                    <a href="/dealer" class="btn btn-primary">Menuju Halaman Dealer !</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <h5 class="card-header">Kendaraan</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Kendaraan</h5>
                    <p class="card-text">Saat ini terdapat {{ $kendaraan }} Kendaraan yang ada pada sistem.</p>
                    <a href="/kendaraan" class="btn btn-primary">Menuju Halaman Kendaraan !</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Mutasi</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Mutasi</h5>
                    <p class="card-text">Saat ini terdapat {{ $mutasi }} Mutasi yang ada pada sistem.</p>
                    <a href="/mutasi" class="btn btn-primary">Menuju Halaman Mutasi !</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    @else
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- {{ dd(Auth()) }} --}}
                    <h3>Halo {{ Auth()->guard('wajibpajak')->user()->nama_wp }} !</h3>
                    <p>Selamat datang di Sistem Informasi Samsat Banjarbaru.</p>
                    <p>Silahkan Klik pada tombol dibawah untuk melihat profil ataupun mutasi yang anda daftarkan !</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Mutasi Anda</h5>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Mutasi Yang Didaftarkan</h5>
                    <p class="card-text">Saat ini terdapat {{ $mutasi }} Mutasi yang ada pada sistem.</p>
                    <a href="/mutasi" class="btn btn-primary">Menuju Halaman Mutasi !</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection