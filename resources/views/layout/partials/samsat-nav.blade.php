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