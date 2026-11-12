
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subdomain Saya</title>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            font-size: 14px;
            background: #f3f6fb;
            color: #172b4d;
        }

        button, input {
            font-family: inherit;
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: 270px;
            width: calc(100% - 270px);
            min-height: 100vh;
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
            color: #2872ad;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 9px;
        }

        .page-header h1 {
            color: #123b65;
            font-size: 27px;
            font-weight: 750;
            margin-bottom: 8px;
        }

        .page-header p {
            color: #718096;
            font-size: 13px;
            line-height: 1.7;
        }

        .header-icon {
            width: 54px;
            height: 54px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
            color: #1769a6;
            background: #e5f1fc;
            border-radius: 15px;
            font-size: 25px;
        }

        /* SUCCESS ALERT */
        .success-alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px 18px;
            margin-bottom: 22px;
            color: #08744d;
            background: #e9f8f0;
            border: 1px solid #c9ebd8;
            border-radius: 11px;
            animation: fadeIn .35s ease;
        }

        .success-alert i {
            font-size: 21px;
            margin-top: 1px;
        }

        .success-alert-content {
            flex: 1;
        }

        .success-alert strong {
            display: block;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .success-alert p {
            font-size: 12px;
            line-height: 1.6;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-7px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* INFORMATION BANNER */
        .info-banner {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            padding: 17px 19px;
            margin-bottom: 22px;
            background: #eaf4fd;
            border: 1px solid #cfe5f8;
            border-radius: 12px;
        }

        .info-icon {
            color: #1769a6;
            font-size: 20px;
            margin-top: 1px;
        }

        .info-banner strong {
            display: block;
            color: #174b78;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .info-banner p {
            color: #52718e;
            font-size: 12px;
            line-height: 1.7;
        }

        /* STATISTICS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 17px;
            margin-bottom: 24px;
        }

        .stat-card {
            display: flex;
            align-items: center;
            gap: 15px;
            min-width: 0;
            padding: 19px 20px;
            background: #fff;
            border: 1px solid #e2eaf2;
            border-radius: 13px;
            box-shadow: 0 4px 16px rgba(23, 55, 90, .035);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 11px;
            font-size: 21px;
        }

        .stat-icon.total {
            color: #1769a6;
            background: #e8f2fc;
        }

        .stat-icon.active {
            color: #13845d;
            background: #e7f7ef;
        }

        .stat-icon.inactive {
            color: #c17a22;
            background: #fff5e6;
        }

        .stat-info {
            min-width: 0;
        }

        .stat-info span {
            display: block;
            color: #8290a3;
            font-size: 11px;
            margin-bottom: 5px;
        }

        .stat-info strong {
            display: block;
            color: #123b65;
            font-size: 23px;
            font-weight: 750;
        }

        /* CONTENT CARD */
        .content-card {
            background: #fff;
            border: 1px solid #e2eaf2;
            border-radius: 16px;
            box-shadow: 0 5px 22px rgba(23, 55, 90, .045);
            overflow: hidden;
        }

        .card-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 23px 28px;
            border-bottom: 1px solid #edf1f6;
        }

        .card-heading h2 {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #123b65;
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .card-heading h2 i {
            color: #2878b8;
        }

        .card-heading p {
            color: #8290a3;
            font-size: 12px;
            line-height: 1.6;
        }

        .card-body {
            padding: 23px 28px 27px;
        }

        /* SEARCH */
        .table-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 13px;
            margin-bottom: 19px;
        }

        .search-box {
            position: relative;
            width: 310px;
            max-width: 100%;
        }

        .search-box i {
            position: absolute;
            top: 50%;
            left: 13px;
            transform: translateY(-50%);
            color: #91a0b2;
            font-size: 14px;
        }

        .search-box input {
            width: 100%;
            height: 42px;
            padding: 10px 13px 10px 37px;
            color: #243c59;
            background: #fff;
            border: 1px solid #d8e1ec;
            border-radius: 9px;
            font-size: 12px;
            outline: none;
            transition: .2s ease;
        }

        .search-box input:focus {
            border-color: #3987c4;
            box-shadow: 0 0 0 3px rgba(57, 135, 196, .11);
        }

        .search-box input::placeholder {
            color: #a5afbd;
        }

        .search-result {
            color: #8290a3;
            font-size: 11px;
        }

        /* TABLE */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #e8edf3;
            border-radius: 10px;
        }

        .subdomain-table {
            width: 100%;
            min-width: 720px;
            border-collapse: collapse;
        }

        .subdomain-table thead {
            background: #f5f8fc;
        }

        .subdomain-table th {
            padding: 14px 15px;
            color: #52657c;
            font-size: 11px;
            font-weight: 700;
            text-align: left;
            white-space: nowrap;
            border-bottom: 1px solid #e8edf3;
        }

        .subdomain-table td {
            padding: 15px;
            color: #52657c;
            font-size: 12px;
            vertical-align: middle;
            border-bottom: 1px solid #edf1f6;
        }

        .subdomain-table tbody tr:last-child td {
            border-bottom: none;
        }

        .subdomain-table tbody tr:hover {
            background: #fafcff;
        }

        .domain-name {
            color: #174b78;
            font-weight: 650;
            overflow-wrap: anywhere;
        }

        .domain-url {
            display: block;
            color: #8a97a8;
            font-size: 11px;
            margin-top: 4px;
            overflow-wrap: anywhere;
        }

        /* STATUS */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-badge.aktif {
            color: #13845d;
            background: #e7f7ef;
        }

        .status-badge.nonaktif {
            color: #bd7924;
            background: #fff4e3;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            display: inline-block;
            border-radius: 50%;
            background: currentColor;
        }

        .description-text {
            color: #718096;
            line-height: 1.6;
        }

        /* HISTORY BUTTON */
        .history-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 8px 11px;
            color: #1769a6;
            background: #eaf4fd;
            border: 1px solid #cfe5f8;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 650;
            cursor: pointer;
            transition: .2s ease;
            white-space: nowrap;
        }

        .history-button:hover {
            color: #fff;
            background: #1769a6;
            border-color: #1769a6;
        }

        .history-button i {
            transition: transform .2s ease;
        }

        .history-button.open i {
            transform: rotate(180deg);
        }

        /* EMPTY STATE */
        .empty-state {
            padding: 45px 20px;
            text-align: center;
        }

        .empty-state i {
            display: block;
            color: #b4c5d6;
            font-size: 39px;
            margin-bottom: 12px;
        }

        .empty-state strong {
            display: block;
            color: #52657c;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .empty-state p {
            color: #929eae;
            font-size: 12px;
            line-height: 1.6;
        }

        .no-search-result {
            display: none;
            padding: 30px 15px;
            color: #8290a3;
            font-size: 12px;
            text-align: center;
        }

        /* HISTORY PANEL */
        .history-row {
            display: none;
        }

        .history-row.show {
            display: table-row;
        }

        .history-container {
            padding: 19px 21px;
            background: #f8fafd;
            border-bottom: 1px solid #e8edf3;
        }

        .history-title {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #174b78;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .history-title i {
            color: #2878b8;
            font-size: 15px;
        }

        .history-list {
            position: relative;
            padding-left: 19px;
        }

        .history-item {
            position: relative;
            padding: 0 0 17px 17px;
            border-left: 1px solid #cbdceb;
        }

        .history-item:last-child {
            padding-bottom: 0;
            border-left-color: transparent;
        }

        .history-item::before {
            content: "";
            position: absolute;
            top: 2px;
            left: -5px;
            width: 9px;
            height: 9px;
            background: #2878b8;
            border: 2px solid #eaf4fd;
            border-radius: 50%;
        }

        .history-item strong {
            display: block;
            color: #344b68;
            font-size: 11px;
            margin-bottom: 4px;
        }

        .history-item span {
            display: block;
            color: #8290a3;
            font-size: 11px;
            line-height: 1.6;
        }

        .history-empty {
            color: #929eae;
            font-size: 11px;
            line-height: 1.6;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) and (min-width: 761px) {
            .main-content {
                margin-left: 220px;
                width: calc(100% - 220px);
                padding: 27px 22px 35px;
            }

            .stats-grid {
                gap: 11px;
            }

            .stat-card {
                padding: 16px 13px;
                gap: 10px;
            }

            .stat-icon {
                width: 39px;
                height: 39px;
            }
        }

        @media (max-width: 760px) {
            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 22px 17px 30px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .stat-card {
                padding: 15px 17px;
            }

            .card-heading,
            .card-body {
                padding-left: 18px;
                padding-right: 18px;
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
                width: 43px;
                height: 43px;
                font-size: 20px;
            }

            .info-banner {
                padding: 14px;
            }

            .card-heading {
                padding: 19px 15px;
            }

            .card-body {
                padding: 18px 14px 22px;
            }

            .table-toolbar {
                align-items: stretch;
                flex-direction: column;
            }

            .search-box {
                width: 100%;
            }

            .search-result {
                text-align: left;
            }

            .history-container {
                padding: 15px 12px;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', ['role' => 'opd'])

    <main class="main-content">

        {{-- HEADER --}}
        <header class="page-header">
            <div class="header-text">
                <div class="page-eyebrow">
                    <i class="bi bi-building"></i>
                    AREA PERANGKAT DAERAH
                </div>

                <h1>Subdomain Saya</h1>

                <p>
                    Lihat dan pantau daftar subdomain yang telah terdaftar pada
                    Perangkat Daerah Anda, termasuk status penggunaan, keterangan,
                    serta riwayat pendaftaran dan monitoring setiap subdomain.
                </p>
            </div>

            <div class="header-icon">
                <i class="bi bi-globe2"></i>
            </div>
        </header>

        {{-- NOTIFIKASI SUKSES --}}
        @if (session('success'))
            <div class="success-alert" role="status" aria-live="polite">
                <i class="bi bi-check-circle-fill"></i>

                <div class="success-alert-content">
                    <strong>Berhasil!</strong>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        {{-- INFORMASI --}}
        <div class="info-banner">
            <i class="bi bi-info-circle-fill info-icon"></i>

            <div>
                <strong>Informasi Subdomain Anda</strong>
                <p>
                    Halaman ini menampilkan daftar subdomain yang telah terdaftar
                    pada Perangkat Daerah Anda. Periksa status penggunaan dan
                    keterangan setiap subdomain. Anda juga dapat melihat riwayat
                    pendaftaran serta hasil monitoring yang telah dilakukan
                    oleh petugas Diskominfotik.
                </p>
            </div>
        </div>

        {{-- STATISTIK --}}
        <section class="stats-grid">

            <div class="stat-card">
                <div class="stat-icon total">
                    <i class="bi bi-globe2"></i>
                </div>

                <div class="stat-info">
                    <span>Total Subdomain</span>
                    <strong>{{ $totalSubdomain }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon active">
                    <i class="bi bi-check-circle-fill"></i>
                </div>

                <div class="stat-info">
                    <span>Subdomain Aktif</span>
                    <strong>{{ $totalAktif }}</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon inactive">
                    <i class="bi bi-pause-circle-fill"></i>
                </div>

                <div class="stat-info">
                    <span>Subdomain Nonaktif</span>
                    <strong>{{ $totalNonaktif }}</strong>
                </div>
            </div>

        </section>

        {{-- DAFTAR SUBDOMAIN --}}
        <section class="content-card">

            <div class="card-heading">
                <div>
                    <h2>
                        <i class="bi bi-list-ul"></i>
                        Daftar Subdomain Terdaftar
                    </h2>

                    <p>
                        Informasi subdomain yang dimiliki oleh Perangkat Daerah Anda.
                    </p>
                </div>
            </div>

            <div class="card-body">

                {{-- PENCARIAN --}}
                <div class="table-toolbar">

                    <div class="search-box">
                        <i class="bi bi-search"></i>

                        <input
                            type="text"
                            id="searchInput"
                            placeholder="Cari nama subdomain..."
                            autocomplete="off"
                        >
                    </div>

                    <span class="search-result" id="searchResult">
                        Menampilkan {{ $subdomains->count() }} subdomain
                    </span>

                </div>

                <div class="table-wrapper">
                    <table class="subdomain-table">

                        <thead>
                            <tr>
                                <th style="width: 55px;">No.</th>
                                <th>Nama Subdomain</th>
                                <th style="width: 120px;">Status</th>
                                <th>Keterangan</th>
                                <th style="width: 130px;">Riwayat</th>
                            </tr>
                        </thead>

                        <tbody id="subdomainTableBody">

                            @forelse ($subdomains as $subdomain)

                                <tr class="subdomain-row">
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <span class="domain-name">
                                            {{ $subdomain->nama_subdomain }}
                                        </span>

                                        <span class="domain-url">
                                            {{ $subdomain->nama_subdomain }}.inhukab.go.id
                                        </span>
                                    </td>

                                    <td>
                                        @if (strtolower($subdomain->status) === 'aktif')
                                            <span class="status-badge aktif">
                                                <span class="status-dot"></span>
                                                Aktif
                                            </span>
                                        @else
                                            <span class="status-badge nonaktif">
                                                <span class="status-dot"></span>
                                                Nonaktif
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <span class="description-text">
                                            {{ $subdomain->keterangan ?: 'Tidak ada keterangan.' }}
                                        </span>
                                    </td>

                                    <td>
                                        <button
                                            type="button"
                                            class="history-button"
                                            data-history="history-{{ $subdomain->id }}"
                                            aria-expanded="false"
                                        >
                                            <i class="bi bi-clock-history"></i>
                                            Lihat Riwayat
                                        </button>
                                    </td>
                                </tr>

                                {{-- RIWAYAT SUBDOMAIN --}}
                                <tr
                                    class="history-row"
                                    id="history-{{ $subdomain->id }}"
                                >
                                    <td colspan="5">
                                        <div class="history-container">

                                            <div class="history-title">
                                                <i class="bi bi-clock-history"></i>
                                                Riwayat {{ $subdomain->nama_subdomain }}.inhukab.go.id
                                            </div>

                                            <div class="history-list">

                                                {{-- PENDAFTARAN --}}
                                                <div class="history-item">
                                                    <strong>Subdomain Terdaftar</strong>

                                                    <span>
                                                        Tanggal pendaftaran:
                                                        {{ $subdomain->created_at
                                                            ? $subdomain->created_at->format('d-m-Y')
                                                            : '-' }}
                                                    </span>

                                                    <span>
                                                        Nama subdomain:
                                                        {{ $subdomain->nama_subdomain }}.inhukab.go.id
                                                    </span>
                                                </div>

                                                {{-- RIWAYAT MONITORING --}}
                                                @forelse ($subdomain->monitorings as $monitoring)

                                                    <div class="history-item">
                                                        <strong>
                                                            Hasil Monitoring:
                                                            {{ ucfirst($monitoring->status) }}
                                                        </strong>

                                                        <span>
                                                            Tanggal monitoring:
                                                            {{ $monitoring->tanggal_monitoring
                                                                ? \Carbon\Carbon::parse($monitoring->tanggal_monitoring)->format('d-m-Y')
                                                                : '-' }}
                                                        </span>

                                                        <span>
                                                            Catatan:
                                                            {{ $monitoring->catatan ?: 'Tidak ada catatan.' }}
                                                        </span>
                                                    </div>

                                                @empty
                                                    <p class="history-empty">
                                                        Belum terdapat riwayat monitoring
                                                        untuk subdomain ini.
                                                    </p>
                                                @endforelse

                                                {{-- TANGGAL NONAKTIF --}}
                                                @if (strtolower($subdomain->status) === 'nonaktif')
                                                    <div class="history-item">
                                                        <strong>Subdomain Dinonaktifkan</strong>

                                                        <span>
                                                            Tanggal nonaktif:
                                                            {{ $subdomain->tanggal_nonaktif
                                                                ? \Carbon\Carbon::parse($subdomain->tanggal_nonaktif)->format('d-m-Y')
                                                                : '-' }}
                                                        </span>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5">
                                        <div class="empty-state">
                                            <i class="bi bi-globe2"></i>

                                            <strong>Belum Ada Subdomain</strong>

                                            <p>
                                                Saat ini belum terdapat subdomain
                                                yang terdaftar pada Perangkat Daerah Anda.
                                            </p>
                                        </div>
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>
                </div>

                <div class="no-search-result" id="noSearchResult">
                    <i class="bi bi-search"></i>
                    Tidak ditemukan subdomain yang sesuai dengan pencarian.
                </div>

            </div>
        </section>

    </main>

    <script>
        // PENCARIAN SUBDOMAIN
        const searchInput = document.getElementById('searchInput');
        const subdomainRows = document.querySelectorAll('.subdomain-row');
        const searchResult = document.getElementById('searchResult');
        const noSearchResult = document.getElementById('noSearchResult');

        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase().trim();

            let visibleCount = 0;

            subdomainRows.forEach(function (row) {
                const domainName = row.querySelector('.domain-name')
                    .textContent
                    .toLowerCase();

                const historyId = row.nextElementSibling;

                const isMatch = domainName.includes(keyword);

                row.style.display = isMatch ? '' : 'none';

                if (historyId && historyId.classList.contains('history-row')) {
                    if (!isMatch) {
                        historyId.classList.remove('show');

                        const historyButton = row.querySelector('.history-button');

                        if (historyButton) {
                            historyButton.classList.remove('open');
                            historyButton.setAttribute('aria-expanded', 'false');
                        }
                    }
                }

                if (isMatch) {
                    visibleCount++;
                }
            });

            searchResult.textContent =
                'Menampilkan ' + visibleCount + ' dari ' +
                subdomainRows.length + ' subdomain';

            noSearchResult.style.display =
                visibleCount === 0 && subdomainRows.length > 0
                    ? 'block'
                    : 'none';
        });

        // TOMBOL RIWAYAT
        document.querySelectorAll('.history-button').forEach(function (button) {
            button.addEventListener('click', function () {
                const historyId = this.getAttribute('data-history');
                const historyRow = document.getElementById(historyId);

                if (!historyRow) {
                    return;
                }

                const isCurrentlyOpen = historyRow.classList.contains('show');

                // Tutup seluruh riwayat yang sedang terbuka
                document.querySelectorAll('.history-row').forEach(function (row) {
                    row.classList.remove('show');
                });

                document.querySelectorAll('.history-button').forEach(function (item) {
                    item.classList.remove('open');
                    item.setAttribute('aria-expanded', 'false');
                });

                // Buka riwayat yang dipilih
                if (!isCurrentlyOpen) {
                    historyRow.classList.add('show');
                    this.classList.add('open');
                    this.setAttribute('aria-expanded', 'true');
                }
            });
        });
    </script>

</body>
</html>
