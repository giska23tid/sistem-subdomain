
@php
    $role = $role ?? session('prototype_role', 'opd');
@endphp

<aside class="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">D</div>

        <div class="sidebar-brand">
            <h2>Diskominfotik</h2>
            <p>Kab. Indragiri Hulu</p>
        </div>
    </div>

    <div class="sidebar-divider"></div>

    <div class="sidebar-label">MENU UTAMA</div>

    <nav class="sidebar-menu">

        {{-- MENU DASHBOARD --}}
        @if ($role === 'petugas')
            <a href="{{ route('prototype.petugas') }}"
               class="{{ request()->routeIs('prototype.petugas') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-house"></i></span>
                <span class="nav-text">Dashboard</span>
            </a>
        @else
            <a href="{{ route('prototype.opd') }}"
               class="{{ request()->routeIs('prototype.opd') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-house"></i></span>
                <span class="nav-text">Dashboard</span>
            </a>
        @endif

        {{-- MENU KHUSUS OPD --}}
        @if ($role === 'opd')

            <a href="{{ route('prototype.pendaftaran') }}"
               class="{{ request()->routeIs('prototype.pendaftaran') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-plus-square"></i></span>
                <span class="nav-text">Ajukan Pendaftaran</span>
            </a>

            <a href="{{ route('prototype.perubahan') }}"
               class="{{ request()->routeIs('prototype.perubahan') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-arrow-repeat"></i></span>
                <span class="nav-text">Ajukan Perubahan Nama</span>
            </a>

            <a href="{{ route('prototype.subdomain') }}"
               class="{{ request()->routeIs('prototype.subdomain') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-globe2"></i></span>
                <span class="nav-text">Subdomain Saya</span>
            </a>

        {{-- MENU KHUSUS PETUGAS --}}
        @elseif ($role === 'petugas')

            <a href="{{ route('petugas.pendaftaran') }}"
               class="{{ request()->routeIs('petugas.pendaftaran') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-card-list"></i></span>
                <span class="nav-text">Permohonan Pendaftaran</span>
            </a>

            <a href="{{ route('petugas.perubahan') }}"
               class="{{ request()->routeIs('petugas.perubahan') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-arrow-repeat"></i></span>
                <span class="nav-text">Permohonan Perubahan Subdomain</span>
            </a>

            <a href="{{ route('petugas.subdomain') }}"
               class="{{ request()->routeIs('petugas.subdomain') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-globe2"></i></span>
                <span class="nav-text">Data Subdomain</span>
            </a>

            <a href="{{ route('petugas.monitoring') }}"
               class="{{ request()->routeIs('petugas.monitoring*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-clock-history"></i></span>
                <span class="nav-text">Monitoring</span>
            </a>

           <a href="{{ route('petugas.laporan') }}"
                class="{{ request()->routeIs('petugas.laporan*') ? 'active' : '' }}">
                    <span class="nav-icon">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </span>
                    <span>Laporan Monitoring</span>
                </a>

        @endif

    </nav>

    <div class="sidebar-bottom">
        <div class="sidebar-divider"></div>

        <a href="{{ $role === 'petugas' ? route('login.petugas') : route('login.opd') }}"
           class="logout-link"
           onclick="return confirm('Apakah kamu yakin ingin keluar?')">
            <span class="nav-icon"><i class="bi bi-box-arrow-right"></i></span>
            <span class="nav-text">Keluar</span>
        </a>
    </div>
</aside>
