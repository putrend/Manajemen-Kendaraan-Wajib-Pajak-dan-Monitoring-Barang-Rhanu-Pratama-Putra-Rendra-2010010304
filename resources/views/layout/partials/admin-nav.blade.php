{{-- Admin Only --}}
<li class="nav-item">
    <a href="/user" class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
        {{-- &emsp; --}}
        <i class="fa fa-user fa-beat-fade fa-xl nav-icon"></i>
        <p>User</p>
    </a>
</li>


{{-- Master Data UPPD --}}
<li class="nav-item {{ request()->is('sidebar') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Master Data UPPD
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/kategori" class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}">
                {{-- &emsp; --}}
                <i class="fa fa-list fa-beat-fade fa-xl nav-icon"></i>
                <p>Kategori</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/ruangan" class="nav-link {{ request()->is('ruangan*') ? 'active' : '' }}">
                {{-- &emsp; --}}
                <i class="fa-solid fa-person-shelter fa-beat-fade fa-xl nav-icon"></i>
                <p>Ruangan</p>
            </a>
        </li>
    </ul>
</li>

{{-- Master Data Samsat --}}
<li class="nav-item {{ request()->is('sidebar') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Master Data Samsat
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/wajib-pajak" class="nav-link {{ request()->is('wajib-pajak*') ? 'active' : '' }}">
                {{-- &emsp; --}}
                <i class="fa fa-user-plus  fa-beat-fade fa-xl nav-icon"></i>
                <p>Wajib Pajak</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/samsat" class="nav-link {{ request()->is('samsat*') ? 'active' : '' }}">
                {{-- &emsp; --}}
                <i class="fa-solid fa-building-user fa-beat-fade fa-xl nav-icon"></i>
                <p>Samsat</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/dealer" class="nav-link {{ request()->is('dealer*') ? 'active' : '' }}">
                {{-- &emsp; --}}
                <i class="fa-solid fa-handshake fa-beat-fade fa-xl nav-icon"></i>
                <p>Dealer</p>
            </a>
        </li>
    </ul>
</li>

{{-- UPPD Trans --}}
<li class="nav-item {{ request()->is('sidebar') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fa-solid fa-truck-ramp-box"></i>
        <p>
            Monitoring Barang
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/barang" class="nav-link {{ request()->is('barang') ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-box"></i>
                <p>
                    Barang
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/barangkeluar" class="nav-link {{ request()->is('barangkeluar') ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-arrow-right-arrow-left"></i>
                <p>
                    Barang Keluar
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/kerusakan" class="nav-link {{ request()->is('kerusakan') ? 'active' : '' }} ">
                <i class="nav-icon fa-solid fa-circle-exclamation"></i>
                <p>
                    Kerusakan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/kehilangan" class="nav-link {{ request()->is('kehilangan') ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-triangle-exclamation"></i>
                <p>
                    Kehilangan
                </p>
            </a>
        </li>

    </ul>
</li>

{{-- Samsat Trans --}}
<li class="nav-item {{ request()->is('sidebar') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fa-solid fa-motorcycle"></i>
        <p>
            Kendaraan Bermotor
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="/kendaraan" class="nav-link {{ request()->is('kendaraan') ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-motorcycle"></i>
                <p>
                    Kendaraan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/bpkb" class="nav-link {{ request()->is('bpkb') ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-envelope-open-text"></i>
                <p>
                    BPKB
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/stnk" class="nav-link {{ request()->is('stnk') ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-envelope-open-text"></i>
                <p>
                    STNK
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/mutasi" class="nav-link {{ request()->is('mutasi') ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-file-signature"></i>
                <p>
                    Mutasi
                </p>
            </a>
        </li>
    </ul>
</li>