
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Subdomain | Diskominfotik</title>

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
            margin-bottom: 27px;
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

        /* SUMMARY */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 22px;
        }

        .summary-card {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 21px;
            background: #fff;
            border: 1px solid #e2eaf2;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(18, 59, 101, .035);
            transition: transform .2s, box-shadow .2s;
        }

        .summary-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 14px rgba(18, 59, 101, .07);
        }

        .summary-icon {
            width: 47px;
            height: 47px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 11px;
            font-size: 21px;
        }

        .summary-icon.blue {
            background: #eaf4fd;
            color: #1769a6;
        }

        .summary-icon.green {
            background: #e5f7ed;
            color: #168451;
        }

        .summary-icon.red {
            background: #fff0f0;
            color: #c33e3e;
        }

        .summary-info p {
            color: #718096;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .summary-info h2 {
            color: #123b65;
            font-size: 25px;
            font-weight: 750;
        }

        /* CONTENT CARD */
        .content-card {
            background: #fff;
            border: 1px solid #e2eaf2;
            border-radius: 12px;
            padding: 22px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(18, 59, 101, .035);
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
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

        /* SEARCH AND FILTER */
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
            width: 175px;
        }

        /* BUTTON */
        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            min-height: 39px;
            padding: 9px 14px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 650;
            cursor: pointer;
            text-decoration: none;
            white-space: nowrap;
            transition: .2s;
        }

        .btn-primary {
            background: #1769a6;
            color: #fff;
        }

        .btn-primary:hover {
            background: #125889;
        }

        .btn-light {
            background: #eaf4fd;
            color: #1769a6;
            border-color: #d3e5f5;
        }

        .btn-light:hover {
            background: #dceefa;
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

        .domain-number {
            color: #718096;
            font-weight: 600;
            white-space: nowrap;
        }

        .opd-name {
            min-width: 155px;
            color: #243c58;
            font-weight: 650;
        }

        .domain-address {
            min-width: 175px;
            color: #1769a6;
            font-weight: 650;
            overflow-wrap: anywhere;
        }

        .date-text {
            white-space: nowrap;
            color: #718096;
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

        .status.active {
            background: #e5f7ed;
            color: #168451;
        }

        .status.inactive {
            background: #fff0f0;
            color: #c33e3e;
        }

        /* ACTION */
        .action-buttons {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .icon-button {
            width: 34px;
            height: 34px;
            display: inline-grid;
            place-items: center;
            border: 1px solid #d3e5f5;
            border-radius: 8px;
            background: #eaf4fd;
            color: #1769a6;
            cursor: pointer;
            font-size: 14px;
            transition: .2s;
        }

        .icon-button:hover {
            background: #dceefa;
            border-color: #b7d6ee;
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
            margin-top: 20px;
            color: #718096;
            font-size: 12px;
        }

        .pagination-wrapper nav {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .pagination-wrapper nav > div:last-child {
            margin-top: 0;
        }

        .pagination-wrapper a,
        .pagination-wrapper span {
            font-size: 12px;
        }

        /* MODAL */
        .modal-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 1000;
            background: rgba(15, 30, 52, .48);
            align-items: center;
            justify-content: center;
            padding: 18px;
        }

        .modal-backdrop.show {
            display: flex;
        }

        .modal {
            width: 100%;
            max-width: 540px;
            max-height: 90vh;
            overflow-y: auto;
            background: #fff;
            border: 1px solid #e2eaf2;
            border-radius: 14px;
            box-shadow: 0 18px 55px rgba(0, 0, 0, .2);
            animation: modalShow .2s ease;
        }

        @keyframes modalShow {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            padding: 21px 23px;
            border-bottom: 1px solid #edf1f5;
        }

        .modal-header h2 {
            color: #123b65;
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .modal-header p {
            color: #718096;
            font-size: 12px;
            line-height: 1.6;
        }

        .modal-close {
            width: 31px;
            height: 31px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border: none;
            border-radius: 7px;
            background: #f2f6fa;
            color: #718096;
            font-size: 19px;
            cursor: pointer;
        }

        .modal-close:hover {
            background: #e7eef5;
            color: #123b65;
        }

        .modal-body {
            padding: 23px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .detail-item small {
            display: block;
            color: #8793a5;
            font-size: 11px;
            margin-bottom: 7px;
        }

        .detail-item strong {
            display: block;
            color: #243c58;
            font-size: 13px;
            font-weight: 650;
            overflow-wrap: anywhere;
            line-height: 1.6;
        }

        .detail-item.full-width {
            grid-column: 1 / -1;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-top: 24px;
            padding-top: 17px;
            border-top: 1px solid #edf1f5;
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

            .summary-grid {
                gap: 11px;
            }

            .summary-card {
                padding: 16px;
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

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .summary-card {
                padding: 16px 18px;
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

            .filter-row {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-row select {
                width: 100%;
            }

            .filter-row .btn {
                width: 100%;
            }

            .detail-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .detail-item.full-width {
                grid-column: auto;
            }

            .modal-header,
            .modal-body {
                padding: 17px;
            }

            .modal-actions {
                flex-direction: column;
            }

            .modal-actions .btn {
                width: 100%;
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

                <h1>Data Subdomain</h1>

                <p>
                    Kelola dan pantau data subdomain milik Perangkat Daerah
                    yang telah tercatat di Diskominfotik.
                </p>
            </div>

            <div class="header-icon">
                <i class="bi bi-globe2"></i>
            </div>
        </header>

        {{-- RINGKASAN --}}
        <section class="summary-grid">

            <div class="summary-card">
                <div class="summary-icon blue">
                    <i class="bi bi-globe2"></i>
                </div>

                <div class="summary-info">
                    <p>Total Subdomain</p>
                    <h2>{{ $total }}</h2>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon green">
                    <i class="bi bi-check-circle"></i>
                </div>

                <div class="summary-info">
                    <p>Subdomain Aktif</p>
                    <h2>{{ $aktif }}</h2>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon red">
                    <i class="bi bi-x-circle"></i>
                </div>

                <div class="summary-info">
                    <p>Subdomain Nonaktif</p>
                    <h2>{{ $nonaktif }}</h2>
                </div>
            </div>

        </section>

        {{-- DAFTAR SUBDOMAIN --}}
        <section class="content-card">

            <div class="section-heading">
                <div>
                    <h2>Daftar Subdomain Perangkat Daerah</h2>
                    <p>
                        Berikut merupakan data subdomain yang telah tercatat
                        beserta informasi dan statusnya.
                    </p>
                </div>
            </div>

            {{-- PENCARIAN DAN FILTER --}}
            <form method="GET"
                  action="{{ route('petugas.subdomain') }}"
                  class="filter-row">

                <div class="search-box">
                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama OPD atau alamat subdomain..."
                        aria-label="Cari data subdomain"
                    >
                </div>

                <select name="status" aria-label="Filter status subdomain">
                    <option value="">Semua Status</option>

                    <option value="aktif"
                        {{ request('status') === 'aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="nonaktif"
                        {{ request('status') === 'nonaktif' ? 'selected' : '' }}>
                        Nonaktif
                    </option>
                </select>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                    Cari
                </button>

                <a href="{{ route('petugas.subdomain') }}" class="btn btn-light">
                    <i class="bi bi-arrow-counterclockwise"></i>
                    Reset
                </a>

            </form>

            {{-- TABEL DATA --}}
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>NAMA PERANGKAT DAERAH</th>
                            <th>ALAMAT SUBDOMAIN</th>
                            <th>TANGGAL PENCATATAN</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($subdomains as $index => $subdomain)

                            @php
                                $tanggalPencatatan = $subdomain->tanggal_aktif
                                    ? \Carbon\Carbon::parse($subdomain->tanggal_aktif)->translatedFormat('d M Y')
                                    : '-';

                                $statusTampilan = $subdomain->status === 'aktif'
                                    ? 'Aktif'
                                    : 'Nonaktif';
                            @endphp

                            <tr>
                                <td>
                                    <span class="domain-number">
                                        {{ $subdomains->firstItem() + $index }}
                                    </span>
                                </td>

                                <td>
                                    <div class="opd-name">
                                        {{ $subdomain->opd->nama_opd ?? '-' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="domain-address">
                                        {{ $subdomain->nama_subdomain }}
                                    </div>
                                </td>

                                <td class="date-text">
                                    {{ $tanggalPencatatan }}
                                </td>

                                <td>
                                    @if ($subdomain->status === 'aktif')

                                        <span class="status active">
                                            <i class="bi bi-check-circle-fill"></i>
                                            Aktif
                                        </span>

                                    @else

                                        <span class="status inactive">
                                            <i class="bi bi-x-circle-fill"></i>
                                            Nonaktif
                                        </span>

                                    @endif
                                </td>

                                <td>
                                    <div class="action-buttons">

                                        <button
                                            type="button"
                                            class="icon-button detail"
                                            title="Lihat detail"
                                            aria-label="Lihat detail"
                                            data-opd="{{ $subdomain->opd->nama_opd ?? '-' }}"
                                            data-domain="{{ $subdomain->nama_subdomain }}"
                                            data-date="{{ $tanggalPencatatan }}"
                                            data-status="{{ $statusTampilan }}"
                                            data-description="{{ $subdomain->keterangan ?? '-' }}"
                                            onclick="showDetail(this)"
                                        >
                                            <i class="bi bi-eye"></i>
                                        </button>

                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="bi bi-database"></i>
                                        Belum ada data subdomain yang sesuai.
                                    </div>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            @if ($subdomains->hasPages())
                <div class="pagination-wrapper">
                    {{ $subdomains->links() }}
                </div>
            @endif

        </section>

        <footer class="footer">
            © {{ date('Y') }} Diskominfotik Kabupaten Indragiri Hulu
        </footer>

    </main>

    {{-- MODAL DETAIL SUBDOMAIN --}}
    <div class="modal-backdrop" id="detailModal">

        <section class="modal">

            <header class="modal-header">
                <div>
                    <h2>Detail Subdomain</h2>
                    <p>Informasi subdomain Perangkat Daerah.</p>
                </div>

                <button
                    type="button"
                    class="modal-close"
                    onclick="closeDetailModal()"
                    aria-label="Tutup"
                >
                    <i class="bi bi-x-lg"></i>
                </button>
            </header>

            <div class="modal-body">

                <div class="detail-grid">

                    <div class="detail-item">
                        <small>Nama Perangkat Daerah</small>
                        <strong id="detailOpd">-</strong>
                    </div>

                    <div class="detail-item">
                        <small>Alamat Subdomain</small>
                        <strong id="detailDomain">-</strong>
                    </div>

                    <div class="detail-item">
                        <small>Tanggal Pencatatan</small>
                        <strong id="detailDate">-</strong>
                    </div>

                    <div class="detail-item">
                        <small>Status Subdomain</small>
                        <strong id="detailStatus">-</strong>
                    </div>

                    <div class="detail-item full-width">
                        <small>Keterangan</small>
                        <strong id="detailDescription">-</strong>
                    </div>

                </div>

                <div class="modal-actions">
                    <button
                        type="button"
                        class="btn btn-light"
                        onclick="closeDetailModal()"
                    >
                        Tutup
                    </button>
                </div>

            </div>

        </section>

    </div>

    <script>
        const detailModal = document.getElementById('detailModal');

        // MENAMPILKAN DETAIL SUBDOMAIN
        function showDetail(button) {
            const data = button.dataset;

            document.getElementById('detailOpd').textContent =
                data.opd || '-';

            document.getElementById('detailDomain').textContent =
                data.domain || '-';

            document.getElementById('detailDate').textContent =
                data.date || '-';

            document.getElementById('detailStatus').textContent =
                data.status || '-';

            document.getElementById('detailDescription').textContent =
                data.description || '-';

            detailModal.classList.add('show');
        }

        // MENUTUP MODAL
        function closeDetailModal() {
            detailModal.classList.remove('show');
        }

        // KLIK DI LUAR MODAL
        detailModal.addEventListener('click', function(event) {
            if (event.target === detailModal) {
                closeDetailModal();
            }
        });

        // MENUTUP MODAL DENGAN TOMBOL ESCAPE
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeDetailModal();
            }
        });
    </script>

</body>
</html>
