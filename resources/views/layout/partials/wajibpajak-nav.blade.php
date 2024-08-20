<li class="nav-item">
    <a href="/wajib-pajak/{{ Auth()->guard('wajibpajak')->user()->id }}"
        class="nav-link {{ request()->is('wajib-pajak') ? 'active' : '' }}">
        <i class="nav-icon fa-solid fa-file-signature"></i>
        <p>
            Profil
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