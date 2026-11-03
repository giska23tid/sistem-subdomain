
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Pendaftaran | Diskominfotik</title>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f3f6fb;
            color: #26354a;
        }

        .main-content {
            margin-left: 255px;
            min-height: 100vh;
            padding: 16px 22px 28px;
            background: #f3f6fb;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 20px;
        }

        .breadcrumb {
            font-size: 12px;
            color: #7d8ba0;
            margin-bottom: 8px;
        }

        .page-title {
            font-size: 23px;
            color: #172b4d;
            margin-bottom: 4px;
        }

        .page-description {
            font-size: 13px;
            color: #77859a;
            line-height: 1.6;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            background: white;
            padding: 10px 14px;
            border-radius: 12px;
            box-shadow: 0 2px 10px #1c35500a;
        }

        .user-avatar {
            width: 37px;
            height: 37px;
            background: #e5edfc;
            color: #2854a2;
            border-radius: 50%;
            display: grid;
            place-items: center;
        }

        .user-info strong {
            display: block;
            font-size: 12px;
        }

        .user-info small {
            color: #8491a5;
            font-size: 11px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 17px;
            margin-bottom: 24px;
        }

        .summary-card {
            background: white;
            padding: 20px;
            border-radius: 13px;
            border: 1px solid #e9edf4;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .summary-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 22px;
        }

        .blue { background: #e8efff; color: #2854a2; }
        .orange { background: #fff2df; color: #d88916; }
        .green { background: #e1f7ec; color: #168451; }

        .summary-card p {
            font-size: 12px;
            color: #7d8ba0;
            margin-bottom: 7px;
        }

        .summary-card h3 {
            font-size: 25px;
            color: #172b4d;
        }

        .filter-tabs {
            display: flex;
            gap: 7px;
            margin: 0 0 14px;
        }

        .filter-tab {
            display: inline-block;
            border: 1px solid #d6deeb;
            border-radius: 20px;
            background: #fff;
            color: #17345e;
            padding: 8px 14px;
            font-size: 11px;
            text-decoration: none;
        }

        .filter-tab.active {
            border-color: #1e55b3;
            background: #edf3ff;
            color: #16499e;
        }

        .content-card {
            background: white;
            border: 1px solid #e2e8f1;
            border-radius: 9px;
            padding: 18px;
            margin-bottom: 22px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 16px;
        }

        .section-heading h2 {
            font-size: 17px;
            color: #172b4d;
            margin-bottom: 6px;
        }

        .section-heading p {
            font-size: 12px;
            color: #8793a5;
            line-height: 1.5;
        }

        .filter-row {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-box {
            flex: 1;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 13px;
            top: 13px;
            color: #8c99ab;
        }

        .search-box input,
        .filter-row select {
            width: 100%;
            height: 41px;
            border: 1px solid #dfe5ee;
            border-radius: 8px;
            padding: 0 12px;
            background: white;
            color: #46556a;
            font-size: 12px;
            outline: none;
        }

        .search-box input {
            padding-left: 37px;
        }

        .search-box input:focus,
        .filter-row select:focus {
            border-color: #2854a2;
        }

        .filter-row select {
            width: 175px;
        }

        .search-button {
            height: 41px;
            padding: 0 17px;
            background: #2854a2;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 12px;
            cursor: pointer;
        }

        .search-button:hover {
            background: #1d4389;
        }

        .reset-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 41px;
            padding: 0 14px;
            color: #64748b;
            border: 1px solid #dfe5ee;
            border-radius: 8px;
            text-decoration: none;
            font-size: 12px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 720px;
            border-collapse: collapse;
        }

        th {
            background: #eef2f8;
            color: #344761;
            font-size: 10px;
            font-weight: 600;
            text-align: left;
            padding: 12px 10px;
            border-bottom: 1px solid #e8edf4;
            white-space: nowrap;
        }

        td {
            padding: 13px 10px;
            border-bottom: 1px solid #edf0f5;
            font-size: 11px;
            color: #536177;
            line-height: 1.5;
        }

        tbody tr:hover {
            background: #fafcff;
        }

        .request-number {
            color: #2854a2;
            font-weight: 600;
            white-space: nowrap;
        }

        .opd-name {
            color: #243650;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .opd-email {
            font-size: 10px;
            color: #8793a5;
        }

        .subdomain-main {
            color: #152b4d;
            font-size: 11px;
            font-weight: 600;
        }

        .status {
            display: inline-block;
            border-radius: 20px;
            padding: 5px 9px;
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status.pending {
            background: #fff0cc;
            color: #a96b00;
        }

        .status.accepted {
            background: #e1f7ec;
            color: #168451;
        }

        .status.rejected {
            background: #ffe8e8;
            color: #c33e3e;
        }

        .detail-button {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            background: #edf3ff;
            color: #2854a2;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            font-size: 10px;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
        }

        .detail-button:hover {
            background: #dce8ff;
        }

        .empty-state {
            padding: 35px 20px;
            text-align: center;
            color: #8793a5;
            font-size: 13px;
        }

        .empty-state i {
            display: block;
            font-size: 35px;
            margin-bottom: 10px;
            color: #b3bfd0;
        }

        .info-box {
            display: flex;
            gap: 12px;
            background: #edf4ff;
            border: 1px solid #dbe7ff;
            color: #3c5b8a;
            padding: 16px;
            border-radius: 10px;
            font-size: 12px;
            line-height: 1.7;
        }

        .info-box i {
            font-size: 19px;
        }

        .pagination-wrapper {
            margin-top: 18px;
        }

        .pagination-wrapper nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .footer {
            text-align: center;
            color: #9aa5b5;
            font-size: 11px;
            padding: 20px 0 12px;
        }

        @media (max-width: 1000px) {
            .main-content {
                margin-left: 220px;
                padding: 24px 20px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {
            .main-content {
                margin-left: 0;
                padding: 20px 14px;
            }

            .topbar {
                flex-direction: column;
            }

            .filter-row {
                flex-direction: column;
            }

            .filter-row select {
                width: 100%;
            }

            .content-card {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    @include('layouts.sidebar', ['role' => 'petugas'])

    <main class="main-content">
        <header class="topbar">
            <div>
                <div class="breadcrumb">Dashboard / Permohonan Pendaftaran</div>

                <h1 class="page-title">Permohonan Pendaftaran</h1>

                <p class="page-description">
                    Kelola dan periksa permohonan pendaftaran subdomain baru dari Perangkat Daerah.
                </p>
            </div>
        </header>

        <div class="filter-tabs">
            <a
                href="{{ route('petugas.pendaftaran', ['status' => 'diajukan']) }}"
                class="filter-tab {{ request('status', 'diajukan') === 'diajukan' ? 'active' : '' }}"
            >
                Perlu Diperiksa ({{ $pendingCount }})
            </a>

            <a
                href="{{ route('petugas.pendaftaran') }}"
                class="filter-tab {{ !request('status') ? 'active' : '' }}"
            >
                Semua ({{ $totalCount }})
            </a>
        </div>

        <section class="summary-grid">
            <div class="summary-card">
                <div class="summary-icon blue">
                    <i class="bi bi-inbox"></i>
                </div>

                <div>
                    <p>Total Permohonan</p>
                    <h3>{{ $totalCount }}</h3>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon orange">
                    <i class="bi bi-clock-history"></i>
                </div>

                <div>
                    <p>Menunggu Pemeriksaan</p>
                    <h3>{{ $pendingCount }}</h3>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon green">
                    <i class="bi bi-check-circle"></i>
                </div>

                <div>
                    <p>Telah Diproses</p>
                    <h3>{{ $processedCount }}</h3>
                </div>
            </div>
        </section>

        <section class="content-card">
            <div class="section-heading">
                <div>
                    <h2>Daftar Permohonan Pendaftaran</h2>
                    <p>
                        Periksa informasi OPD dan status permohonan sebelum membuka detail.
                    </p>
                </div>
            </div>

            <form
                action="{{ route('petugas.pendaftaran') }}"
                method="GET"
                class="filter-row"
            >
                <div class="search-box">
                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama OPD atau subdomain..."
                        aria-label="Cari permohonan"
                    >
                </div>

                <select name="status" aria-label="Filter status">
                    <option value="">Semua Status</option>

                    <option value="diajukan"
                        {{ request('status') === 'diajukan' ? 'selected' : '' }}>
                        Diajukan
                    </option>

                    <option value="diterima"
                        {{ request('status') === 'diterima' ? 'selected' : '' }}>
                        Diterima
                    </option>

                    <option value="ditolak"
                        {{ request('status') === 'ditolak' ? 'selected' : '' }}>
                        Ditolak
                    </option>
                </select>

                <button type="submit" class="search-button">
                    <i class="bi bi-search"></i> Cari
                </button>

                <a
                    href="{{ route('petugas.pendaftaran') }}"
                    class="reset-button"
                >
                    Reset
                </a>
            </form>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>OPD</th>
                            <th>JENIS</th>
                            <th>SUBDOMAIN</th>
                            <th>TANGGAL</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>

                    <tbody id="applicationTable">
                        @forelse ($permohonans as $index => $permohonan)
                            <tr>
                                <td>
                                    <span class="request-number">
                                        {{ $permohonan->id }}
                                    </span>
                                </td>

                                <td>
                                    <div class="opd-name">
                                        {{ $permohonan->opd->nama_opd ?? 'OPD tidak tersedia' }}
                                    </div>

                                    <div class="opd-email">
                                        {{ $permohonan->pengaju->email ?? '-' }}
                                    </div>
                                </td>

                                <td>
                                    Pendaftaran
                                </td>

                                <td>
                                    <div class="subdomain-main">
                                        {{ $permohonan->nama_subdomain }}
                                    </div>
                                </td>

                                <td>
                                    {{ $permohonan->created_at
                                        ? $permohonan->created_at->translatedFormat('d M Y')
                                        : '-' }}
                                </td>

                                <td>
                                    @if ($permohonan->status === 'diajukan')
                                        <span class="status pending">
                                            <i class="bi bi-clock"></i> Diajukan
                                        </span>
                                    @elseif ($permohonan->status === 'diterima')
                                        <span class="status accepted">
                                            <i class="bi bi-check-circle"></i> Diterima
                                        </span>
                                    @elseif ($permohonan->status === 'ditolak')
                                        <span class="status rejected">
                                            <i class="bi bi-x-circle"></i> Ditolak
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <a
                                        href="{{ route('petugas.detail-permohonan', $permohonan->id) }}"
                                        class="detail-button"
                                    >
                                        <i class="bi bi-eye"></i>
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <i class="bi bi-inbox"></i>

                                        <strong>Belum ada permohonan</strong>

                                        <p>
                                            Belum terdapat permohonan pendaftaran
                                            yang sesuai dengan pencarian atau filter.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($permohonans->hasPages())
                <div class="pagination-wrapper">
                    {{ $permohonans->links() }}
                </div>
            @endif
        </section>

        <div class="info-box">
            <i class="bi bi-info-circle"></i>

            <div>
                <strong>Informasi Persyaratan Pasal 33</strong><br>

                Sebelum memberikan keputusan, petugas perlu memeriksa
                surat permohonan nama subdomain, surat penunjukan pengelola,
                dan fotokopi kartu ASN.
            </div>
        </div>

        <footer class="footer">
            © {{ date('Y') }} Diskominfotik Kabupaten Indragiri Hulu
        </footer>
    </main>
</body>
</html>
