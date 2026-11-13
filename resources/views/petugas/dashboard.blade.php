
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas | Diskominfotik</title>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --navy: #123b65;
            --blue: #1769a6;
            --blue-light: #eaf4fd;
            --background: #f3f6fb;
            --text: #172b4d;
            --muted: #718096;
            --border: #e2eaf2;
            --green: #08744d;
            --orange: #a9680c;
            --red: #b83232;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            font-size: 14px;
            background: var(--background);
            color: var(--text);
        }

        .main {
            margin-left: 270px;
            width: calc(100% - 270px);
            min-height: 100vh;
            background: var(--background);
        }

        .content {
            width: 100%;
            max-width: 1600px;
            margin: auto;
            padding: 34px 38px 45px;
        }

        /* HEADER */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 25px;
        }

        .header-text {
            max-width: 700px;
        }

        .page-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 9px;
            color: var(--blue);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .page-header h1 {
            margin: 0 0 8px;
            color: var(--navy);
            font-size: 27px;
            font-weight: 750;
        }

        .page-header p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .header-icon {
            width: 54px;
            height: 54px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 15px;
            background: #e5f1fc;
            color: var(--blue);
            font-size: 25px;
        }

        /* RINGKASAN */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            display: block;
            min-width: 0;
            padding: 20px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(18, 59, 101, .035);
            text-decoration: none;
            transition: .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            border-color: #c7dced;
            box-shadow: 0 6px 16px rgba(18, 59, 101, .08);
        }

        .stat-top {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 17px;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 11px;
            font-size: 21px;
        }

        .blue {
            background: #eaf2fc;
            color: #2872ad;
        }

        .green {
            background: #e5f6ed;
            color: #218653;
        }

        .orange {
            background: #fff2df;
            color: #b77716;
        }

        .red {
            background: #fdeaea;
            color: #c44141;
        }

        .stat-label {
            color: var(--navy);
            font-size: 12px;
            font-weight: 650;
            line-height: 1.5;
        }

        .stat-number {
            margin-bottom: 7px;
            color: var(--navy);
            font-size: 29px;
            font-weight: 750;
        }

        .stat-desc {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        /* PANEL */

        .panel {
            margin-bottom: 20px;
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(18, 59, 101, .035);
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 20px 22px;
        }

        .panel-title {
            margin-bottom: 6px;
            color: var(--navy);
            font-size: 15px;
            font-weight: 700;
        }

        .panel-subtitle {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .view-all {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 14px;
            border: 1px solid #cfe5f8;
            border-radius: 9px;
            color: var(--blue);
            background: #f8fbff;
            font-size: 12px;
            font-weight: 650;
            text-decoration: none;
            white-space: nowrap;
            transition: .2s;
        }

        .view-all:hover {
            background: var(--blue-light);
            border-color: #b7d6ef;
        }

        /* TABEL */

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 650px;
            border-collapse: collapse;
        }

        th {
            padding: 15px 20px;
            background: #f7f9fc;
            color: #718096;
            font-size: 10px;
            font-weight: 700;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: .5px;
            white-space: nowrap;
        }

        td {
            padding: 16px 20px;
            border-top: 1px solid #edf1f6;
            color: #42536a;
            font-size: 12px;
            vertical-align: middle;
        }

        tbody tr {
            transition: background .15s;
        }

        tbody tr:hover {
            background: #fbfdff;
        }

        .opd-name {
            margin-bottom: 5px;
            color: var(--navy);
            font-weight: 650;
            font-size: 12px;
        }

        .opd-sub {
            color: var(--muted);
            font-size: 11px;
        }

        .type-label,
        .status {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 7px;
            font-size: 10px;
            font-weight: 650;
            white-space: nowrap;
        }

        .type-label {
            background: #edf4fc;
            color: #28669b;
        }

        .status {
            border-radius: 20px;
        }

        .waiting {
            background: #fff3dc;
            color: #94610b;
        }

        .approved {
            background: #e5f7ed;
            color: #197544;
        }

        .rejected {
            background: #fdeaea;
            color: #b52c2c;
        }

        .action-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: var(--blue);
            font-size: 12px;
            font-weight: 650;
            text-decoration: none;
        }

        .action-link:hover {
            text-decoration: underline;
        }

        .empty-row {
            padding: 30px 20px;
            color: var(--muted);
            text-align: center;
            font-size: 12px;
        }

        /* AKSES CEPAT */

        .bottom-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 20px;
            align-items: stretch;
        }

        .quick-list {
            padding: 3px 22px 17px;
        }

        .quick-item {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 15px 0;
            border-bottom: 1px solid #edf1f6;
            color: inherit;
            text-decoration: none;
            transition: .2s;
        }

        .quick-item:last-child {
            border-bottom: none;
        }

        .quick-item:hover .quick-title {
            color: var(--blue);
        }

        .quick-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 11px;
            background: #eaf2fc;
            color: #2872ad;
            font-size: 19px;
        }

        .quick-text {
            flex: 1;
            min-width: 0;
        }

        .quick-title {
            margin-bottom: 5px;
            color: var(--navy);
            font-size: 12px;
            font-weight: 650;
            transition: .2s;
        }

        .quick-desc {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .quick-arrow {
            flex-shrink: 0;
            color: #8b9bb0;
            font-size: 13px;
        }

        /* INFORMASI */

        .notice {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 17px;
            padding: 15px 16px;
            background: #eaf4fd;
            border: 1px solid #cfe5f8;
            border-radius: 11px;
            color: #52718e;
            font-size: 12px;
            line-height: 1.7;
        }

        .notice i {
            flex-shrink: 0;
            margin-top: 1px;
            color: var(--blue);
            font-size: 17px;
        }

        .notice strong {
            color: #174b78;
        }

        /* FOOTER */

        .footer {
            padding: 12px 0 5px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
            text-align: center;
        }

        /* RESPONSIVE */

        @media (min-width: 761px) and (max-width: 1000px) {
            .main {
                margin-left: 220px;
                width: calc(100% - 220px);
            }

            .content {
                padding: 27px 22px 35px;
            }

            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .bottom-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {
            .main {
                width: 100%;
                margin-left: 0;
            }

            .content {
                padding: 22px 17px 30px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .stat-card {
                padding: 16px;
            }

            .bottom-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .panel-header {
                padding: 17px;
                flex-wrap: wrap;
            }

            .quick-list {
                padding-left: 17px;
                padding-right: 17px;
            }
        }

        @media (max-width: 560px) {
            .content {
                padding: 18px 12px 25px;
            }

            .page-header {
                gap: 10px;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .page-header p {
                font-size: 12px;
            }

            .header-icon {
                width: 45px;
                height: 45px;
                border-radius: 12px;
                font-size: 21px;
            }

            .stats {
                gap: 10px;
            }

            .stat-card {
                padding: 13px;
            }

            .stat-top {
                align-items: flex-start;
                gap: 9px;
                margin-bottom: 13px;
            }

            .stat-icon {
                width: 36px;
                height: 36px;
                font-size: 18px;
            }

            .stat-label {
                font-size: 11px;
            }

            .stat-number {
                font-size: 25px;
            }

            .stat-desc {
                font-size: 10px;
            }

            .view-all {
                padding: 8px 10px;
                font-size: 11px;
            }

            .panel-title {
                font-size: 14px;
            }
        }

        @media (max-width: 360px) {
            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', ['role' => 'petugas'])

    <main class="main">
        <section class="content">

            {{-- HEADER HALAMAN --}}
            <header class="page-header">
                <div class="header-text">
                    <div class="page-eyebrow">
                        <i class="bi bi-building"></i>
                        AREA PENGELOLAAN DISKOMINFOTIK
                    </div>

                    <h1>Dashboard Petugas</h1>

                    <p>
                        Selamat datang di halaman pengelolaan permohonan dan monitoring
                        subdomain Perangkat Daerah.
                    </p>
                </div>

                <div class="header-icon">
                    <i class="bi bi-speedometer2"></i>
                </div>
            </header>

            {{-- RINGKASAN DATABASE --}}
            <div class="stats">

                <a href="{{ route('petugas.pendaftaran') }}" class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon blue">
                            <i class="bi bi-inbox"></i>
                        </div>
                        <div class="stat-label">Permohonan Masuk</div>
                    </div>

                    <div class="stat-number">{{ $permohonanMasuk }}</div>

                    <div class="stat-desc">
                        Permohonan yang menunggu pemeriksaan
                    </div>
                </a>

                <a href="{{ route('petugas.pendaftaran') }}" class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon green">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div class="stat-label">Permohonan Diterima</div>
                    </div>

                    <div class="stat-number">{{ $permohonanDiterima }}</div>

                    <div class="stat-desc">
                        Seluruh permohonan yang telah diterima
                    </div>
                </a>

                <a href="{{ route('petugas.subdomain') }}" class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon orange">
                            <i class="bi bi-globe"></i>
                        </div>
                        <div class="stat-label">Subdomain Terdaftar</div>
                    </div>

                    <div class="stat-number">{{ $subdomainTerdaftar }}</div>

                    <div class="stat-desc">
                        Seluruh subdomain yang tercatat dalam sistem
                    </div>
                </a>

                <a href="{{ route('petugas.monitoring') }}" class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon red">
                            <i class="bi bi-exclamation-circle"></i>
                        </div>
                        <div class="stat-label">Perlu Monitoring</div>
                    </div>

                    <div class="stat-number">{{ $perluMonitoring }}</div>

                    <div class="stat-desc">
                        Belum diperiksa atau hasil pemeriksaan terakhir tidak aktif
                    </div>
                </a>

            </div>

            {{-- PERMOHONAN TERBARU --}}
            <section class="panel">

                <div class="panel-header">
                    <div>
                        <div class="panel-title">Permohonan Terbaru</div>
                        <div class="panel-subtitle">
                            Lima permohonan terakhir yang masuk ke Diskominfotik
                        </div>
                    </div>

                    <a href="{{ route('petugas.pendaftaran') }}" class="view-all">
                        Lihat Pendaftaran
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Instansi / OPD</th>
                                <th>Jenis Permohonan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($permohonanTerbaru as $item)
                                <tr>
                                    <td>
                                        <div class="opd-name">
                                            {{ $item->opd->nama_opd ?? '-' }}
                                        </div>

                                        <div class="opd-sub">
                                            {{ $item->pengaju->name ?? '-' }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="type-label">
                                            {{ $item->jenis_permohonan === 'pendaftaran'
                                                ? 'Pendaftaran Baru'
                                                : 'Perubahan Nama' }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $item->created_at->format('d-m-Y') }}
                                    </td>

                                    <td>
                                        @if ($item->status === 'diajukan')
                                            <span class="status waiting">Menunggu</span>
                                        @elseif ($item->status === 'diterima')
                                            <span class="status approved">Diterima</span>
                                        @else
                                            <span class="status rejected">Ditolak</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->jenis_permohonan === 'pendaftaran')
                                            <a href="{{ route('petugas.detail-permohonan', $item->id) }}"
                                               class="action-link">
                                                Detail
                                                <i class="bi bi-arrow-up-right"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('petugas.detail-perubahan', $item->id) }}"
                                               class="action-link">
                                                Detail
                                                <i class="bi bi-arrow-up-right"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-row">
                                        <i class="bi bi-inbox" style="font-size:22px;display:block;margin-bottom:8px;"></i>
                                        Belum terdapat permohonan yang masuk.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </section>

            {{-- AKSES CEPAT DAN INFORMASI --}}
            <div class="bottom-grid">

                {{-- AKSES CEPAT --}}
                <section class="panel">
                    <div class="panel-header">
                        <div>
                            <div class="panel-title">Akses Cepat</div>
                            <div class="panel-subtitle">
                                Menu pengelolaan utama
                            </div>
                        </div>
                    </div>

                    <div class="quick-list">

                        <a href="{{ route('petugas.pendaftaran') }}" class="quick-item">
                            <div class="quick-icon">
                                <i class="bi bi-clipboard-check"></i>
                            </div>

                            <div class="quick-text">
                                <div class="quick-title">Permohonan Pendaftaran</div>
                                <div class="quick-desc">
                                    Periksa permohonan pendaftaran subdomain baru.
                                </div>
                            </div>

                            <i class="bi bi-chevron-right quick-arrow"></i>
                        </a>

                        <a href="{{ route('petugas.perubahan') }}" class="quick-item">
                            <div class="quick-icon">
                                <i class="bi bi-arrow-repeat"></i>
                            </div>

                            <div class="quick-text">
                                <div class="quick-title">Permohonan Perubahan</div>
                                <div class="quick-desc">
                                    Periksa permohonan perubahan nama subdomain.
                                </div>
                            </div>

                            <i class="bi bi-chevron-right quick-arrow"></i>
                        </a>

                        <a href="{{ route('petugas.subdomain') }}" class="quick-item">
                            <div class="quick-icon">
                                <i class="bi bi-globe2"></i>
                            </div>

                            <div class="quick-text">
                                <div class="quick-title">Data Subdomain</div>
                                <div class="quick-desc">
                                    Lihat seluruh subdomain yang telah terdaftar.
                                </div>
                            </div>

                            <i class="bi bi-chevron-right quick-arrow"></i>
                        </a>

                        <a href="{{ route('petugas.monitoring') }}" class="quick-item">
                            <div class="quick-icon">
                                <i class="bi bi-activity"></i>
                            </div>

                            <div class="quick-text">
                                <div class="quick-title">Monitoring Subdomain</div>
                                <div class="quick-desc">
                                    Periksa dan catat kondisi subdomain.
                                </div>
                            </div>

                            <i class="bi bi-chevron-right quick-arrow"></i>
                        </a>

                        <a href="{{ route('petugas.laporan') }}" class="quick-item">
                            <div class="quick-icon">
                                <i class="bi bi-file-earmark-bar-graph"></i>
                            </div>

                            <div class="quick-text">
                                <div class="quick-title">Laporan Monitoring</div>
                                <div class="quick-desc">
                                    Lihat riwayat dan unduh laporan monitoring.
                                </div>
                            </div>

                            <i class="bi bi-chevron-right quick-arrow"></i>
                        </a>

                    </div>
                </section>

                {{-- PERLU PERHATIAN --}}
                <section class="panel">
                    <div class="panel-header">
                        <div>
                            <div class="panel-title">Perlu Perhatian</div>
                            <div class="panel-subtitle">
                                Informasi untuk tindak lanjut petugas
                            </div>
                        </div>
                    </div>

                    <div class="quick-list">

                        <a href="{{ route('petugas.pendaftaran') }}" class="quick-item">
                            <div class="quick-icon"
                                 style="background:#fff3dc;color:#94610b;">
                                <i class="bi bi-hourglass-split"></i>
                            </div>

                            <div class="quick-text">
                                <div class="quick-title">Pemeriksaan Permohonan</div>
                                <div class="quick-desc">
                                    Periksa permohonan yang masih menunggu keputusan.
                                </div>
                            </div>

                            <i class="bi bi-chevron-right quick-arrow"></i>
                        </a>

                        <a href="{{ route('petugas.monitoring') }}" class="quick-item">
                            <div class="quick-icon">
                                <i class="bi bi-activity"></i>
                            </div>

                            <div class="quick-text">
                                <div class="quick-title">Monitoring Subdomain</div>
                                <div class="quick-desc">
                                    Periksa subdomain yang belum diperiksa atau tidak aktif.
                                </div>
                            </div>

                            <i class="bi bi-chevron-right quick-arrow"></i>
                        </a>

                        <div class="notice">
                            <i class="bi bi-info-circle"></i>
                            <div>
                                <strong>Informasi Sistem</strong><br>
                                Angka ringkasan dan daftar permohonan pada dashboard
                                ditampilkan berdasarkan data yang tersimpan dalam database.
                            </div>
                        </div>

                    </div>
                </section>

            </div>

            {{-- FOOTER --}}
            <div class="footer">
                Sistem Informasi Pengelolaan dan Monitoring Subdomain OPD
                <br>
                Diskominfotik Kabupaten Indragiri Hulu
            </div>

        </section>
    </main>

</body>
</html>
