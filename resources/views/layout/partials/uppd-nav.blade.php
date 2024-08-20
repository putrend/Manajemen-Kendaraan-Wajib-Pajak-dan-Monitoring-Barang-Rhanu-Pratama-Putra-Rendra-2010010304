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