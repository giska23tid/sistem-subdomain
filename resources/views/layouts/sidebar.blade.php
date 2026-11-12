
@php
    $role = $role ?? session('prototype_role', 'opd');
    $isPetugas = $role === 'petugas';
@endphp

<aside class="sidebar">

    {{-- BRAND / LOGO --}}
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <i class="bi bi-buildings-fill"></i>
        </div>

        <div class="sidebar-brand">
            <h2>SI SUBDOMAIN</h2>
            <p>Diskominfotik Inhu</p>
        </div>
    </div>

    <div class="sidebar-divider"></div>

    {{-- IDENTITAS PENGGUNA --}}
    <div class="sidebar-user">
        <div class="sidebar-user-icon">
            <i class="bi {{ $isPetugas ? 'bi-person-badge-fill' : 'bi-building-fill' }}"></i>
        </div>
        <div class="sidebar-user-info">
            <span>{{ $isPetugas ? 'PANEL PETUGAS' : 'PANEL OPD' }}</span>
            <small>{{ $isPetugas ? 'Pengelola Sistem' : 'Perangkat Daerah' }}</small>
        </div>
    </div>

    <div class="sidebar-label">MENU UTAMA</div>

    <nav class="sidebar-menu">

        {{-- DASHBOARD --}}
        @if ($isPetugas)
            <a href="{{ route('prototype.petugas') }}"
               class="{{ request()->routeIs('prototype.petugas') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-grid-1x2-fill"></i></span>
                <span class="nav-text">Dashboard</span>
            </a>
        @else
            <a href="{{ route('prototype.opd') }}"
               class="{{ request()->routeIs('prototype.opd') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-grid-1x2-fill"></i></span>
                <span class="nav-text">Dashboard</span>
            </a>
        @endif

        {{-- MENU OPD --}}
        @if ($role === 'opd')

            <div class="sidebar-label sidebar-label-group">LAYANAN SUBDOMAIN</div>

            <a href="{{ route('prototype.pendaftaran') }}"
               class="{{ request()->routeIs('prototype.pendaftaran') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-file-earmark-plus-fill"></i></span>
                <span class="nav-text">Ajukan Pendaftaran</span>
            </a>

            <a href="{{ route('prototype.perubahan') }}"
               class="{{ request()->routeIs('prototype.perubahan') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-arrow-left-right"></i></span>
                <span class="nav-text">Perubahan Nama</span>
            </a>

            <a href="{{ route('prototype.subdomain') }}"
               class="{{ request()->routeIs('prototype.subdomain') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-globe2"></i></span>
                <span class="nav-text">Subdomain Saya</span>
            </a>

        {{-- MENU PETUGAS --}}
        @elseif ($role === 'petugas')

            <div class="sidebar-label sidebar-label-group">PENGELOLAAN</div>

            <a href="{{ route('petugas.pendaftaran') }}"
               class="{{ request()->routeIs('petugas.pendaftaran') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-file-earmark-text-fill"></i></span>
                <span class="nav-text">Permohonan Pendaftaran</span>
            </a>

            <a href="{{ route('petugas.perubahan') }}"
               class="{{ request()->routeIs('petugas.perubahan') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-arrow-left-right"></i></span>
                <span class="nav-text">Perubahan Subdomain</span>
            </a>

            <a href="{{ route('petugas.subdomain') }}"
               class="{{ request()->routeIs('petugas.subdomain') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-globe2"></i></span>
                <span class="nav-text">Data Subdomain</span>
            </a>

            <div class="sidebar-label sidebar-label-group">PEMANTAUAN</div>

            <a href="{{ route('petugas.monitoring') }}"
               class="{{ request()->routeIs('petugas.monitoring*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-activity"></i></span>
                <span class="nav-text">Monitoring</span>
            </a>

            <a href="{{ route('petugas.laporan') }}"
               class="{{ request()->routeIs('petugas.laporan*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-file-earmark-bar-graph-fill"></i></span>
                <span class="nav-text">Laporan Monitoring</span>
            </a>

        @endif

    </nav>

    {{-- BAGIAN BAWAH --}}
    <div class="sidebar-bottom">
        <div class="sidebar-divider"></div>

        <div class="sidebar-footer-info">
            <i class="bi bi-shield-check"></i>
            <span>Sistem Informasi Subdomain</span>
        </div>

        <a href="{{ $isPetugas ? route('login.petugas') : route('login.opd') }}"
           class="logout-link"
           onclick="return confirm('Apakah kamu yakin ingin keluar?')">
            <span class="nav-icon"><i class="bi bi-box-arrow-right"></i></span>
            <span class="nav-text">Keluar</span>
        </a>
    </div>

</aside>
