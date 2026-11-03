
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Subdomain | Diskominfotik</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Sidebar CSS -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f7fb;
            font-family: Arial, sans-serif;
            color: #263445;
        }

        .main-content {
            margin-left: 255px;
            padding: 32px;
        }

        .page-title {
            font-size: 25px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .page-description {
            font-size: 14px;
            color: #7b8794;
            margin-bottom: 28px;
        }

        .summary-card {
            background: #fff;
            border: 1px solid #edf0f5;
            border-radius: 12px;
            padding: 23px;
            height: 100%;
            box-shadow: 0 3px 12px rgba(0,0,0,.03);
        }

        .summary-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 17px;
        }

        .icon-total {
            background: #e9efff;
            color: #3156a5;
        }

        .icon-active {
            background: #e5f7ed;
            color: #198754;
        }

        .icon-inactive {
            background: #fff0e8;
            color: #dc6b32;
        }

        .summary-label {
            color: #7b8794;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .summary-number {
            font-size: 30px;
            font-weight: 700;
            margin: 0;
        }

        .content-card {
            background: #fff;
            border: 1px solid #edf0f5;
            border-radius: 12px;
            padding: 24px;
            margin-top: 25px;
            box-shadow: 0 3px 12px rgba(0,0,0,.03);
        }

        .content-heading {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .content-subtitle {
            font-size: 13px;
            color: #7b8794;
            margin-bottom: 22px;
        }

        .table thead th {
            background: #f7f9fc;
            color: #647184;
            font-size: 12px;
            font-weight: 600;
            padding: 14px;
            border-bottom: 1px solid #e9edf3;
        }

        .table tbody td {
            padding: 15px 14px;
            vertical-align: middle;
            font-size: 13px;
        }

        .status-active,
        .status-inactive {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-active {
            background: #e5f7ed;
            color: #198754;
        }

        .status-inactive {
            background: #fff0e8;
            color: #dc6b32;
        }

        .download-section {
            background: #f7f9ff;
            border: 1px solid #e5eaf5;
            border-radius: 12px;
            padding: 23px;
            margin-top: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .download-title {
            font-weight: 700;
            font-size: 15px;
            margin-bottom: 7px;
        }

        .download-description {
            font-size: 13px;
            color: #7b8794;
            margin: 0;
        }

        .btn-download {
            background: #2455a4;
            color: white;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            border: none;
        }

        .btn-download:hover {
            background: #194381;
            color: white;
        }

        @media(max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .download-section {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', ['role' => 'petugas'])

    <main class="main-content">

        <h1 class="page-title">Monitoring Subdomain</h1>

        <p class="page-description">
            Informasi jumlah dan status seluruh subdomain Perangkat Daerah.
        </p>

        {{-- RINGKASAN DATA --}}
        <div class="row g-3">

            <div class="col-md-4">
                <div class="summary-card">
                    <div class="summary-icon icon-total">
                        <i class="bi bi-globe2"></i>
                    </div>
                    <p class="summary-label">Total Seluruh Subdomain</p>
                    <h2 class="summary-number">{{ $total }}</h2>
                </div>
            </div>

            <div class="col-md-4">
                <div class="summary-card">
                    <div class="summary-icon icon-active">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <p class="summary-label">Subdomain Aktif</p>
                    <h2 class="summary-number">{{ $aktif }}</h2>
                </div>
            </div>

            <div class="col-md-4">
                <div class="summary-card">
                    <div class="summary-icon icon-inactive">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <p class="summary-label">Subdomain Nonaktif</p>
                    <h2 class="summary-number">{{ $nonaktif }}</h2>
                </div>
            </div>

        </div>

        {{-- DAFTAR SUBDOMAIN --}}

        <div class="content-card">

            <h5 class="content-heading">Daftar Status Subdomain</h5>

            <p class="content-subtitle">
                Daftar subdomain dan hasil pemeriksaan terakhir.
            </p>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
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

                                <td>{{ $item->opd->nama_opd ?? '-' }}</td>

                                <td>{{ $item->nama_subdomain }}</td>

                                <td>
                                    @if($item->status === 'aktif')
                                        <span class="status-active">Aktif</span>
                                    @else
                                        <span class="status-inactive">Nonaktif</span>
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
                                        {{ ucfirst($item->monitoringTerakhir->status_pemeriksaan) }}
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>

                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-primary"
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
                                tabindex="-1">

                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <form action="{{ route('petugas.monitoring.store', $item->id) }}"
                                            method="POST">

                                            @csrf

                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Pemeriksaan Subdomain
                                                </h5>

                                                <button type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal">
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

                                                    <small class="text-muted">
                                                        Tanggal diisi otomatis oleh sistem.
                                                    </small>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        Hasil Pemeriksaan
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
                                                        Catatan
                                                    </label>

                                                    <textarea name="catatan"
                                                            class="form-control"
                                                            rows="3"
                                                            placeholder="Masukkan catatan pemeriksaan..."></textarea>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                    Batal
                                                </button>

                                                <button type="submit"
                                                        class="btn btn-primary">
                                                    Simpan Monitoring
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="7"
                                    class="text-center text-muted py-4">
                                    Belum terdapat data subdomain.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- DOWNLOAD PDF --}}
        <div class="download-section">

            <div>
                <h6 class="download-title">
                    <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                    Laporan Monitoring Subdomain
                </h6>

                <p class="download-description">
                    Unduh dokumen laporan jumlah seluruh subdomain,
                    subdomain aktif, dan subdomain nonaktif.
                </p>
            </div>

            <a href="{{ route('petugas.monitoring.download') }}"
               class="btn-download">
                <i class="bi bi-download me-2"></i>
                Download Laporan PDF
            </a>

        </div>

    </main>
     <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
