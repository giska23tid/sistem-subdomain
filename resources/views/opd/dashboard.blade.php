<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard OPD - Layanan Subdomain</title>

    {{-- CSS Sidebar Bersama --}}
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f5f9;
            color: #10264a;
            font-size: 12px;
        }

        button,
        a {
            font-family: inherit;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* KONTEN UTAMA */
        .main-content {
            margin-left: 240px;
            min-height: 100vh;
            padding: 30px 35px 40px;
            box-sizing: border-box;
        }

        /* HEADER HALAMAN */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 16px;
        }

        .page-title h1 {
            font-size: 21px;
            color: #122849;
            margin-bottom: 5px;
        }

        .page-title p {
            color: #64748b;
            font-size: 11px;
            line-height: 1.5;
        }

        .header-actions {
            display: flex;
            gap: 8px;
            flex-shrink: 0;
        }

        /* TOMBOL */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #2854a2;
            border-radius: 6px;
            padding: 9px 12px;
            min-height: 32px;
            font-size: 10px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn-primary {
            background: #2854a2;
            color: white;
        }

        .btn-primary:hover {
            background: #1d427f;
        }

        .btn-outline {
            color: #2854a2;
            background: white;
        }

        .btn-outline:hover {
            background: #edf3ff;
        }

        /* KARTU RINGKASAN */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin-bottom: 17px;
        }

        .summary-card {
            min-height: 88px;
            padding: 15px 14px;
            background: white;
            border: 1px solid #dfe6f0;
            border-radius: 9px;
        }

        .summary-label {
            color: #304461;
            font-size: 11px;
            margin-bottom: 6px;
        }

        .summary-number {
            font-size: 28px;
            line-height: 1;
            font-weight: bold;
            color: #10264a;
        }

        .status-summary {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 8px;
        }

        /* BADGE STATUS */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 8px;
            border-radius: 20px;
            white-space: nowrap;
            font-size: 10px;
            line-height: 1;
        }

        .badge::before {
            content: "";
            width: 6px;
            height: 6px;
            flex-shrink: 0;
            border-radius: 50%;
            background: currentColor;
        }

        .pending {
            color: #9a6500;
            background: #fff0c9;
        }

        .approved {
            color: #087d50;
            background: #d8f5e7;
        }

        .rejected {
            color: #b72e35;
            background: #fbdcdd;
        }

        .active-status {
            color: #087d50;
            background: #d8f5e7;
        }

        /* PANEL */
        .panel {
            background: white;
            border: 1px solid #dfe6f0;
            border-radius: 9px;
            padding: 15px 14px;
            margin-bottom: 16px;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 10px;
        }

        .panel-header h2 {
            font-size: 13px;
            color: #10264a;
        }

        /* TABEL */
        .table-wrapper {
            overflow-x: auto;
            width: 100%;
            scrollbar-color: #999 #f2f2f2;
            scrollbar-width: thin;
        }

        .table-wrapper table {
            width: 100%;
            min-width: 760px;
            border-collapse: collapse;
            text-align: left;
        }

        .table-wrapper thead {
            background: #edf1f8;
        }

        .table-wrapper th {
            font-weight: normal;
            color: #304461;
            font-size: 10px;
            padding: 9px 8px;
            white-space: nowrap;
        }

        .table-wrapper th:first-child {
            border-radius: 5px 0 0 5px;
        }

        .table-wrapper th:last-child {
            border-radius: 0 5px 5px 0;
        }

        .table-wrapper td {
            padding: 10px 8px;
            border-bottom: 1px solid #edf0f5;
            font-size: 10px;
            vertical-align: top;
            line-height: 1.45;
        }

        .table-wrapper tbody tr:last-child td {
            border-bottom: none;
        }

        .request-number {
            white-space: nowrap;
        }

        .domain-name {
            font-weight: bold;
            color: #10264a;
            overflow-wrap: anywhere;
        }

        .subdomain-note {
            display: block;
            margin-top: 2px;
            font-size: 9px;
            color: #64748b;
        }

        .rejection-reason {
            display: inline-block;
            color: #c52f38;
            max-width: 145px;
            line-height: 1.5;
        }

        /* DAFTAR SUBDOMAIN */
        .subdomain-list {
            display: flex;
            flex-direction: column;
        }

        .subdomain-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 10px 3px;
            border-bottom: 1px solid #edf0f5;
        }

        .subdomain-item:last-child {
            border-bottom: none;
        }

        .subdomain-info {
            min-width: 0;
        }

        .subdomain-info .domain-name {
            display: block;
            font-size: 11px;
            margin-bottom: 2px;
        }

        .subdomain-info p {
            font-size: 9px;
            color: #64748b;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .empty-state {
            padding: 20px;
            text-align: center;
            color: #64748b;
        }

        /* NOTIFIKASI */
        .notification-list {
            display: flex;
            flex-direction: column;
        }

        .notification-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 13px 5px;
            border-bottom: 1px solid #edf0f5;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-icon {
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 15px;
        }

        .notification-icon.success {
            color: #087d50;
            background: #d8f5e7;
        }

        .notification-icon.danger {
            color: #b72e35;
            background: #fbdcdd;
        }

        .notification-content {
            flex: 1;
            min-width: 0;
        }

        .notification-content h3 {
            font-size: 11px;
            color: #10264a;
            margin-bottom: 5px;
        }

        .notification-content p {
            font-size: 10px;
            color: #64748b;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .notification-date {
            display: block;
            margin-top: 5px;
            font-size: 9px;
            color: #94a3b8;
        }

        .notification-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 19px;
            height: 19px;
            padding: 0 6px;
            margin-left: 5px;
            border-radius: 20px;
            background: #fbdcdd;
            color: #b72e35;
            font-size: 10px;
            font-weight: bold;
        }

        /* TABLET DAN LAPTOP KECIL */
        @media (max-width: 1000px) {
            .main-content {
                padding: 25px 20px 30px;
            }

            .page-header {
                flex-direction: column;
            }

            .header-actions {
                flex-wrap: wrap;
            }

            .summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .summary-card:last-child {
                grid-column: 1 / -1;
            }
        }

        /* PONSEL */
        
        /* RESPONSIVE TABLET */
        @media (max-width: 1000px) {
            .main-content {
                margin-left: 220px;
                padding: 25px 20px 30px;
            }

            .page-header {
                flex-wrap: wrap;
            }

            .summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .summary-card:last-child {
                grid-column: 1 / -1;
            }
        }

        /* RESPONSIVE HP */
        @media (max-width: 760px) {
            .main-content {
                width: 100%;
                margin-left: 0;
                padding: 20px 15px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-actions {
                width: 100%;
                flex-wrap: wrap;
            }

            .summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .summary-card:last-child {
                grid-column: 1 / -1;
            }

            .panel {
                padding: 13px 10px;
            }

            .panel-header {
                flex-wrap: wrap;
            }
        }

        /* RESPONSIVE HP KECIL */
        @media (max-width: 480px) {
            .main-content {
                padding: 16px 12px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .summary-card:last-child {
                grid-column: auto;
            }

            .header-actions {
                flex-direction: column;
            }

            .header-actions .btn {
                width: 100%;
            }

            .subdomain-item {
                align-items: flex-start;
            }

            .page-title h1 {
                font-size: 19px;
            }
        }

        .mobile-header {
            display: none;
        }

        .mobile-menu-toggle {
            width: 38px;
            height: 38px;
            border: 1px solid #dfe6f0;
            border-radius: 8px;
            background: white;
            color: #152b4d;
            font-size: 21px;
            cursor: pointer;
            display: grid;
            place-items: center;
        }

        @media (max-width: 760px) {
            .mobile-header {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 18px;
                color: #152b4d;
                font-size: 14px;
                font-weight: bold;
            }
        }
        .summary-card-link {
            display: block;
            color: inherit;
            text-decoration: none;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .summary-card-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(16, 38, 74, 0.10);
        }

        .summary-card-link:focus-visible {
            outline: 2px solid #2854a2;
            outline-offset: 3px;
        }
    </style>
</head>
<script>
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.querySelector('.sidebar');

    menuToggle?.addEventListener('click', () => {
        const isOpen = sidebar.classList.toggle('open');

        menuToggle.setAttribute('aria-expanded', String(isOpen));
    });

    document.addEventListener('click', (event) => {
        if (
            window.innerWidth <= 760 &&
            sidebar?.classList.contains('open') &&
            !sidebar.contains(event.target) &&
            !menuToggle?.contains(event.target)
        ) {
            sidebar.classList.remove('open');
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    });
</script>
<body>

    {{-- SIDEBAR BERSAMA --}}
    @include('layouts.sidebar', ['role' => 'opd'])

    {{-- KONTEN DASHBOARD --}}
    <main class="main-content">

    <header class="mobile-header">
        <button
            type="button"
            class="mobile-menu-toggle"
            id="menuToggle"
            aria-label="Buka menu"
            aria-expanded="false"
        >
            <i class="bi bi-list"></i>
        </button>

        <span>Dashboard OPD</span>
    </header>

        
    {{-- RINGKASAN PERMOHONAN --}}
    <section class="summary-grid">

        {{-- KARTU PENDAFTARAN --}}
        <a href="{{ route('prototype.pendaftaran') }}"
        class="summary-card summary-card-link">

            <p class="summary-label">Permohonan pendaftaran</p>

            <p class="summary-number">
                {{ $totalPendaftaran }}
            </p>

        </a>


        {{-- KARTU PERUBAHAN --}}
        <a href="{{ route('prototype.perubahan') }}"
        class="summary-card summary-card-link">

            <p class="summary-label">Permohonan perubahan nama</p>

            <p class="summary-number">
                {{ $totalPerubahan }}
            </p>

        </a>


        {{-- KARTU STATUS KEPUTUSAN --}}
        <a href="#permohonan"
        class="summary-card summary-card-link">

            <p class="summary-label">Status keputusan</p>

            <div class="status-summary">

                <span class="badge pending">
                    Diajukan : {{ $totalDiajukan }}
                </span>

                <span class="badge approved">
                    Diterima : {{ $totalDiterima }}
                </span>

                <span class="badge rejected">
                    Ditolak : {{ $totalDitolak }}
                </span>

            </div>

        </a>

    </section>
    
        
    {{-- NOTIFIKASI OPD --}}
    <section class="panel" id="notifikasi">

        <div class="panel-header">
            <h2>
                Notifikasi

                @if ($jumlahNotifikasiBelumDibaca > 0)
                    <span class="notification-count">
                        {{ $jumlahNotifikasiBelumDibaca }}
                    </span>
                @endif
            </h2>

            @if ($jumlahNotifikasiBelumDibaca > 0)
                <form
                    action="{{ route('opd.notifikasi.dibacaSemua') }}"
                    method="POST"
                >
                    @csrf

                    <button type="submit" class="btn btn-outline">
                        Tandai semua dibaca
                    </button>
                </form>
            @endif
        </div>

        {{-- PESAN BERHASIL --}}
        @if (session('success'))
            <p style="color: #087d50; font-size: 10px; margin-bottom: 10px;">
                <i class="bi bi-check-circle"></i>
                {{ session('success') }}
            </p>
        @endif

        <div class="notification-list">

            @forelse ($notifikasiTerbaru as $notifikasi)

                @php
                    $data = $notifikasi->data;
                    $diterima = ($data['status'] ?? '') === 'diterima';
                @endphp

                <div class="notification-item">

                    <div class="notification-icon {{ $diterima ? 'success' : 'danger' }}">
                        <i class="bi {{ $diterima ? 'bi-check-circle-fill' : 'bi-exclamation-circle-fill' }}"></i>
                    </div>

                    <div class="notification-content">

                        <h3>
                            {{ $diterima ? 'Permohonan Diterima' : 'Informasi Penolakan Permohonan' }}

                            @if (!$notifikasi->read_at)
                                <span class="badge pending">Baru</span>
                            @else
                                <span class="badge active-status">Sudah dibaca</span>
                            @endif
                        </h3>

                        <p>
                            {{ $data['pesan'] ?? 'Terdapat pembaruan status permohonan Anda.' }}
                        </p>

                        <p>
                            <strong>Subdomain:</strong>
                            {{ $data['nama_subdomain'] ?? '-' }}
                        </p>

                        @if (($data['status'] ?? '') === 'ditolak')
                            <p>
                                <strong>Alasan penolakan:</strong>
                                {{ $data['catatan'] ?? 'Tidak ada alasan yang dicantumkan.' }}
                            </p>
                        @endif

                        @if ($diterima)
                            <p>
                                Surat tindak lanjut dapat diunduh melalui halaman permohonan Anda.
                            </p>
                        @endif

                        <span class="notification-date">
                            {{ $notifikasi->created_at?->format('d M Y, H:i') }}
                        </span>

                        @if (!$notifikasi->read_at)
                            <form
                                action="{{ route('opd.notifikasi.dibaca', $notifikasi->id) }}"
                                method="POST"
                                style="margin-top: 8px;"
                            >
                                @csrf

                                <button type="submit" class="btn btn-outline">
                                    Tandai sudah dibaca
                                </button>
                            </form>
                        @endif

                    </div>

                </div>

            @empty

                <div class="empty-state">
                    <i class="bi bi-bell" style="font-size: 24px;"></i>
                    <p style="margin-top: 8px;">
                        Belum ada notifikasi.
                    </p>
                </div>

            @endforelse

        </div>

    </section>

        {{-- TABEL PERMOHONAN TERBARU --}}
        <section class="panel" id="permohonan">

            <div class="panel-header">
                <h2>Permohonan terbaru</h2>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No. Permohonan</th>
                            <th>Jenis</th>
                            <th>Subdomain</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Alasan penolakan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($permohonanTerbaru as $item)
                            <tr>
                                <td class="request-number">
                                    PD-{{ $item->created_at?->format('Y') }}-{{ str_pad($item->id, 3, '0', STR_PAD_LEFT) }}
                                </td>

                                <td>
                                    {{ $item->jenis_permohonan === 'pendaftaran'
                                        ? 'Pendaftaran'
                                        : 'Perubahan nama' }}
                                </td>

                                <td>
                                    <span class="domain-name">
                                        {{ $item->nama_subdomain }}
                                    </span>

                                    @if ($item->jenis_permohonan === 'perubahan' && $item->subdomain_lama)
                                        <span class="subdomain-note">
                                            Menggantikan {{ $item->subdomain_lama }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $item->created_at?->format('d M Y') }}
                                </td>

                                <td>
                                    @if ($item->status === 'diajukan')
                                        <span class="badge pending">Diajukan</span>
                                    @elseif ($item->status === 'diterima')
                                        <span class="badge approved">Diterima</span>
                                    @else
                                        <span class="badge rejected">Ditolak</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($item->status === 'ditolak')
                                        <span class="rejection-reason">
                                            {{ $item->catatan ?? 'Tidak ada alasan yang dicantumkan.' }}
                                        </span>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty-state">
                                    Belum ada permohonan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </section>

        {{-- DAFTAR SUBDOMAIN MILIK OPD --}}
        <section class="panel" id="subdomain">

            <div class="panel-header">
                <h2>Subdomain milik OPD</h2>

                <a href="{{ route('prototype.subdomain') }}"
                   class="btn btn-outline">
                    Lihat semua
                </a>
            </div>

            <div class="subdomain-list">

                @forelse ($subdomains as $subdomain)
                    <div class="subdomain-item">

                        <div class="subdomain-info">
                            <span class="domain-name">
                                {{ $subdomain->nama_subdomain }}
                            </span>

                            <p>
                                @if ($subdomain->status === 'aktif')
                                    Aktif sejak
                                    {{ $subdomain->tanggal_aktif
                                        ? \Carbon\Carbon::parse($subdomain->tanggal_aktif)->format('d M Y')
                                        : '-' }}.
                                @else
                                    Subdomain berstatus nonaktif.
                                @endif
                            </p>
                        </div>

                        @if ($subdomain->status === 'aktif')
                            <span class="badge active-status">Aktif</span>
                        @else
                            <span class="badge rejected">Nonaktif</span>
                        @endif

                    </div>
                @empty
                    <div class="empty-state">
                        Belum ada data subdomain.
                    </div>
                @endforelse

            </div>
        </section>

    </main>

</body>
</html>
