
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Permohonan Perubahan Nama Subdomain | Diskominfotik</title>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f3f6fb;
            color: #172b4d;
            font-size: 14px;
        }

        .main-content {
            margin-left: 270px;
            width: calc(100% - 270px);
            min-height: 100vh;
            padding: 34px 38px 45px;
            background: #f3f6fb;
        }

        .sidebar a.active,
        .sidebar .active,
        .sidebar a.active span,
        .sidebar .active span {
            font-weight: 700 !important;
        }

        /* HEADER */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .header-text {
            flex: 1;
        }

        .page-eyebrow {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #1769a6;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 9px;
        }

        .page-header h1 {
            color: #123b65;
            font-size: 27px;
            font-weight: 750;
            margin-bottom: 7px;
        }

        .page-header p {
            color: #718096;
            font-size: 13px;
            line-height: 1.7;
        }

        .header-icon {
            width: 54px;
            height: 54px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 15px;
            background: #e5f1fc;
            color: #1769a6;
            font-size: 25px;
        }

        /* ALERT */
        .alert {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            padding: 13px 16px;
            border-radius: 10px;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 17px;
        }

        .alert-success {
            background: #e5f7ed;
            color: #168451;
            border: 1px solid #c4ecd5;
        }

        .alert-error {
            background: #fff0f0;
            color: #c33e3e;
            border: 1px solid #f5d0d0;
        }

        /* FILTER TAB */
        .filter-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 17px;
        }

        .filter-tab {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 15px;
            border: 1px solid #dce5ef;
            border-radius: 8px;
            background: #fff;
            color: #52647b;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s;
        }

        .filter-tab:hover {
            border-color: #9fc6e8;
            color: #1769a6;
        }

        .filter-tab.active {
            border-color: #1769a6;
            background: #eaf4fd;
            color: #1769a6;
        }

        /* CARD */
        .content-card {
            background: #fff;
            border: 1px solid #e2eaf2;
            border-radius: 12px;
            padding: 22px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(18, 59, 101, .035);
        }

        .section-heading {
            margin-bottom: 20px;
        }

        .section-heading h2 {
            color: #123b65;
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .section-heading p {
            color: #718096;
            font-size: 12px;
            line-height: 1.7;
        }

        /* SEARCH */
        .filter-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-box {
            flex: 1;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #8b9aaf;
            font-size: 14px;
        }

        .search-box input,
        .filter-row select {
            width: 100%;
            height: 42px;
            padding: 0 13px;
            border: 1px solid #dce5ef;
            border-radius: 8px;
            background: #fff;
            color: #46556a;
            font-family: inherit;
            font-size: 12px;
            outline: none;
            transition: .2s;
        }

        .search-box input {
            padding-left: 39px;
        }

        .search-box input:focus,
        .filter-row select:focus {
            border-color: #1769a6;
            box-shadow: 0 0 0 3px rgba(23, 105, 166, .08);
        }

        .filter-row select {
            width: 180px;
        }

        /* BUTTON */
        .detail-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 36px;
            padding: 8px 12px;
            border: 1px solid #d3e5f5;
            border-radius: 8px;
            background: #eaf4fd;
            color: #1769a6;
            text-decoration: none;
            font-family: inherit;
            font-size: 11px;
            font-weight: 650;
            cursor: pointer;
            white-space: nowrap;
            transition: .2s;
        }

        .detail-button:hover {
            background: #dceefa;
            border-color: #b7d6ee;
        }

        /* TABLE */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
        }

        th {
            padding: 13px 12px;
            background: #f2f6fa;
            color: #52647b;
            font-size: 10px;
            font-weight: 700;
            text-align: left;
            letter-spacing: .35px;
            border-bottom: 1px solid #e5ebf2;
            white-space: nowrap;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #edf1f5;
            color: #52647b;
            font-size: 12px;
            line-height: 1.6;
            vertical-align: middle;
        }

        tbody tr {
            transition: background .2s;
        }

        tbody tr:hover {
            background: #f8fbfe;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .request-number {
            color: #718096;
            font-weight: 600;
        }

        .opd-name {
            min-width: 150px;
            color: #243c58;
            font-weight: 650;
        }

        .subdomain-old,
        .subdomain-new {
            min-width: 160px;
            overflow-wrap: anywhere;
        }

        .subdomain-old {
            color: #718096;
        }

        .subdomain-new {
            color: #1769a6;
            font-weight: 650;
        }

        /* STATUS */
        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status.pending {
            background: #fff4dc;
            color: #a96b00;
        }

        .status.accepted {
            background: #e5f7ed;
            color: #168451;
        }

        .status.rejected {
            background: #fff0f0;
            color: #c33e3e;
        }

        /* EMPTY STATE */
        .empty-state {
            padding: 45px 20px;
            text-align: center;
            color: #8793a5;
            font-size: 13px;
        }

        .empty-state i {
            display: block;
            margin-bottom: 12px;
            color: #b6c5d5;
            font-size: 35px;
        }

        /* PAGINATION */
        .pagination-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
            color: #718096;
            font-size: 12px;
        }

        .pagination-links {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .pagination-links nav {
            display: flex;
            align-items: center;
        }

        .pagination-links a,
        .pagination-links span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            padding: 0 9px;
            border: 1px solid #dce5ef;
            border-radius: 7px;
            background: #fff;
            color: #1769a6;
            text-decoration: none;
            font-size: 11px;
        }

        .pagination-links span[aria-current="page"] {
            background: #eaf4fd;
            border-color: #1769a6;
            color: #1769a6;
            font-weight: 700;
        }

        .pagination-links span[aria-disabled="true"] {
            background: #f5f7fa;
            color: #aab4c2;
        }

        /* INFORMATION BANNER */
        .info-banner {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            padding: 17px 19px;
            border: 1px solid #cfe5f8;
            border-radius: 12px;
            background: #eaf4fd;
        }

        .info-icon {
            display: grid;
            place-items: center;
            width: 35px;
            height: 35px;
            flex-shrink: 0;
            border-radius: 9px;
            background: #d7eafa;
            color: #1769a6;
            font-size: 17px;
        }

        .info-content h3 {
            color: #174b78;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .info-content p {
            color: #52718e;
            font-size: 12px;
            line-height: 1.7;
            margin-bottom: 7px;
        }

        .requirement-list {
            display: grid;
            gap: 7px;
            margin-top: 9px;
        }

        .requirement-list p {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin: 0;
        }

        .requirement-list i {
            color: #1769a6;
            margin-top: 2px;
        }

        /* FOOTER */
        .footer {
            padding: 17px 0 5px;
            color: #9aa5b5;
            font-size: 11px;
            text-align: center;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .main-content {
                margin-left: 220px;
                width: calc(100% - 220px);
                padding: 27px 22px 35px;
            }

            .content-card {
                padding: 19px;
            }
        }

        @media (max-width: 760px) {
            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 22px 17px 30px;
            }

            .page-header h1 {
                font-size: 23px;
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

            .page-header {
                align-items: flex-start;
            }

            .page-header h1 {
                font-size: 21px;
            }

            .page-header p {
                font-size: 12px;
            }

            .header-icon {
                width: 45px;
                height: 45px;
                font-size: 21px;
            }

            .content-card {
                padding: 16px 13px;
            }

            .section-heading h2 {
                font-size: 15px;
            }

            .filter-tabs {
                gap: 6px;
            }

            .filter-tab {
                padding: 8px 11px;
                font-size: 11px;
            }

            .filter-row {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-row select {
                width: 100%;
                flex: auto;
            }

            .filter-row .detail-button {
                width: 100%;
            }

            .pagination-wrapper {
                flex-direction: column;
                align-items: flex-start;
            }

            .info-banner {
                padding: 14px;
            }
        }
    </style>
</head>

<body>

    {{-- SIDEBAR PETUGAS --}}
    @include('layouts.sidebar', ['role' => 'petugas'])

    <main class="main-content">

        {{-- HEADER --}}
        <header class="page-header">
            <div class="header-text">
                <div class="page-eyebrow">
                    <i class="bi bi-building"></i>
                    AREA PENGELOLAAN DISKOMINFOTIK
                </div>

                <h1>Permohonan Perubahan Nama Subdomain</h1>

                <p>
                    Periksa data dan dokumen permohonan perubahan nama subdomain
                    yang diajukan oleh Perangkat Daerah.
                </p>
            </div>

            <div class="header-icon">
                <i class="bi bi-arrow-left-right"></i>
            </div>
        </header>

        {{-- PESAN BERHASIL --}}
        @if(session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- PESAN ERROR --}}
        @if($errors->any())
            <div class="alert alert-error">
                <i class="bi bi-exclamation-circle-fill"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        {{-- FILTER TAB --}}
        <div class="filter-tabs">

            <a href="{{ route('petugas.perubahan', array_merge(request()->except('page'), ['status' => 'diajukan'])) }}"
               class="filter-tab {{ request('status', 'diajukan') === 'diajukan' ? 'active' : '' }}">

                <i class="bi bi-hourglass-split"></i>
                Perlu Diperiksa
                <span>({{ $perluDiperiksa }})</span>
            </a>

            <a href="{{ route('petugas.perubahan', request()->except(['status', 'page'])) }}"
               class="filter-tab {{ !request()->filled('status') ? 'active' : '' }}">

                <i class="bi bi-list-ul"></i>
                Semua
                <span>({{ $totalPermohonan }})</span>
            </a>

        </div>

        {{-- DAFTAR PERMOHONAN --}}
        <section class="content-card">

            <div class="section-heading">
                <h2>Daftar Permohonan Perubahan Nama Subdomain</h2>

                <p>
                    Periksa nama subdomain lama, nama yang diajukan,
                    serta dokumen persyaratan dari masing-masing OPD.
                </p>
            </div>

            {{-- PENCARIAN DAN FILTER STATUS --}}
            <form action="{{ route('petugas.perubahan') }}"
                  method="GET"
                  class="filter-row">

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

                <select name="status"
                        aria-label="Filter status"
                        onchange="this.form.submit()">

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

                <button type="submit" class="detail-button">
                    <i class="bi bi-search"></i>
                    Cari
                </button>

            </form>

            {{-- TABEL --}}
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>PERANGKAT DAERAH</th>
                            <th>SUBDOMAIN LAMA</th>
                            <th>SUBDOMAIN BARU</th>
                            <th>TANGGAL PENGAJUAN</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>

                    <tbody id="applicationTable">

                        @forelse($permohonans as $index => $permohonan)

                            <tr>
                                <td>
                                    <span class="request-number">
                                        {{ $permohonans->firstItem() + $index }}
                                    </span>
                                </td>

                                <td>
                                    <div class="opd-name">
                                        {{ $permohonan->opd->nama_opd ?? '-' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="subdomain-old">
                                        {{ $permohonan->subdomain_lama }}.contoh.go.id
                                    </div>
                                </td>

                                <td>
                                    <div class="subdomain-new">
                                        {{ $permohonan->nama_subdomain }}.contoh.go.id
                                    </div>
                                </td>

                                <td>
                                    {{ $permohonan->created_at
                                        ? $permohonan->created_at->format('d M Y')
                                        : '-' }}
                                </td>

                                <td>
                                    @if($permohonan->status === 'diajukan')

                                        <span class="status pending">
                                            <i class="bi bi-clock-history"></i>
                                            Diajukan
                                        </span>

                                    @elseif($permohonan->status === 'diterima')

                                        <span class="status accepted">
                                            <i class="bi bi-check-circle-fill"></i>
                                            Diterima
                                        </span>

                                    @elseif($permohonan->status === 'ditolak')

                                        <span class="status rejected">
                                            <i class="bi bi-x-circle-fill"></i>
                                            Ditolak
                                        </span>

                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('petugas.detail-perubahan', $permohonan->id) }}"
                                       class="detail-button">

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
                                        Belum ada permohonan perubahan subdomain.
                                    </div>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            @if($permohonans->hasPages() || $permohonans->total() > 0)

                <div class="pagination-wrapper">

                    <div>
                        Menampilkan
                        {{ $permohonans->firstItem() ?? 0 }}
                        sampai
                        {{ $permohonans->lastItem() ?? 0 }}
                        dari
                        {{ $permohonans->total() }}
                        permohonan
                    </div>

                    <div class="pagination-links">
                        {{ $permohonans->links('pagination::simple-bootstrap-5') }}
                    </div>

                </div>

            @endif

        </section>

        {{-- INFORMASI PERSYARATAN --}}
        <section class="info-banner">

            <div class="info-icon">
                <i class="bi bi-info-circle"></i>
            </div>

            <div class="info-content">
                <h3>Informasi Persyaratan Pasal 35</h3>

                <p>
                    Berikut dokumen yang perlu diperiksa oleh petugas
                    sebelum menetapkan keputusan permohonan perubahan nama subdomain.
                </p>

                <div class="requirement-list">

                    <p>
                        <i class="bi bi-file-earmark-check"></i>
                        Surat permohonan perubahan nama subdomain.
                    </p>

                    <p>
                        <i class="bi bi-file-earmark-check"></i>
                        Surat penunjukan pengelola subdomain.
                    </p>

                    <p>
                        <i class="bi bi-file-earmark-check"></i>
                        Fotokopi kartu ASN.
                    </p>

                </div>
            </div>

        </section>

        <footer class="footer">
            © {{ date('Y') }} Diskominfotik Kabupaten Indragiri Hulu
        </footer>

    </main>

</body>
</html>
