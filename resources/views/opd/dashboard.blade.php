
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard OPD - SI Subdomain</title>

    {{-- Bootstrap Icons --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    {{-- CSS Sidebar Bersama --}}
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f3f6fb;
            color: #24364b;
            font-size: 14px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
        }

        /* =====================================
           KONTEN UTAMA
        ===================================== */

        .main-content {
            margin-left: 270px;
            min-height: 100vh;
            padding: 32px 38px 45px;
        }

        /* =====================================
           HEADER MOBILE
        ===================================== */

        .mobile-header {
            display: none;
        }

        .mobile-menu-toggle {
            width: 40px;
            height: 40px;
            border: 1px solid #dfe6f0;
            border-radius: 9px;
            background: #ffffff;
            color: #123b65;
            font-size: 21px;
            cursor: pointer;
            display: grid;
            place-items: center;
        }

        /* =====================================
           HEADER DASHBOARD
        ===================================== */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 27px;
        }

        .page-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 9px;
            color: #1769a6;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .page-heading h1 {
            font-size: 27px;
            font-weight: 750;
            color: #123b65;
            margin-bottom: 7px;
        }

        .page-heading p {
            font-size: 13px;
            color: #718096;
            line-height: 1.6;
        }

        .page-date {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 11px 15px;
            border: 1px solid #e0e8f2;
            border-radius: 10px;
            background: #ffffff;
            color: #52667e;
            font-size: 12px;
            white-space: nowrap;
        }

        .page-date i {
            color: #1769a6;
            font-size: 16px;
        }

        /* =====================================
           TOMBOL
        ===================================== */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            border: 1px solid #1769a6;
            border-radius: 8px;
            padding: 9px 14px;
            min-height: 36px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: #1769a6;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #123b65;
        }

        .btn-outline {
            color: #1769a6;
            border-color: #c9d9e9;
            background: #ffffff;
        }

        .btn-outline:hover {
            color: #123b65;
            background: #edf5fc;
        }

        /* =====================================
           KARTU RINGKASAN
        ===================================== */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .summary-card {
            position: relative;
            min-height: 145px;
            padding: 21px;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e5ebf3;
            border-radius: 15px;
            box-shadow: 0 3px 12px rgba(25, 55, 90, 0.035);
        }

        .summary-card::after {
            content: "";
            position: absolute;
            right: -22px;
            bottom: -37px;
            width: 105px;
            height: 105px;
            border-radius: 50%;
            background: rgba(23, 105, 166, 0.06);
            pointer-events: none;
        }

        .summary-card-link {
            display: block;
            color: inherit;
            text-decoration: none;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .summary-card-link:hover {
            transform: translateY(-4px);
            border-color: #b7d5ef;
            box-shadow: 0 9px 24px rgba(18, 59, 101, 0.09);
        }

        .summary-card-link:focus-visible {
            outline: 2px solid #2854a2;
            outline-offset: 3px;
        }

        .summary-label {
            position: relative;
            z-index: 1;
            color: #718096;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .summary-number {
            position: relative;
            z-index: 1;
            font-size: 34px;
            font-weight: 750;
            color: #123b65;
        }

        .summary-card:nth-child(1) {
            border-top: 4px solid #1769a6;
        }

        .summary-card:nth-child(2) {
            border-top: 4px solid #14a38b;
        }

        .summary-card:nth-child(3) {
            border-top: 4px solid #e5a43b;
        }

        .status-summary {
            position: relative;
            z-index: 1;
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
            margin-top: 12px;
        }

        /* =====================================
           BADGE STATUS
        ===================================== */

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 10px;
            border-radius: 20px;
            white-space: nowrap;
            font-size: 10px;
            font-weight: 650;
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

        .approved,
        .active-status {
            color: #087d50;
            background: #d8f5e7;
        }

        .rejected {
            color: #b72e35;
            background: #fbdcdd;
        }

        /* =====================================
           PANEL
        ===================================== */

        .panel {
            padding: 23px;
            margin-bottom: 22px;
            background: #ffffff;
            border: 1px solid #e6ebf2;
            border-radius: 15px;
            box-shadow: 0 3px 12px rgba(25, 55, 90, 0.035);
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
            padding-bottom: 14px;
            border-bottom: 1px solid #edf1f6;
        }

        .panel-header h2 {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #123b65;
            font-size: 16px;
            font-weight: 700;
        }

        /* =====================================
           TABEL PERMOHONAN
        ===================================== */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #e9eef5;
            border-radius: 10px;
            scrollbar-width: thin;
            scrollbar-color: #b7c5d5 #f2f5f9;
        }

        .table-wrapper table {
            width: 100%;
            min-width: 800px;
            border-collapse: separate;
            border-spacing: 0;
            text-align: left;
        }

        .table-wrapper thead {
            background: #f2f6fb;
        }

        .table-wrapper th {
            padding: 14px 13px;
            color: #52677f;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .table-wrapper td {
            padding: 15px 13px;
            color: #526174;
            font-size: 11px;
            border-bottom: 1px solid #edf0f5;
            vertical-align: top;
            line-height: 1.6;
        }

        .table-wrapper tbody tr {
            transition: background 0.2s ease;
        }

        .table-wrapper tbody tr:hover {
            background: #f8fbff;
        }

        .table-wrapper tbody tr:last-child td {
            border-bottom: none;
        }

        .request-number {
            white-space: nowrap;
            font-weight: 650;
            color: #52677f;
        }

        .domain-name {
            color: #123b65;
            font-size: 11px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .subdomain-note {
            display: block;
            margin-top: 5px;
            font-size: 10px;
            color: #64748b;
        }

        .rejection-reason {
            display: inline-block;
            color: #c52f38;
            max-width: 160px;
            font-size: 11px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        /* =====================================
           DAFTAR SUBDOMAIN
        ===================================== */

        .subdomain-list {
            display: flex;
            flex-direction: column;
        }

        .subdomain-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 15px 8px;
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
            font-size: 13px;
            margin-bottom: 5px;
        }

        .subdomain-info p {
            font-size: 11px;
            color: #64748b;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        /* =====================================
           NOTIFIKASI
        ===================================== */

        .notification-list {
            display: flex;
            flex-direction: column;
        }

        .notification-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 17px 8px;
            border-bottom: 1px solid #edf0f5;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-icon {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 19px;
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
            font-size: 13px;
            font-weight: 700;
            color: #123b65;
            margin-bottom: 7px;
        }

        .notification-content p {
            font-size: 12px;
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 4px;
            overflow-wrap: anywhere;
        }

        .notification-date {
            display: block;
            margin-top: 8px;
            font-size: 10px;
            color: #94a3b8;
        }

        .notification-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 21px;
            height: 21px;
            padding: 0 6px;
            margin-left: 5px;
            border-radius: 20px;
            background: #fbdcdd;
            color: #b72e35;
            font-size: 10px;
            font-weight: bold;
        }

        .btn-download-surat {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 9px;
            padding: 9px 13px;
            border: 1px solid #087d50;
            border-radius: 8px;
            background: #087d50;
            color: #ffffff;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s ease;
        }

        .btn-download-surat:hover {
            background: #066640;
            color: #ffffff;
        }

        .btn-download-surat i {
            font-size: 13px;
        }

        /* =====================================
           EMPTY STATE
        ===================================== */

        .empty-state {
            padding: 30px 15px;
            text-align: center;
            color: #8795a7;
            font-size: 12px;
        }

        .empty-state i {
            font-size: 27px;
            color: #a9bacb;
        }

        /* =====================================
           RESPONSIVE TABLET
        ===================================== */

        @media (max-width: 1000px) {
            .main-content {
                padding: 25px 22px 35px;
            }

            .summary-grid {
                gap: 12px;
            }
        }

        /* =====================================
           RESPONSIVE HP
        ===================================== */

        @media (max-width: 760px) {
            .main-content {
                width: 100%;
                margin-left: 0;
                padding: 20px 15px 35px;
            }

            .mobile-header {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 22px;
                color: #123b65;
                font-size: 14px;
                font-weight: 700;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                margin-bottom: 22px;
            }

            .page-heading h1 {
                font-size: 23px;
            }

            .page-date {
                width: 100%;
            }

            .summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .summary-card:last-child {
                grid-column: 1 / -1;
            }

            .panel {
                padding: 17px 13px;
            }

            .panel-header {
                align-items: flex-start;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 16px 12px 30px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .summary-card:last-child {
                grid-column: auto;
            }

            .summary-card {
                min-height: 120px;
            }

            .page-heading h1 {
                font-size: 21px;
            }

            .notification-item {
                gap: 10px;
                padding: 14px 3px;
            }

            .notification-icon {
                width: 37px;
                height: 37px;
            }

            .subdomain-item {
                align-items: flex-start;
            }

            .panel-header {
                gap: 10px;
            }
        }
    </style>
</head>

<body>

    {{-- SIDEBAR BERSAMA --}}
    @include('layouts.sidebar', ['role' => 'opd'])

    {{-- KONTEN DASHBOARD --}}
    <main class="main-content">

        {{-- HEADER MOBILE --}}
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

        {{-- HEADER DASHBOARD --}}
        <header class="page-header">

            <div class="page-heading">
                <span class="page-eyebrow">
                    <i class="bi bi-grid-1x2-fill"></i>
                    AREA PERANGKAT DAERAH
                </span>

                <h1>Dashboard OPD</h1>

                <p>
                    Selamat datang di layanan pengelolaan permohonan
                    dan monitoring subdomain.
                </p>
            </div>

            <div class="page-date">
                <i class="bi bi-calendar3"></i>
                <span>{{ now()->translatedFormat('l, d F Y') }}</span>
            </div>

        </header>

        {{-- =====================================
             RINGKASAN PERMOHONAN
        ====================================== --}}

        <section class="summary-grid">

            {{-- PENDAFTARAN --}}
            <a
                href="{{ route('prototype.pendaftaran') }}"
                class="summary-card summary-card-link"
            >
                <p class="summary-label">
                    <i class="bi bi-file-earmark-plus"></i>
                    Permohonan Pendaftaran
                </p>

                <p class="summary-number">
                    {{ $totalPendaftaran }}
                </p>
            </a>

            {{-- PERUBAHAN --}}
            <a
                href="{{ route('prototype.perubahan') }}"
                class="summary-card summary-card-link"
            >
                <p class="summary-label">
                    <i class="bi bi-arrow-left-right"></i>
                    Permohonan Perubahan Nama
                </p>

                <p class="summary-number">
                    {{ $totalPerubahan }}
                </p>
            </a>

            {{-- STATUS KEPUTUSAN --}}
            <a
                href="#permohonan"
                class="summary-card summary-card-link"
            >
                <p class="summary-label">
                    <i class="bi bi-clipboard-check"></i>
                    Status Keputusan
                </p>

                <div class="status-summary">

                    <span class="badge pending">
                        Diajukan: {{ $totalDiajukan }}
                    </span>

                    <span class="badge approved">
                        Diterima: {{ $totalDiterima }}
                    </span>

                    <span class="badge rejected">
                        Ditolak: {{ $totalDitolak }}
                    </span>

                </div>
            </a>

        </section>

        {{-- =====================================
             NOTIFIKASI OPD
        ====================================== --}}

        <section class="panel" id="notifikasi">

            <div class="panel-header">

                <h2>
                    <i class="bi bi-bell"></i>
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
                            <i class="bi bi-check2-all"></i>
                            Tandai semua dibaca
                        </button>
                    </form>
                @endif

            </div>

            {{-- PESAN BERHASIL --}}
            @if (session('success'))
                <p style="color: #087d50; font-size: 12px; margin-bottom: 12px;">
                    <i class="bi bi-check-circle-fill"></i>
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
                                {{ $diterima
                                    ? 'Permohonan Diterima'
                                    : 'Informasi Penolakan Permohonan'
                                }}

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

                            @if ($diterima && !empty($data['surat_id']))

                                <a
                                    href="{{ route('opd.surat.download', $data['surat_id']) }}"
                                    class="btn-download-surat"
                                >
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                    Unduh Surat Tindak Lanjut
                                </a>

                            @elseif ($diterima)

                                <p style="margin-top: 8px; color: #64748b;">
                                    <i class="bi bi-info-circle"></i>
                                    Surat tindak lanjut belum tersedia.
                                </p>

                            @endif

                            <span class="notification-date">
                                <i class="bi bi-clock"></i>
                                {{ $notifikasi->created_at?->format('d M Y, H:i') }}
                            </span>

                            @if (!$notifikasi->read_at)

                                <form
                                    action="{{ route('opd.notifikasi.dibaca', $notifikasi->id) }}"
                                    method="POST"
                                    style="margin-top: 10px;"
                                >
                                    @csrf

                                    <button type="submit" class="btn btn-outline">
                                        <i class="bi bi-check2"></i>
                                        Tandai sudah dibaca
                                    </button>
                                </form>

                            @endif

                        </div>

                    </div>

                @empty

                    <div class="empty-state">
                        <i class="bi bi-bell"></i>
                        <p style="margin-top: 8px;">
                            Belum ada notifikasi.
                        </p>
                    </div>

                @endforelse

            </div>

        </section>

        {{-- =====================================
             TABEL PERMOHONAN TERBARU
        ====================================== --}}

        <section class="panel" id="permohonan">

            <div class="panel-header">
                <h2>
                    <i class="bi bi-file-earmark-text"></i>
                    Permohonan Terbaru
                </h2>
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
                            <th>Alasan Penolakan</th>
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
                                        : 'Perubahan nama'
                                    }}
                                </td>

                                <td>
                                    <span class="domain-name">
                                        {{ $item->nama_subdomain }}
                                    </span>

                                    @if (
                                        $item->jenis_permohonan === 'perubahan'
                                        && $item->subdomain_lama
                                    )
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

        {{-- =====================================
             SUBDOMAIN MILIK OPD
        ====================================== --}}

        <section class="panel" id="subdomain">

            <div class="panel-header">

                <h2>
                    <i class="bi bi-globe2"></i>
                    Subdomain Milik OPD
                </h2>

                <a
                    href="{{ route('prototype.subdomain') }}"
                    class="btn btn-outline"
                >
                    Lihat Semua
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>

            <div class="subdomain-list">

                @forelse ($subdomains as $subdomain)

                    <div class="subdomain-item">

                        <div class="subdomain-info">

                            <span class="domain-name">
                                <i class="bi bi-globe"></i>
                                {{ $subdomain->nama_subdomain }}
                            </span>

                            <p>
                                @if ($subdomain->status === 'aktif')

                                    Aktif sejak
                                    {{ $subdomain->tanggal_aktif
                                        ? \Carbon\Carbon::parse($subdomain->tanggal_aktif)->format('d M Y')
                                        : '-'
                                    }}.

                                @else

                                    Subdomain berstatus nonaktif.

                                @endif
                            </p>

                        </div>

                        @if ($subdomain->status === 'aktif')

                            <span class="badge active-status">
                                Aktif
                            </span>

                        @else

                            <span class="badge rejected">
                                Nonaktif
                            </span>

                        @endif

                    </div>

                @empty

                    <div class="empty-state">
                        <i class="bi bi-globe2"></i>
                        <p style="margin-top: 8px;">
                            Belum ada data subdomain.
                        </p>
                    </div>

                @endforelse

            </div>

        </section>

    </main>

    {{-- JAVASCRIPT MENU MOBILE --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const menuToggle = document.getElementById('menuToggle');
            const sidebar = document.querySelector('.sidebar');

            if (!menuToggle || !sidebar) {
                return;
            }

            menuToggle.addEventListener('click', function () {

                const isOpen = sidebar.classList.toggle('open');

                menuToggle.setAttribute(
                    'aria-expanded',
                    String(isOpen)
                );

            });

            document.addEventListener('click', function (event) {

                if (
                    window.innerWidth <= 760 &&
                    sidebar.classList.contains('open') &&
                    !sidebar.contains(event.target) &&
                    !menuToggle.contains(event.target)
                ) {

                    sidebar.classList.remove('open');

                    menuToggle.setAttribute(
                        'aria-expanded',
                        'false'
                    );

                }

            });

        });
    </script>

</body>
</html>
