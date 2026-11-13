
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Pendaftaran | Diskominfotik</title>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --navy: #123b65;
            --blue: #1769a6;
            --background: #f3f6fb;
            --text: #172b4d;
            --muted: #718096;
            --border: #e2eaf2;
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

        .main-content {
            margin-left: 270px;
            width: calc(100% - 270px);
            min-height: 100vh;
            padding: 34px 38px 45px;
            background: var(--background);
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

        /* FILTER TAB */

        .filter-tabs {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 9px;
            margin-bottom: 20px;
        }

        .filter-tab {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 15px;
            border: 1px solid #dce6f0;
            border-radius: 20px;
            background: #fff;
            color: #53677e;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s;
        }

        .filter-tab:hover {
            border-color: #b9d5eb;
            color: var(--blue);
            background: #f8fbff;
        }

        .filter-tab.active {
            border-color: #cfe5f8;
            background: #eaf4fd;
            color: var(--blue);
        }

        /* RINGKASAN */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 23px;
        }

        .summary-card {
            display: flex;
            align-items: center;
            gap: 15px;
            min-width: 0;
            padding: 20px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(18, 59, 101, .035);
        }

        .summary-icon {
            width: 47px;
            height: 47px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 12px;
            font-size: 21px;
        }

        .blue {
            background: #eaf2fc;
            color: #2872ad;
        }

        .orange {
            background: #fff2df;
            color: #b77716;
        }

        .green {
            background: #e5f6ed;
            color: #218653;
        }

        .summary-card p {
            margin: 0 0 7px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.5;
        }

        .summary-card h3 {
            margin: 0;
            color: var(--navy);
            font-size: 27px;
            font-weight: 750;
        }

        /* PANEL */

        .content-card {
            margin-bottom: 22px;
            padding: 21px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(18, 59, 101, .035);
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 19px;
        }

        .section-heading h2 {
            margin: 0 0 6px;
            color: var(--navy);
            font-size: 16px;
            font-weight: 700;
        }

        .section-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        /* PENCARIAN DAN FILTER */

        .filter-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 19px;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 150px;
        }

        .search-box i {
            position: absolute;
            top: 50%;
            left: 14px;
            transform: translateY(-50%);
            color: #8c9bad;
            font-size: 14px;
        }

        .search-box input,
        .filter-row select {
            width: 100%;
            height: 42px;
            padding: 0 13px;
            border: 1px solid #dfe7ef;
            border-radius: 9px;
            outline: none;
            background: #fff;
            color: #46566b;
            font-family: inherit;
            font-size: 12px;
            transition: .2s;
        }

        .search-box input {
            padding-left: 39px;
        }

        .search-box input:focus,
        .filter-row select:focus {
            border-color: #8bbce0;
            box-shadow: 0 0 0 3px rgba(23, 105, 166, .08);
        }

        .filter-row select {
            width: 175px;
            cursor: pointer;
        }

        .search-button {
            height: 42px;
            padding: 0 17px;
            border: none;
            border-radius: 9px;
            background: var(--blue);
            color: #fff;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        .search-button:hover {
            background: #12588e;
        }

        .reset-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 42px;
            padding: 0 15px;
            border: 1px solid #dfe7ef;
            border-radius: 9px;
            color: #64748b;
            background: #fff;
            font-size: 12px;
            text-decoration: none;
            transition: .2s;
        }

        .reset-button:hover {
            background: #f7f9fc;
            border-color: #cbd8e5;
        }

        /* TABEL */

        .table-wrapper {
            overflow-x: auto;
            border: 1px solid #edf1f6;
            border-radius: 9px;
        }

        table {
            width: 100%;
            min-width: 760px;
            border-collapse: collapse;
        }

        th {
            padding: 15px 13px;
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
            padding: 15px 13px;
            border-top: 1px solid #edf1f6;
            color: #526278;
            font-size: 12px;
            line-height: 1.6;
            vertical-align: middle;
        }

        tbody tr {
            transition: background .15s;
        }

        tbody tr:hover {
            background: #fbfdff;
        }

        .request-number {
            color: var(--blue);
            font-weight: 700;
            white-space: nowrap;
        }

        .opd-name {
            margin-bottom: 4px;
            color: var(--navy);
            font-size: 12px;
            font-weight: 650;
        }

        .opd-email {
            color: var(--muted);
            font-size: 11px;
        }

        .subdomain-main {
            color: #244766;
            font-size: 12px;
            font-weight: 650;
            white-space: nowrap;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 650;
            white-space: nowrap;
        }

        .status.pending {
            background: #fff3dc;
            color: #94610b;
        }

        .status.accepted {
            background: #e5f7ed;
            color: #197544;
        }

        .status.rejected {
            background: #fdeaea;
            color: #b52c2c;
        }

        .detail-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px 12px;
            border: 1px solid #cfe5f8;
            border-radius: 8px;
            background: #edf6fd;
            color: var(--blue);
            font-size: 11px;
            font-weight: 650;
            text-decoration: none;
            white-space: nowrap;
            transition: .2s;
        }

        .detail-button:hover {
            background: #dceefa;
            border-color: #b7d6ef;
        }

        /* DATA KOSONG */

        .empty-state {
            padding: 38px 20px;
            color: var(--muted);
            text-align: center;
            font-size: 12px;
        }

        .empty-state i {
            display: block;
            margin-bottom: 12px;
            color: #a8b8ca;
            font-size: 35px;
        }

        .empty-state strong {
            display: block;
            margin-bottom: 6px;
            color: var(--navy);
            font-size: 13px;
        }

        .empty-state p {
            margin: 0;
            line-height: 1.6;
        }

        /* INFORMASI */

        .info-box {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            margin-bottom: 20px;
            padding: 17px 19px;
            border: 1px solid #cfe5f8;
            border-radius: 12px;
            background: #eaf4fd;
            color: #52718e;
            font-size: 12px;
            line-height: 1.7;
        }

        .info-box > i {
            flex-shrink: 0;
            color: var(--blue);
            font-size: 20px;
        }

        .info-box strong {
            display: block;
            margin-bottom: 3px;
            color: #174b78;
            font-size: 13px;
        }

        /* PAGINATION */

        .pagination-wrapper {
            margin-top: 20px;
            overflow-x: auto;
        }

        .pagination-wrapper nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .pagination-wrapper nav > div {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 5px;
        }

        .pagination-wrapper a,
        .pagination-wrapper span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            min-height: 34px;
            padding: 6px 10px;
            border: 1px solid #e2eaf2;
            border-radius: 7px;
            color: #53677e;
            font-size: 11px;
            text-decoration: none;
        }

        .pagination-wrapper a:hover {
            background: #edf6fd;
            color: var(--blue);
        }

        .pagination-wrapper span[aria-current="page"] span {
            border-color: var(--blue);
            background: var(--blue);
            color: #fff;
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
            .main-content {
                margin-left: 220px;
                width: calc(100% - 220px);
                padding: 27px 22px 35px;
            }

            .summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .summary-card:last-child {
                grid-column: span 2;
            }
        }

        @media (max-width: 760px) {
            .main-content {
                width: 100%;
                margin-left: 0;
                padding: 22px 17px 30px;
            }

            .summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .summary-card:last-child {
                grid-column: span 2;
            }

            .content-card {
                padding: 17px;
            }

            .filter-row {
                flex-wrap: wrap;
            }

            .search-box {
                flex-basis: 100%;
            }

            .filter-row select {
                flex: 1;
                width: auto;
            }
        }

        @media (max-width: 560px) {
            .main-content {
                padding: 18px 12px 25px;
            }

            .page-header h1 {
                font-size: 23px;
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

            .summary-grid {
                gap: 9px;
            }

            .summary-card {
                align-items: flex-start;
                gap: 10px;
                padding: 14px 12px;
            }

            .summary-icon {
                width: 37px;
                height: 37px;
                border-radius: 9px;
                font-size: 17px;
            }

            .summary-card p {
                font-size: 10px;
            }

            .summary-card h3 {
                font-size: 23px;
            }

            .content-card {
                padding: 14px;
            }

            .section-heading h2 {
                font-size: 14px;
            }

            .filter-tabs {
                gap: 7px;
            }

            .filter-tab {
                padding: 8px 11px;
                font-size: 11px;
            }

            .info-box {
                padding: 14px;
            }
        }

        @media (max-width: 360px) {
            .summary-grid {
                grid-template-columns: 1fr;
            }

            .summary-card:last-child {
                grid-column: auto;
            }

            .filter-row select,
            .search-button,
            .reset-button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', ['role' => 'petugas'])

    <main class="main-content">
        <section class="page-wrapper">

            {{-- HEADER HALAMAN --}}
            <header class="page-header">
                <div class="header-text">
                    <div class="page-eyebrow">
                        <i class="bi bi-building"></i>
                        AREA PENGELOLAAN DISKOMINFOTIK
                    </div>

                    <h1>Permohonan Pendaftaran</h1>

                    <p>
                        Kelola dan periksa permohonan pendaftaran subdomain baru
                        yang diajukan oleh Perangkat Daerah.
                    </p>
                </div>

                <div class="header-icon">
                    <i class="bi bi-clipboard-check"></i>
                </div>
            </header>

            {{-- FILTER STATUS --}}
            <div class="filter-tabs">
                <a
                    href="{{ route('petugas.pendaftaran', ['status' => 'diajukan']) }}"
                    class="filter-tab {{ request('status', 'diajukan') === 'diajukan' ? 'active' : '' }}"
                >
                    <i class="bi bi-hourglass-split"></i>
                    Perlu Diperiksa ({{ $pendingCount }})
                </a>

                <a
                    href="{{ route('petugas.pendaftaran') }}"
                    class="filter-tab {{ !request('status') ? 'active' : '' }}"
                >
                    <i class="bi bi-list-ul"></i>
                    Semua ({{ $totalCount }})
                </a>
            </div>

            {{-- RINGKASAN --}}
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

            {{-- DAFTAR PERMOHONAN --}}
            <section class="content-card">

                <div class="section-heading">
                    <div>
                        <h2>Daftar Permohonan Pendaftaran</h2>
                        <p>
                            Periksa informasi OPD dan status permohonan
                            sebelum membuka halaman detail.
                        </p>
                    </div>
                </div>

                {{-- PENCARIAN DAN FILTER --}}
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
                        <i class="bi bi-search"></i>
                        Cari
                    </button>

                    <a
                        href="{{ route('petugas.pendaftaran') }}"
                        class="reset-button"
                    >
                        <i class="bi bi-arrow-counterclockwise"></i>
                        Reset
                    </a>
                </form>

                {{-- TABEL PERMOHONAN --}}
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
                                        <span class="type-label">
                                            <i class="bi bi-plus-circle"></i>
                                            Pendaftaran
                                        </span>
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
                                                <i class="bi bi-clock"></i>
                                                Diajukan
                                            </span>
                                        @elseif ($permohonan->status === 'diterima')
                                            <span class="status accepted">
                                                <i class="bi bi-check-circle"></i>
                                                Diterima
                                            </span>
                                        @elseif ($permohonan->status === 'ditolak')
                                            <span class="status rejected">
                                                <i class="bi bi-x-circle"></i>
                                                Ditolak
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

                {{-- PAGINATION --}}
                @if ($permohonans->hasPages())
                    <div class="pagination-wrapper">
                        {{ $permohonans->links() }}
                    </div>
                @endif

            </section>

            {{-- INFORMASI PERSYARATAN --}}
            <div class="info-box">
                <i class="bi bi-info-circle"></i>

                <div>
                    <strong>Informasi Persyaratan Pasal 33</strong>

                    Sebelum memberikan keputusan, petugas perlu memeriksa
                    surat permohonan nama subdomain, surat penunjukan
                    pengelola, dan kartu ASN.
                </div>
            </div>

            {{-- FOOTER --}}
            <footer class="footer">
                Sistem Informasi Pengelolaan dan Monitoring Subdomain OPD
                <br>
                Diskominfotik Kabupaten Indragiri Hulu
            </footer>

        </section>
    </main>

</body>
</html>
