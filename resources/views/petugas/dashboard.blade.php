
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Petugas | Diskominfotik</title>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --navy: #152b4d;
            --blue: #2854a2;
            --background: #f3f6fb;
            --text: #24344d;
            --muted: #7b8799;
            --border: #e5eaf2;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text);
            font-size: 13px;
        }

        .main {
            margin-left: 255px;
            min-height: 100vh;
            background: #f3f7fc;
        }

        .content {
            max-width: 1600px;
            margin: auto;
            padding: 25px 24px 26px;
        }

        .welcome {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 25px;
        }

        .breadcrumb {
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 9px;
        }

        h1 {
            margin: 0 0 9px;
            font-size: 23px;
            color: var(--navy);
        }

        .welcome p {
            margin: 0;
            color: var(--muted);
            line-height: 1.7;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 25px;
        }

        .stat-card {
            display: block;
            min-width: 0;
            padding: 20px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(21,43,77,.025);
            text-decoration: none;
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(21,43,77,.09);
            border-color: #cbd9ef;
        }

        .stat-top {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 19px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            font-size: 21px;
            flex-shrink: 0;
        }

        .blue { background: #e9effc; color: #2854a2; }
        .green { background: #e4f6ec; color: #218653; }
        .orange { background: #fff1dc; color: #b77716; }
        .red { background: #fde9e9; color: #c44141; }

        .stat-label {
            color: var(--navy);
            font-weight: 600;
            line-height: 1.6;
        }

        .stat-number {
            margin-bottom: 8px;
            font-size: 28px;
            font-weight: 700;
            color: var(--navy);
        }

        .stat-desc {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .panel {
            margin-bottom: 18px;
            overflow: hidden;
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(21,43,77,.025);
        }

        .panel-header {
            padding: 20px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .panel-title {
            margin-bottom: 6px;
            color: var(--navy);
            font-size: 15px;
            font-weight: 700;
        }

        .panel-subtitle {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .view-all {
            color: var(--blue);
            text-decoration: none;
            font-weight: 600;
            white-space: nowrap;
            border: 1px solid #cfe0ff;
            border-radius: 9px;
            padding: 10px 13px;
        }

        .view-all:hover,
        .action-link:hover {
            text-decoration: underline;
        }

        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            min-width: 650px;
            border-collapse: collapse;
        }

        th {
            padding: 15px 20px;
            background: #f9fafd;
            color: #738198;
            font-size: 10px;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: .4px;
            white-space: nowrap;
        }

        td {
            padding: 17px 20px;
            border-top: 1px solid #edf0f5;
            font-size: 11px;
        }

        .opd-name {
            margin-bottom: 5px;
            color: var(--navy);
            font-weight: 600;
        }

        .opd-sub {
            color: var(--muted);
            font-size: 10px;
        }

        .type-label, .status {
            display: inline-block;
            padding: 6px 9px;
            border-radius: 6px;
            font-size: 10px;
            white-space: nowrap;
        }

        .type-label {
            background: #edf2fc;
            color: var(--blue);
        }

        .status { border-radius: 20px; }
        .waiting { background: #fff2d9; color: #94610b; }
        .approved { background: #e2f6e9; color: #197544; }
        .rejected { background: #fde8e8; color: #b52c2c; }

        .action-link {
            color: var(--blue);
            font-weight: 600;
            text-decoration: none;
        }

        .empty-row {
            text-align: center;
            color: var(--muted);
            padding: 25px;
        }

        .bottom-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 20px;
        }

        .quick-list { padding: 5px 22px 15px; }

        .quick-item {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 15px 0;
            border-bottom: 1px solid #edf0f5;
            color: inherit;
            text-decoration: none;
        }

        .quick-item:last-child { border-bottom: none; }

        .quick-item:hover .quick-title { color: var(--blue); }

        .quick-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 9px;
            background: #edf2fc;
            color: var(--blue);
            font-size: 18px;
        }

        .quick-text { flex: 1; min-width: 0; }

        .quick-title {
            margin-bottom: 6px;
            color: var(--navy);
            font-weight: 600;
        }

        .quick-desc {
            color: var(--muted);
            font-size: 10px;
            line-height: 1.6;
        }

        .quick-arrow { color: #8c9bb0; }

        .notice {
            margin-top: 17px;
            padding: 12px;
            background: #edf6ff;
            border: 1px solid #d5e8ff;
            border-radius: 8px;
            color: #2854a2;
            font-size: 11px;
            line-height: 1.7;
        }

        .footer {
            padding: 12px 0 5px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.8;
            text-align: center;
        }

        @media (max-width: 1000px) {
            .main { margin-left: 220px; }
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 760px) {
            .main { width: 100%; margin-left: 0; }
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .bottom-grid { grid-template-columns: 1fr; }
            .panel-header { padding: 16px; flex-wrap: wrap; }
            .quick-list { padding-left: 16px; padding-right: 16px; }
        }

        @media (max-width: 420px) {
            .stats { grid-template-columns: 1fr; }
            .content { padding-left: 12px; padding-right: 12px; }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', ['role' => 'petugas'])

    <main class="main">
        <section class="content">

            <div class="welcome">
                <div>
                    <div class="breadcrumb">Dashboard</div>
                    <h1>Dashboard Petugas</h1>
                    <p>
                        Kelola permohonan pendaftaran dan perubahan subdomain
                        dari Perangkat Daerah.
                    </p>
                </div>
            </div>

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
                        Lihat Pendaftaran <i class="bi bi-arrow-right"></i>
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
                                            </a>
                                        @else
                                            <a href="{{ route('petugas.detail-perubahan', $item->id) }}"
                                               class="action-link">
                                                Detail
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-row">
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

                <section class="panel">
                    <div class="panel-header">
                        <div>
                            <div class="panel-title">Akses Cepat</div>
                            <div class="panel-subtitle">Menu pengelolaan utama</div>
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
                            <div class="quick-icon" style="background:#fff2d9;color:#94610b;">
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
                            Angka ringkasan dan daftar permohonan pada dashboard
                            ditampilkan berdasarkan data yang tersimpan dalam database.
                        </div>

                    </div>
                </section>

            </div>

            <div class="footer">
                Sistem Informasi Pengelolaan dan Monitoring Subdomain OPD
                <br>
                Diskominfotik Kabupaten Indragiri Hulu
            </div>

        </section>
    </main>

</body>
</html>
