
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Monitoring | Diskominfotik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <style>
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
            color: #7b8794;
            font-size: 14px;
            margin-bottom: 28px;
        }

        .summary-card,
        .table-card {
            background: white;
            border: 1px solid #edf0f5;
            border-radius: 12px;
            padding: 23px;
            box-shadow: 0 3px 12px rgba(0,0,0,.03);
        }

        .summary-label {
            color: #7b8794;
            font-size: 13px;
            margin-bottom: 9px;
        }

        .summary-number {
            font-size: 29px;
            font-weight: 700;
            margin: 0;
        }

        .summary-icon {
            font-size: 22px;
            color: #2854a2;
            margin-bottom: 13px;
        }

        .table-card {
            margin-top: 25px;
        }

        .section-title {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .section-description {
            color: #7b8794;
            font-size: 13px;
            margin-bottom: 22px;
        }

        .table thead th {
            background: #f7f9fc;
            color: #647184;
            font-size: 12px;
            padding: 14px;
        }

        .table tbody td {
            padding: 15px 14px;
            font-size: 13px;
            vertical-align: middle;
        }

        .btn-download {
            background: #2854a2;
            color: white;
            border: none;
            border-radius: 7px;
            padding: 8px 12px;
            font-size: 12px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-download:hover {
            background: #1d417f;
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 45px 15px;
            color: #8792a2;
        }

        .empty-state i {
            font-size: 38px;
            display: block;
            margin-bottom: 12px;
        }

        @media(max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', ['role' => 'petugas'])

    <main class="main-content">

        <h1 class="page-title">Laporan Monitoring</h1>

        <p class="page-description">
            Riwayat dokumen laporan monitoring subdomain Perangkat Daerah.
        </p>

        {{-- RINGKASAN --}}
        <div class="row g-3">

            <div class="col-md-6">
                <div class="summary-card">
                    <div class="summary-icon">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </div>

                    <p class="summary-label">Total Laporan Diterbitkan</p>

                    <h2 class="summary-number">
                        {{ $laporans->count() }}
                    </h2>
                </div>
            </div>

            <div class="col-md-6">
                <div class="summary-card">
                    <div class="summary-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>

                    <p class="summary-label">Laporan Terakhir</p>

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

        {{-- TABEL RIWAYAT --}}
        <div class="table-card">

            <h5 class="section-title">Riwayat Dokumen Laporan</h5>

            <p class="section-description">
                Daftar laporan PDF yang pernah dibuat oleh petugas.
            </p>

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Laporan</th>
                            <th>Tanggal Dibuat</th>
                            <th>Total Subdomain</th>
                            <th>Aktif</th>
                            <th>Nonaktif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($laporans as $index => $laporan)

                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>
                                    <i class="bi bi-file-earmark-pdf text-danger me-1"></i>
                                    {{ $laporan->nama_laporan }}
                                </td>

                                <td>
                                    {{ $laporan->created_at->format('d/m/Y H:i') }}
                                </td>

                                <td>{{ $laporan->total_subdomain }}</td>

                                <td>{{ $laporan->subdomain_aktif }}</td>

                                <td>{{ $laporan->subdomain_nonaktif }}</td>

                                <td>
                                    <a href="{{ route('petugas.laporan.download', $laporan->id) }}"
                                       class="btn-download">
                                        <i class="bi bi-download me-1"></i>
                                        PDF
                                    </a>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <i class="bi bi-folder2-open"></i>

                                        <strong>Belum Ada Laporan</strong>

                                        <p class="mb-0 mt-2">
                                            Laporan yang diunduh melalui menu
                                            Monitoring akan muncul di sini.
                                        </p>
                                    </div>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</body>
</html>
