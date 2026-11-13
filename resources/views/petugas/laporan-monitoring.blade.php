
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Monitoring | Diskominfotik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f3f6fb;
            font-family: "Segoe UI", Arial, sans-serif;
            color: #172b4d;
            font-size: 14px;
        }

        .main-content {
            margin-left: 270px;
            width: calc(100% - 270px);
            min-height: 100vh;
            padding: 34px 38px 45px;
        }

        /* HEADER */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 27px;
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
            margin: 0 0 7px;
        }

        .page-header p {
            color: #718096;
            font-size: 13px;
            line-height: 1.7;
            margin: 0;
        }

        .header-icon {
            width: 54px;
            height: 54px;
            min-width: 54px;
            border-radius: 15px;
            background: #e5f1fc;
            color: #1769a6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        /* INFORMATION BANNER */
        .info-banner {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            padding: 16px 19px;
            margin-bottom: 23px;
            background: #eaf4fd;
            border: 1px solid #cfe5f8;
            border-radius: 12px;
        }

        .info-banner > i {
            color: #1769a6;
            font-size: 19px;
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
            line-height: 1.6;
            margin: 0;
        }

        /* SUMMARY CARD */
        .summary-card {
            display: flex;
            align-items: center;
            gap: 16px;
            height: 100%;
            padding: 21px;
            background: #fff;
            border: 1px solid #e2eaf2;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(18, 59, 101, .035);
        }

        .summary-icon {
            width: 49px;
            height: 49px;
            min-width: 49px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .icon-report {
            color: #1769a6;
            background: #e5f1fc;
        }

        .icon-calendar {
            color: #198754;
            background: #e5f7ed;
        }

        .summary-label {
            color: #718096;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .summary-number {
            color: #123b65;
            font-size: 27px;
            font-weight: 750;
            margin: 0;
        }

        /* TABLE CARD */
        .table-card {
            margin-top: 25px;
            padding: 24px;
            background: #fff;
            border: 1px solid #e2eaf2;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(18, 59, 101, .035);
        }

        .section-title {
            color: #123b65;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .section-description {
            color: #718096;
            font-size: 12px;
            margin-bottom: 21px;
        }

        /* TABLE */
        .table-responsive {
            border: 1px solid #e8edf3;
            border-radius: 9px;
        }

        .table {
            min-width: 800px;
            margin-bottom: 0;
        }

        .table thead th {
            padding: 14px 13px;
            background: #f5f8fc;
            color: #64748b;
            border-bottom: 1px solid #e2eaf2;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 14px 13px;
            color: #42536a;
            border-bottom: 1px solid #edf1f5;
            font-size: 12px;
            vertical-align: middle;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background: #f9fbfe;
        }

        .report-name {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #123b65;
            font-weight: 650;
        }

        .report-file-icon {
            width: 34px;
            height: 34px;
            min-width: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff0f0;
            color: #dc3545;
            border-radius: 8px;
            font-size: 17px;
        }

        .date-text {
            white-space: nowrap;
            color: #64748b;
        }

        .number-cell {
            color: #344b63;
            font-weight: 600;
            text-align: center;
        }

        /* DOWNLOAD BUTTON */
        .btn-download {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 8px 12px;
            color: #1769a6;
            background: #eaf4fd;
            border: 1px solid #cfe5f8;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 650;
            text-decoration: none;
            white-space: nowrap;
            transition: .2s;
        }

        .btn-download:hover {
            color: #fff;
            background: #1769a6;
            border-color: #1769a6;
        }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 48px 15px;
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            background: #f0f4f8;
            color: #8a9bb0;
            border-radius: 16px;
            font-size: 29px;
        }

        .empty-state strong {
            display: block;
            color: #344b63;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .empty-state p {
            color: #8492a6;
            font-size: 12px;
            margin: 0;
            line-height: 1.6;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .main-content {
                margin-left: 220px;
                width: calc(100% - 220px);
                padding: 27px 22px 35px;
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

            .table-card {
                padding: 19px 15px;
            }
        }

        @media (max-width: 560px) {
            .main-content {
                padding: 18px 12px 25px;
            }

            .header-icon {
                width: 45px;
                height: 45px;
                min-width: 45px;
                font-size: 21px;
            }

            .page-header h1 {
                font-size: 21px;
            }

            .summary-card {
                padding: 17px;
            }

            .summary-number {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', ['role' => 'petugas'])

    <main class="main-content">

        {{-- HEADER --}}
        <header class="page-header">
            <div class="header-text">
                <div class="page-eyebrow">
                    <i class="bi bi-building"></i>
                    AREA PENGELOLAAN DISKOMINFOTIK
                </div>

                <h1>Laporan Monitoring</h1>

                <p>
                    Riwayat dokumen laporan hasil monitoring subdomain Perangkat Daerah.
                </p>
            </div>

            <div class="header-icon">
                <i class="bi bi-file-earmark-bar-graph"></i>
            </div>
        </header>

        {{-- INFORMATION BANNER --}}
        <div class="info-banner">
            <i class="bi bi-info-circle-fill"></i>

            <div>
                <strong>Informasi Laporan Monitoring</strong>

                <p>
                    Halaman ini menampilkan riwayat laporan monitoring subdomain
                    yang telah diterbitkan oleh petugas. Setiap dokumen dapat
                    diunduh kembali dalam format PDF.
                </p>
            </div>
        </div>

        {{-- SUMMARY --}}
        <div class="row g-3">

            <div class="col-md-6">
                <div class="summary-card">
                    <div class="summary-icon icon-report">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </div>

                    <div>
                        <p class="summary-label">
                            Total Laporan Diterbitkan
                        </p>

                        <h2 class="summary-number">
                            {{ $laporans->count() }}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="summary-card">
                    <div class="summary-icon icon-calendar">
                        <i class="bi bi-calendar-check"></i>
                    </div>

                    <div>
                        <p class="summary-label">
                            Laporan Terakhir
                        </p>

                        <h2 class="summary-number" style="font-size: 21px;">
                            @if ($laporans->isNotEmpty())
                                {{ $laporans->first()->created_at->format('d/m/Y') }}
                            @else
                                -
                            @endif
                        </h2>
                    </div>
                </div>
            </div>

        </div>

        {{-- TABLE HISTORY --}}
        <section class="table-card">

            <h5 class="section-title">
                <i class="bi bi-clock-history me-2"></i>
                Riwayat Dokumen Laporan
            </h5>

            <p class="section-description">
                Daftar dokumen PDF laporan monitoring yang telah diterbitkan.
            </p>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>Nama Laporan</th>
                            <th>Tanggal Dibuat</th>
                            <th class="text-center">Total Subdomain</th>
                            <th class="text-center">Aktif</th>
                            <th class="text-center">Nonaktif</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($laporans as $index => $laporan)

                            <tr>
                                <td>
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    <div class="report-name">
                                        <div class="report-file-icon">
                                            <i class="bi bi-file-earmark-pdf"></i>
                                        </div>

                                        <span>
                                            {{ $laporan->nama_laporan }}
                                        </span>
                                    </div>
                                </td>

                                <td>
                                    <span class="date-text">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ $laporan->created_at->format('d/m/Y H:i') }}
                                    </span>
                                </td>

                                <td class="number-cell">
                                    {{ $laporan->total_subdomain }}
                                </td>

                                <td class="number-cell">
                                    {{ $laporan->subdomain_aktif }}
                                </td>

                                <td class="number-cell">
                                    {{ $laporan->subdomain_nonaktif }}
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('petugas.laporan.download', $laporan->id) }}"
                                       class="btn-download">
                                        <i class="bi bi-download"></i>
                                        Unduh PDF
                                    </a>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">

                                        <div class="empty-icon">
                                            <i class="bi bi-folder2-open"></i>
                                        </div>

                                        <strong>Belum Ada Laporan</strong>

                                        <p>
                                            Laporan yang diterbitkan melalui menu
                                            Monitoring akan ditampilkan di sini.
                                        </p>

                                    </div>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>

    </main>

</body>
</html>
