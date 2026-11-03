<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Permohonan Perubahan | Diskominfotik</title>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

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

        .sidebar a.active,
        .sidebar .active {
            font-weight: 700 !important;
        }

        .sidebar a.active span,
        .sidebar .active span {
            font-weight: 700 !important;
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
            font-weight: 700;
        }

        .page-description {
            font-size: 13px;
            color: #77859a;
            line-height: 1.6;
        }

        .user-info {
            display: none;
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

        /* FILTER TAB */
        .filter-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
            margin: 0 0 14px;
        }

        .filter-tab {
            border: 1px solid #d6deeb;
            border-radius: 20px;
            background: #fff;
            color: #17345e;
            padding: 7px 13px;
            font: inherit;
            font-size: 11px;
            cursor: pointer;
            text-decoration: none;
        }

        .filter-tab.active {
            border-color: #1e55b3;
            background: #edf3ff;
            color: #16499e;
            font-weight: 700;
        }

        /* KARTU */
        .content-card {
            background: white;
            border: 1px solid #e2e8f1;
            border-radius: 9px;
            padding: 14px;
            margin-bottom: 22px;
        }

        .section-heading {
            margin-bottom: 12px;
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

        /* PENCARIAN */
        .filter-row {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .search-box {
            flex: 1;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 13px;
            top: 12px;
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
            font-family: inherit;
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

        /* TABEL */
        .table-wrapper {
            overflow-x: auto;
            width: 100%;
        }

        table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
        }

        th {
            background: #eef2f8;
            color: #344761;
            font-size: 10px;
            font-weight: 600;
            text-align: left;
            padding: 9px 10px;
            border-bottom: 1px solid #e8edf4;
            white-space: nowrap;
        }

        td {
            padding: 12px 10px;
            border-bottom: 1px solid #edf0f5;
            font-size: 10px;
            color: #536177;
            line-height: 1.45;
            vertical-align: top;
        }

        tbody tr:hover {
            background: #fafcff;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .request-number {
            color: #152b4d;
            white-space: nowrap;
        }

        .opd-name {
            color: #243650;
            font-weight: 600;
            min-width: 125px;
        }

        .subdomain-old {
            color: #8793a5;
            font-size: 10px;
            overflow-wrap: anywhere;
            min-width: 150px;
        }

        .subdomain-new {
            color: #152b4d;
            font-size: 11px;
            font-weight: 600;
            overflow-wrap: anywhere;
            min-width: 150px;
        }

        /* STATUS */
        .status {
            display: inline-block;
            border-radius: 20px;
            padding: 4px 8px;
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

        /* TOMBOL */
        .detail-button {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 9px;
            background: #edf3ff;
            color: #2854a2;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            font-family: inherit;
            font-size: 10px;
            cursor: pointer;
            white-space: nowrap;
        }

        .detail-button:hover {
            background: #dce8ff;
        }

        /* PESAN */
        .alert {
            padding: 12px 14px;
            border-radius: 8px;
            font-size: 12px;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .alert-success {
            background: #e1f7ec;
            color: #168451;
            border: 1px solid #bcebd1;
        }

        .alert-error {
            background: #ffe8e8;
            color: #c33e3e;
            border: 1px solid #f5caca;
        }

        .empty-state {
            padding: 28px;
            text-align: center;
            color: #8793a5;
            font-size: 13px;
        }

        /* PAGINATION */
        .pagination-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 16px;
            font-size: 11px;
            color: #8793a5;
        }

        .pagination-links {
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .pagination-links a,
        .pagination-links span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 30px;
            height: 30px;
            padding: 0 8px;
            border: 1px solid #dfe5ee;
            border-radius: 6px;
            text-decoration: none;
            color: #2854a2;
            background: white;
        }

        .pagination-links span[aria-current="page"] {
            background: #edf3ff;
            border-color: #2854a2;
            font-weight: 700;
        }

        .pagination-links span[aria-disabled="true"] {
            color: #aab4c2;
            background: #f5f7fa;
        }

        /* INFORMASI PERSYARATAN */
        .requirement-list {
            font-size: 12px;
            color: #536177;
            line-height: 1.9;
        }

        .requirement-list p {
            margin-bottom: 4px;
        }

        .requirement-list i {
            color: #2854a2;
            margin-right: 5px;
        }

        .footer {
            text-align: center;
            color: #9aa5b5;
            font-size: 11px;
            padding: 12px 0;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .main-content {
                margin-left: 220px;
                padding: 24px 20px;
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

            .pagination-wrapper {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    {{-- SIDEBAR PETUGAS --}}
    @include('layouts.sidebar', ['role' => 'petugas'])

    <main class="main-content">

        {{-- HEADER --}}
        <header class="topbar">
            <div>
                <div class="breadcrumb">
                    Dashboard / Permohonan Perubahan
                </div>

                <h1 class="page-title">Permohonan Perubahan</h1>

                <p class="page-description">
                    Periksa data dan dokumen permohonan perubahan nama subdomain dari Perangkat Daerah.
                </p>
            </div>

            <div class="user-info">
                <div class="user-avatar">
                    <i class="bi bi-person-badge"></i>
                </div>

                <div>
                    <strong>{{ Auth::user()->name ?? 'Petugas' }}</strong>
                    <small>Petugas Diskominfotik</small>
                </div>
            </div>
        </header>

        {{-- PESAN BERHASIL --}}
        @if(session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- PESAN ERROR --}}
        @if($errors->any())
            <div class="alert alert-error">
                <i class="bi bi-exclamation-circle"></i>
                {{ $errors->first() }}
            </div>
        @endif

        {{-- FILTER TAB --}}
        <div class="filter-tabs">

            <a href="{{ route('petugas.perubahan', array_merge(request()->except('page'), ['status' => 'diajukan'])) }}"
               class="filter-tab {{ request('status', 'diajukan') === 'diajukan' ? 'active' : '' }}">
                Perlu diperiksa ({{ $perluDiperiksa }})
            </a>

            <a href="{{ route('petugas.perubahan', request()->except(['status', 'page'])) }}"
               class="filter-tab {{ !request()->filled('status') ? 'active' : '' }}">
                Semua ({{ $totalPermohonan }})
            </a>

        </div>

        {{-- DAFTAR PERMOHONAN --}}
        <section class="content-card">

            <div class="section-heading">
                <h2>Daftar Permohonan Perubahan Nama Subdomain</h2>

                <p>
                    Periksa nama subdomain lama, nama yang diajukan, dan dokumen persyaratan.
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
                    <i class="bi bi-search"></i> Cari
                </button>

            </form>

            {{-- TABEL --}}
            <div class="table-wrapper">

                <table>
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>OPD</th>
                            <th>SUBDOMAIN LAMA</th>
                            <th>SUBDOMAIN BARU</th>
                            <th>TANGGAL</th>
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
                                            ● Diajukan
                                        </span>

                                    @elseif($permohonan->status === 'diterima')

                                        <span class="status accepted">
                                            ● Diterima
                                        </span>

                                    @elseif($permohonan->status === 'ditolak')

                                        <span class="status rejected">
                                            ● Ditolak
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
                                        <i class="bi bi-inbox"
                                           style="font-size: 28px; display:block; margin-bottom:8px;">
                                        </i>

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
        <section class="content-card">

            <div class="section-heading">
                <h2>Informasi Persyaratan Pasal 35</h2>

                <p>
                    Dokumen yang perlu diperiksa sebelum petugas menetapkan keputusan.
                </p>
            </div>

            <div class="requirement-list">

                <p>
                    <i class="bi bi-file-earmark-text"></i>
                    Surat permohonan perubahan nama subdomain.
                </p>

                <p>
                    <i class="bi bi-file-earmark-text"></i>
                    Surat penunjukan pengelola subdomain.
                </p>

                <p>
                    <i class="bi bi-file-earmark-text"></i>
                    Fotokopi kartu ASN.
                </p>

            </div>

        </section>

        <footer class="footer">
            © {{ date('Y') }} Diskominfotik Kabupaten Indragiri Hulu
        </footer>

    </main>

</body>
</html>
