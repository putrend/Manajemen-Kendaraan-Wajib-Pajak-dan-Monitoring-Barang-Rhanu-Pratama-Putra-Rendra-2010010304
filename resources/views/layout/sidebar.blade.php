{{-- BUAT ROLE --}}
@php
$user_role = auth()->user()->role;
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/home" class="brand-link">
        <img src="{{ url('dist/img/bootstrap-5-logo-icon.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-2" style="opacity: .8">
        <span class="brand-text font-weight-light">SI Monitoring Barang</span>
    </a>
    <div class="sidebar" id="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('dist/img/avatar4.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-white">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/home" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (Auth()->guard('web')->check())
                @includeWhen(Auth::guard('web')->user()->isAdmin(), 'layout.partials.admin-nav')
                @includeWhen(Auth::guard('web')->user()->isUPPD(), 'layout.partials.uppd-nav')
                @includeWhen(Auth::guard('web')->user()->isSamsat(), 'layout.partials.samsat-nav')
                @elseif (Auth()->guard('wajibpajak')->check())
                @includeWhen(Auth()->guard('wajibpajak')->check(), 'layout.partials.wajibpajak-nav')
                @endif

            </ul>
        </nav>
    </div>
</aside>