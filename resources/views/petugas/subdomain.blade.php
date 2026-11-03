
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Subdomain | Diskominfotik</title>

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

        .sidebar a.active,
        .sidebar .active {
            font-weight: 700 !important;
        }

        .sidebar a.active span,
        .sidebar .active span {
            font-weight: 700 !important;
        }

        /* HEADER */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 22px;
        }

        .breadcrumb {
            font-size: 12px;
            color: #7d8ba0;
            margin-bottom: 8px;
        }

        .page-title {
            font-size: 23px;
            color: #172b4d;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .page-description {
            font-size: 13px;
            color: #77859a;
            line-height: 1.6;
        }

        /* TOMBOL */
        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            border: none;
            border-radius: 8px;
            padding: 10px 14px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-primary {
            background: #2854a2;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4285;
        }

        .btn-light {
            background: #edf3ff;
            color: #2854a2;
        }

        .btn-light:hover {
            background: #dce8ff;
        }

        /* RINGKASAN */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 22px;
        }

        .summary-card {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 19px;
            background: white;
            border: 1px solid #e2e8f1;
            border-radius: 11px;
        }

        .summary-icon {
            width: 45px;
            height: 45px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 10px;
            font-size: 20px;
        }

        .summary-icon.blue {
            background: #edf3ff;
            color: #2854a2;
        }

        .summary-icon.green {
            background: #e1f7ec;
            color: #168451;
        }

        .summary-icon.red {
            background: #ffe8e8;
            color: #c33e3e;
        }

        .summary-info p {
            font-size: 11px;
            color: #8793a5;
            margin-bottom: 5px;
        }

        .summary-info h2 {
            color: #172b4d;
            font-size: 23px;
            font-weight: 700;
        }

        /* KONTEN */
        .content-card {
            background: white;
            border: 1px solid #e2e8f1;
            border-radius: 10px;
            padding: 17px;
            margin-bottom: 22px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 17px;
        }

        .section-heading h2 {
            font-size: 16px;
            color: #172b4d;
            margin-bottom: 6px;
        }

        .section-heading p {
            font-size: 12px;
            color: #8793a5;
            line-height: 1.6;
        }

        /* PENCARIAN */
        .filter-row {
            display: flex;
            gap: 10px;
            margin-bottom: 16px;
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
            height: 42px;
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
            padding-left: 38px;
        }

        .search-box input:focus,
        .filter-row select:focus {
            border-color: #2854a2;
        }

        .filter-row select {
            width: 165px;
        }

        /* TABEL */
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
            background: #eef2f8;
            color: #344761;
            font-size: 10px;
            font-weight: 600;
            text-align: left;
            padding: 12px 11px;
            border-bottom: 1px solid #e8edf4;
            white-space: nowrap;
        }

        td {
            padding: 13px 11px;
            border-bottom: 1px solid #edf0f5;
            font-size: 11px;
            color: #536177;
            line-height: 1.6;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fafcff;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .domain-number {
            color: #152b4d;
            font-weight: 600;
            white-space: nowrap;
        }

        .opd-name {
            color: #243650;
            font-weight: 600;
            min-width: 140px;
        }

        .domain-address {
            color: #2854a2;
            font-weight: 600;
            overflow-wrap: anywhere;
            min-width: 175px;
        }

        .date-text {
            white-space: nowrap;
        }

        /* STATUS */
        .status {
            display: inline-block;
            border-radius: 20px;
            padding: 5px 9px;
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status.active {
            background: #e1f7ec;
            color: #168451;
        }

        .status.inactive {
            background: #ffe8e8;
            color: #c33e3e;
        }

        /* AKSI */
        .action-buttons {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .icon-button {
            width: 31px;
            height: 31px;
            display: inline-grid;
            place-items: center;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
        }

        .icon-button.detail {
            background: #edf3ff;
            color: #2854a2;
        }

        .icon-button:hover {
            filter: brightness(0.96);
        }

        /* PAGINATION */
        .pagination-wrapper {
            margin-top: 18px;
        }

        .pagination-wrapper nav > div:first-child {
            font-size: 11px;
            color: #8793a5;
        }

        .pagination-wrapper nav > div:last-child {
            margin-top: 10px;
        }

        .pagination-wrapper a,
        .pagination-wrapper span {
            font-size: 12px;
        }

        /* MODAL DETAIL */
        .modal-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 1000;
            background: rgba(15, 30, 52, 0.48);
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
            background: white;
            border-radius: 13px;
            box-shadow: 0 18px 55px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            padding: 20px 22px;
            border-bottom: 1px solid #edf0f5;
        }

        .modal-header h2 {
            color: #172b4d;
            font-size: 17px;
            margin-bottom: 5px;
        }

        .modal-header p {
            color: #8793a5;
            font-size: 11px;
            line-height: 1.6;
        }

        .modal-close {
            border: none;
            background: transparent;
            color: #718097;
            font-size: 23px;
            cursor: pointer;
        }

        .modal-body {
            padding: 22px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .detail-item small {
            display: block;
            color: #8793a5;
            font-size: 10px;
            margin-bottom: 6px;
        }

        .detail-item strong {
            display: block;
            color: #243650;
            font-size: 12px;
            overflow-wrap: anywhere;
            line-height: 1.6;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            color: #9aa5b5;
            font-size: 11px;
            padding: 12px 0;
        }

        @media (max-width: 1000px) {
            .main-content {
                margin-left: 220px;
                padding: 22px 18px;
            }

            .summary-grid {
                gap: 10px;
            }

            .summary-card {
                padding: 14px;
            }
        }

        @media (max-width: 650px) {
            .main-content {
                margin-left: 0;
                padding: 20px 14px;
            }

            .topbar,
            .section-heading {
                flex-direction: column;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .filter-row {
                flex-direction: column;
            }

            .filter-row select {
                width: 100%;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .modal-header,
            .modal-body {
                padding: 16px;
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
                    Dashboard / Data Subdomain
                </div>

                <h1 class="page-title">Data Subdomain</h1>

                <p class="page-description">
                    Kelola data subdomain milik Perangkat Daerah yang tercatat di Diskominfotik.
                </p>
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

        {{-- TABEL DATA --}}
        <section class="content-card">

            <div class="section-heading">
                <div>
                    <h2>Daftar Subdomain Perangkat Daerah</h2>
                    <p>Data subdomain yang tercatat beserta statusnya.</p>
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
                    <option value="aktif" {{ request('status') === 'aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>
                    <option value="nonaktif" {{ request('status') === 'nonaktif' ? 'selected' : '' }}>
                        Nonaktif
                    </option>
                </select>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                    Cari
                </button>

                <a href="{{ route('petugas.subdomain') }}" class="btn btn-light">
                    Reset
                </a>

            </form>

            {{-- TABEL --}}
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
                                <td class="domain-number">
                                    {{ $subdomains->firstItem() + $index }}
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
                                        <span class="status active">● Aktif</span>
                                    @else
                                        <span class="status inactive">● Nonaktif</span>
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
                                <td colspan="6" style="text-align: center; padding: 30px;">
                                    <i class="bi bi-database" style="font-size: 22px;"></i>
                                    <p style="margin-top: 8px;">
                                        Belum ada data subdomain yang sesuai.
                                    </p>
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

    {{-- MODAL DETAIL --}}
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
                    &times;
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

                    <div class="detail-item" style="grid-column: 1 / -1;">
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

        // MENUTUP MODAL DETAIL
        function closeDetailModal() {
            detailModal.classList.remove('show');
        }

        // KLIK DI LUAR MODAL
        detailModal.addEventListener('click', function(event) {
            if (event.target === detailModal) {
                closeDetailModal();
            }
        });

        // TUTUP MODAL DENGAN TOMBOL ESCAPE
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeDetailModal();
            }
        });
    </script>

</body>
</html>
