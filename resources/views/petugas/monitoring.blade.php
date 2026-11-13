
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Subdomain | Diskominfotik</title>

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

        .info-banner i {
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

        /* SUMMARY */
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

        .icon-total {
            color: #1769a6;
            background: #e5f1fc;
        }

        .icon-active {
            color: #198754;
            background: #e5f7ed;
        }

        .icon-inactive {
            color: #dc6b32;
            background: #fff0e8;
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

        /* CONTENT CARD */
        .content-card {
            margin-top: 25px;
            padding: 24px;
            background: #fff;
            border: 1px solid #e2eaf2;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(18, 59, 101, .035);
        }

        .content-heading {
            color: #123b65;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .content-subtitle {
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
            min-width: 850px;
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

        .domain-name {
            color: #1769a6;
            font-weight: 650;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-active {
            color: #198754;
            background: #e5f7ed;
        }

        .status-inactive {
            color: #c65c28;
            background: #fff0e8;
        }

        .status-check-active {
            color: #198754;
            background: #e5f7ed;
        }

        .status-check-inactive {
            color: #c65c28;
            background: #fff0e8;
        }

        .btn-check-monitoring {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            color: #1769a6;
            background: #eaf4fd;
            border: 1px solid #cfe5f8;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 650;
            transition: .2s;
        }

        .btn-check-monitoring:hover {
            color: #fff;
            background: #1769a6;
            border-color: #1769a6;
        }

        /* DOWNLOAD */
        .download-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-top: 23px;
            padding: 21px 23px;
            background: #fff;
            border: 1px solid #e2eaf2;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(18, 59, 101, .035);
        }

        .download-info {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .download-icon {
            width: 45px;
            height: 45px;
            min-width: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #dc3545;
            background: #fff0f0;
            border-radius: 11px;
            font-size: 21px;
        }

        .download-title {
            color: #123b65;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .download-description {
            color: #718096;
            font-size: 12px;
            line-height: 1.6;
            margin: 0;
        }

        .btn-download {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            color: #fff;
            background: #1769a6;
            border: 1px solid #1769a6;
            border-radius: 8px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 650;
            white-space: nowrap;
            transition: .2s;
        }

        .btn-download:hover {
            color: #fff;
            background: #123b65;
            border-color: #123b65;
        }

        /* MODAL */
        .modal-content {
            border: none;
            border-radius: 13px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(18, 59, 101, .15);
        }

        .modal-header {
            padding: 19px 22px;
            background: #f5f8fc;
            border-bottom: 1px solid #e2eaf2;
        }

        .modal-title {
            color: #123b65;
            font-size: 16px;
            font-weight: 750;
        }

        .modal-body {
            padding: 22px;
        }

        .modal-footer {
            padding: 15px 22px;
            background: #fafbfd;
            border-top: 1px solid #e8edf3;
        }

        .form-label {
            color: #344b63;
            font-size: 12px;
            font-weight: 650;
            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            min-height: 41px;
            border: 1px solid #dce5ef;
            border-radius: 7px;
            color: #344b63;
            font-size: 12px;
            box-shadow: none !important;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #80b7e2;
        }

        .form-control[readonly] {
            background: #f5f8fc;
            color: #64748b;
        }

        .form-text {
            color: #8492a6;
            font-size: 11px;
        }

        .modal-footer .btn {
            padding: 9px 15px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
        }

        .alert {
            border-radius: 9px;
            font-size: 12px;
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

            .content-card {
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

            .download-section {
                align-items: flex-start;
                flex-direction: column;
                padding: 18px;
            }

            .btn-download {
                width: 100%;
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
            <h1>Monitoring Subdomain</h1>
            <p>
                Pantau kondisi dan hasil pemeriksaan seluruh subdomain Perangkat Daerah.
            </p>
        </div>

        <div class="header-icon">
            <i class="bi bi-clipboard2-check"></i>
        </div>
    </header>

    {{-- INFORMATION --}}
    <div class="info-banner">
        <i class="bi bi-info-circle-fill"></i>
        <div>
            <strong>Informasi Monitoring Subdomain</strong>
            <p>
                Lakukan pemeriksaan secara berkala untuk mengetahui kondisi setiap subdomain.
                Hasil pemeriksaan terakhir akan ditampilkan pada daftar monitoring berikut.
            </p>
        </div>
    </div>

    {{-- SUMMARY --}}
    <div class="row g-3">

        <div class="col-md-4">
            <div class="summary-card">
                <div class="summary-icon icon-total">
                    <i class="bi bi-globe2"></i>
                </div>
                <div>
                    <p class="summary-label">Total Seluruh Subdomain</p>
                    <h2 class="summary-number">{{ $total }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="summary-card">
                <div class="summary-icon icon-active">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div>
                    <p class="summary-label">Subdomain Aktif</p>
                    <h2 class="summary-number">{{ $aktif }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="summary-card">
                <div class="summary-icon icon-inactive">
                    <i class="bi bi-exclamation-circle"></i>
                </div>
                <div>
                    <p class="summary-label">Subdomain Nonaktif</p>
                    <h2 class="summary-number">{{ $nonaktif }}</h2>
                </div>
            </div>
        </div>

    </div>

    {{-- MONITORING TABLE --}}
    <section class="content-card">

        <h5 class="content-heading">
            <i class="bi bi-list-check me-2"></i>
            Daftar Status Subdomain
        </h5>

        <p class="content-subtitle">
            Informasi subdomain beserta hasil pemeriksaan terakhir.
        </p>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Perangkat Daerah</th>
                        <th>Nama Subdomain</th>
                        <th>Status Subdomain</th>
                        <th>Monitoring Terakhir</th>
                        <th>Hasil Pemeriksaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($subdomains as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>
                                {{ $item->opd->nama_opd ?? '-' }}
                            </td>

                            <td>
                                <span class="domain-name">
                                    {{ $item->nama_subdomain }}
                                </span>
                            </td>

                            <td>
                                @if($item->status === 'aktif')
                                    <span class="status-badge status-active">
                                        <i class="bi bi-check-circle-fill"></i>
                                        Aktif
                                    </span>
                                @else
                                    <span class="status-badge status-inactive">
                                        <i class="bi bi-x-circle-fill"></i>
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td>
                                @if($item->monitoringTerakhir)
                                    {{ $item->monitoringTerakhir->tanggal_monitoring->format('d-m-Y') }}
                                @else
                                    <span class="text-muted">Belum diperiksa</span>
                                @endif
                            </td>

                            <td>
                                @if($item->monitoringTerakhir)
                                    @if($item->monitoringTerakhir->status_pemeriksaan === 'aktif')
                                        <span class="status-badge status-check-active">
                                            <i class="bi bi-check-circle-fill"></i>
                                            Aktif
                                        </span>
                                    @else
                                        <span class="status-badge status-check-inactive">
                                            <i class="bi bi-exclamation-circle-fill"></i>
                                            Nonaktif
                                        </span>
                                    @endif
                                @else
                                    <span class="text-muted">Belum ada hasil</span>
                                @endif
                            </td>

                            <td>
                                <button
                                    type="button"
                                    class="btn-check-monitoring"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalMonitoring{{ $item->id }}">
                                    <i class="bi bi-clipboard-check"></i>
                                    Periksa
                                </button>
                            </td>
                        </tr>

                        {{-- MODAL PEMERIKSAAN --}}
                        <div class="modal fade"
                             id="modalMonitoring{{ $item->id }}"
                             tabindex="-1"
                             aria-labelledby="judulMonitoring{{ $item->id }}"
                             aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <form action="{{ route('petugas.monitoring.store', $item->id) }}"
                                          method="POST">

                                        @csrf

                                        <div class="modal-header">
                                            <div>
                                                <h5 class="modal-title" id="judulMonitoring{{ $item->id }}">
                                                    <i class="bi bi-clipboard2-check me-2"></i>
                                                    Pemeriksaan Subdomain
                                                </h5>
                                                <small class="text-muted">
                                                    Catat hasil pemeriksaan subdomain
                                                </small>
                                            </div>

                                            <button type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Tutup">
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Perangkat Daerah
                                                </label>
                                                <input type="text"
                                                       class="form-control"
                                                       value="{{ $item->opd->nama_opd ?? '-' }}"
                                                       readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Nama Subdomain
                                                </label>
                                                <input type="text"
                                                       class="form-control"
                                                       value="{{ $item->nama_subdomain }}"
                                                       readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Tanggal Monitoring
                                                </label>
                                                <input type="text"
                                                       class="form-control"
                                                       value="{{ now()->format('d-m-Y') }}"
                                                       readonly>
                                                <div class="form-text">
                                                    Tanggal monitoring diisi otomatis oleh sistem.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Hasil Pemeriksaan
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select name="status_pemeriksaan"
                                                        class="form-select"
                                                        required>
                                                    <option value="">
                                                        Pilih hasil pemeriksaan
                                                    </option>
                                                    <option value="aktif">
                                                        Aktif
                                                    </option>
                                                    <option value="nonaktif">
                                                        Nonaktif
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Catatan Pemeriksaan
                                                </label>
                                                <textarea name="catatan"
                                                          class="form-control"
                                                          rows="3"
                                                          placeholder="Masukkan catatan hasil pemeriksaan..."></textarea>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-light border"
                                                    data-bs-dismiss="modal">
                                                Batal
                                            </button>

                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-save me-1"></i>
                                                Simpan Monitoring
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="mb-2">
                                    <i class="bi bi-globe2 text-muted" style="font-size: 30px;"></i>
                                </div>
                                <div class="fw-semibold text-secondary">
                                    Belum terdapat data subdomain
                                </div>
                                <small class="text-muted">
                                    Data subdomain akan ditampilkan setelah tersedia.
                                </small>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </section>

    {{-- DOWNLOAD REPORT --}}
    <section class="download-section">

        <div class="download-info">
            <div class="download-icon">
                <i class="bi bi-file-earmark-pdf"></i>
            </div>

            <div>
                <h6 class="download-title">
                    Laporan Monitoring Subdomain
                </h6>
                <p class="download-description">
                    Unduh laporan yang memuat jumlah seluruh subdomain,
                    subdomain aktif, dan subdomain nonaktif.
                </p>
            </div>
        </div>

        <a href="{{ route('petugas.monitoring.download') }}"
           class="btn-download">
            <i class="bi bi-download"></i>
            Download Laporan PDF
        </a>

    </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
