<nav class="main-header navbar navbar-expand-lg bg-light">
    @auth
    <button class="btn btn-primary mr-2" data-widget="pushmenu" id="button-toggle">
        <i class="fas fa-bars"></i>
    </button>
    @endauth
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            {{-- @dd(Auth::user()->role) --}}
            {{-- ISIKAN DENGAN PESAN SELAMAT DATANG --}}
            <span class="fw-bold">Selamat Datang di Aplikasi Monitoring Barang Samsat Banjarbaru, Anda Login
                Sebagai <span class="text-danger">{{ (Auth()->guard('web')->check()) ?
                    auth()->guard('web')->user()->checkRole() : 'Wajib Pajak'
                    }}</span></span>

        </div>
    </div>
    @auth
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" href="#" aria-expanded="false">
                <i class="fas fa-gear"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <form action="/logout" method="POST" id="logoutform">
                        @csrf
                        <button type="submit" id="logout" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    @endauth
</nav>