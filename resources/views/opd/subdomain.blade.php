
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
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            background: #f3f5f9;
            color: #10264a;
        }

        button {
            font-family: inherit;
        }

        .main-content {
            margin-left: 240px;
            width: calc(100% - 240px);
            min-height: 100vh;
            padding: 30px 35px 40px;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 21px;
            line-height: 1.3;
            margin-bottom: 6px;
            color: #10264a;
        }

        .page-header p {
            max-width: 700px;
            font-size: 11px;
            line-height: 1.7;
            color: #64748b;
        }

        .content-card {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #dfe6f0;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(16, 38, 74, .04);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .card-header h2 {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .card-header p {
            font-size: 11px;
            color: #64748b;
            line-height: 1.6;
        }

        .total-badge {
            flex-shrink: 0;
            background: #edf3ff;
            color: #2854a2;
            padding: 9px 12px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: bold;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 720px;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background: #edf1f8;
        }

        th {
            padding: 13px 12px;
            color: #304461;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        th:first-child {
            border-radius: 6px 0 0 6px;
        }

        th:last-child {
            border-radius: 0 6px 6px 0;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #edf0f5;
            font-size: 11px;
            vertical-align: middle;
            line-height: 1.6;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .domain-name {
            font-weight: bold;
            color: #10264a;
            overflow-wrap: anywhere;
        }

        .domain-note {
            display: block;
            color: #64748b;
            font-size: 10px;
            margin-top: 4px;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            white-space: nowrap;
        }

        .status::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .status-active {
            color: #087d50;
            background: #d8f5e7;
        }

        .status-inactive {
            color: #64748b;
            background: #e9edf3;
        }

        .status-review {
            color: #9a6500;
            background: #fff0c9;
        }

        .description {
            color: #475569;
            max-width: 240px;
            line-height: 1.7;
        }

        .history-button {
            padding: 8px 11px;
            background: #fff;
            color: #2854a2;
            border: 1px solid #2854a2;
            border-radius: 6px;
            font-size: 10px;
            cursor: pointer;
            white-space: nowrap;
            transition: background .2s;
        }

        .history-button:hover,
        .history-close:hover {
            background: #edf3ff;
        }

        .history-button:focus-visible,
        .history-close:focus-visible {
            outline: 2px solid #2854a2;
            outline-offset: 2px;
        }

        .empty-state {
            padding: 35px 15px;
            text-align: center;
            color: #64748b;
            line-height: 1.7;
        }

        .table-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            border-top: 1px solid #edf0f5;
            padding-top: 15px;
            margin-top: 5px;
            color: #64748b;
            font-size: 10px;
        }

        .history-panel {
            display: none;
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #dfe6f0;
            border-radius: 9px;
            background: #f9fbff;
        }

        .history-panel:focus {
            outline: none;
        }

        .history-panel h3 {
            font-size: 13px;
            margin-bottom: 5px;
        }

        .history-domain {
            color: #2854a2;
            font-size: 11px;
            margin-bottom: 18px;
            overflow-wrap: anywhere;
        }

        .history-item {
            position: relative;
            padding: 0 0 18px 18px;
            margin-left: 4px;
            border-left: 2px solid #d6e3f7;
        }

        .history-item:last-child {
            border-left-color: transparent;
            padding-bottom: 0;
        }

        .history-item::before {
            content: "";
            position: absolute;
            top: 2px;
            left: -6px;
            width: 10px;
            height: 10px;
            background: #2854a2;
            border-radius: 50%;
        }

        .history-item strong {
            display: block;
            font-size: 11px;
            margin-bottom: 5px;
            line-height: 1.5;
        }

        .history-item p {
            font-size: 10px;
            line-height: 1.7;
            color: #64748b;
        }

        .history-close {
            margin-top: 18px;
            padding: 8px 12px;
            background: #fff;
            color: #2854a2;
            border: 1px solid #cbd5e5;
            border-radius: 6px;
            font-size: 10px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 210px;
                width: calc(100% - 210px);
                padding: 22px 16px 30px;
            }

            .content-card {
                padding: 20px 16px;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 18px 12px 25px;
            }

            .page-header {
                margin-bottom: 18px;
            }

            .page-header h1 {
                font-size: 19px;
            }

            .content-card {
                padding: 16px 12px;
            }

            .card-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .table-footer {
                align-items: flex-start;
                flex-direction: column;
            }

            .history-panel {
                padding: 15px 12px;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', ['role' => 'opd'])

    <main class="main-content">

        <header class="page-header">
            <h1>Subdomain Saya</h1>
            <p>
                Lihat daftar subdomain yang dimiliki oleh Perangkat Daerah,
                status penggunaannya, keterangan, dan riwayat setiap subdomain.
            </p>
        </header>

        <section class="content-card">

            <div class="card-header">
                <div>
                    <h2>Daftar Subdomain</h2>
                    <p>Informasi subdomain yang terdaftar pada OPD kamu.</p>
                </div>

                <span class="total-badge">
                    {{ $totalSubdomain }} Subdomain
                </span>
            </div>

            <div class="table-wrapper">

                <table>
                    <thead>
                        <tr>
                            <th>Nama Subdomain</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Riwayat</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($subdomains as $subdomain)

                            <tr>
                                <td>
                                    <span class="domain-name">
                                        {{ $subdomain->nama_subdomain }}
                                    </span>

                                    <span class="domain-note">
                                        Terdaftar pada OPD
                                    </span>
                                </td>

                                <td>
                                    @if ($subdomain->status === 'aktif')
                                        <span class="status status-active">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="status status-inactive">
                                            Nonaktif
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="description">
                                        {{ $subdomain->keterangan ?: 'Tidak ada keterangan.' }}
                                    </div>
                                </td>

                                <td>
                                    <button
                                        type="button"
                                        class="history-button"
                                        data-history="history-{{ $subdomain->id }}"
                                        aria-controls="history-{{ $subdomain->id }}"
                                    >
                                        Lihat Riwayat
                                    </button>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="empty-state">
                                    Belum ada data subdomain untuk ditampilkan.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>

            </div>

            {{-- PANEL RIWAYAT --}}
            @foreach ($subdomains as $subdomain)

                <section
                    class="history-panel"
                    id="history-{{ $subdomain->id }}"
                    aria-live="polite"
                    tabindex="-1"
                >

                    <h3>Riwayat Subdomain</h3>

                    <p class="history-domain">
                        {{ $subdomain->nama_subdomain }}
                    </p>

                    {{-- Riwayat pendaftaran --}}
                    <div class="history-item">
                        <strong>Subdomain didaftarkan</strong>

                        <p>
                            {{ $subdomain->created_at
                                ? $subdomain->created_at->format('d M Y')
                                : '-' }}
                            — Data subdomain tercatat dalam sistem.
                        </p>
                    </div>

                    {{-- Riwayat monitoring --}}
                    @forelse ($subdomain->monitorings as $monitoring)

                        <div class="history-item">

                            <strong>
                                Pemeriksaan:
                                {{ $monitoring->status_pemeriksaan === 'aktif'
                                    ? 'Aktif'
                                    : 'Nonaktif' }}
                            </strong>

                            <p>
                                {{ $monitoring->tanggal_monitoring
                                    ? \Carbon\Carbon::parse($monitoring->tanggal_monitoring)->format('d M Y')
                                    : '-' }}

                                @if ($monitoring->catatan)
                                    — {{ $monitoring->catatan }}
                                @else
                                    — Hasil pemeriksaan telah dicatat oleh petugas.
                                @endif
                            </p>

                        </div>

                    @empty

                        <div class="history-item">
                            <strong>Belum ada riwayat monitoring</strong>
                            <p>
                                Belum terdapat hasil pemeriksaan untuk subdomain ini.
                            </p>
                        </div>

                    @endforelse

                    {{-- Riwayat perubahan status subdomain --}}
                    @if ($subdomain->status === 'nonaktif')
                        <div class="history-item">
                            <strong>Subdomain berstatus nonaktif</strong>
                            <p>
                                {{ $subdomain->tanggal_nonaktif
                                    ? \Carbon\Carbon::parse($subdomain->tanggal_nonaktif)->format('d M Y')
                                    : '-' }}
                                — Status subdomain saat ini nonaktif.
                            </p>
                        </div>
                    @endif

                    <button
                        type="button"
                        class="history-close"
                        data-close-history
                    >
                        Tutup Riwayat
                    </button>

                </section>

            @endforeach

            <div class="table-footer">
                <span>
                    Total: {{ $totalSubdomain }} subdomain
                </span>

                <span>
                    Aktif: {{ $totalAktif }} |
                    Nonaktif: {{ $totalNonaktif }}
                </span>
            </div>

        </section>

    </main>

    <script>
        const historyButtons = document.querySelectorAll('[data-history]');
        const historyPanels = document.querySelectorAll('.history-panel');

        historyButtons.forEach(button => {
            button.addEventListener('click', function () {
                const targetId = this.dataset.history;
                const targetPanel = document.getElementById(targetId);

                historyPanels.forEach(panel => {
                    panel.style.display = 'none';
                });

                if (targetPanel) {
                    targetPanel.style.display = 'block';

                    targetPanel.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });

                    targetPanel.focus();
                }
            });
        });

        document.querySelectorAll('[data-close-history]').forEach(button => {
            button.addEventListener('click', function () {
                const panel = this.closest('.history-panel');

                if (panel) {
                    panel.style.display = 'none';
                }
            });
        });
    </script>

</body>
</html>
