
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            color: #222;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #222;
            padding-bottom: 12px;
            margin-bottom: 22px;
        }

        .header h2 {
            font-size: 15px;
            margin: 0 0 5px;
        }

        .header p {
            font-size: 10px;
            margin: 3px 0;
        }

        .report-title {
            text-align: center;
            margin: 22px 0;
        }

        .report-title h3 {
            font-size: 14px;
            text-decoration: underline;
        }

        .summary {
            width: 100%;
            border-collapse: collapse;
            margin: 18px 0 25px;
        }

        .summary td {
            border: 1px solid #777;
            padding: 13px;
            text-align: center;
            width: 33.33%;
        }

        .number {
            font-size: 21px;
            font-weight: bold;
            margin-top: 8px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
        }

        table.data th,
        table.data td {
            border: 1px solid #777;
            padding: 7px;
            vertical-align: middle;
        }

        table.data th {
            background: #e9edf3;
            text-align: center;
        }

        .center {
            text-align: center;
        }

        .note {
            font-size: 9px;
            margin-top: 20px;
        }

        .signature {
            width: 40%;
            margin-left: 60%;
            margin-top: 40px;
            text-align: center;
            line-height: 1.6;
        }

        .signature-space {
            height: 65px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>PEMERINTAH KABUPATEN INDRAGIRI HULU</h2>
        <h2>DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK</h2>
        <p>Laporan Data Subdomain Perangkat Daerah</p>
    </div>

    <div class="report-title">
        <h3>LAPORAN MONITORING SUBDOMAIN</h3>
        <p>
            Tanggal laporan:
            {{ $tanggal->translatedFormat('d F Y') }}
        </p>
    </div>

    <p>
        Laporan ini memuat rekapitulasi data subdomain Perangkat Daerah
        berdasarkan status dan hasil pemeriksaan yang tercatat dalam sistem.
    </p>

    <table class="summary">
        <tr>
            <td>
                <strong>Total Seluruh Subdomain</strong>
                <div class="number">{{ $total }}</div>
            </td>

            <td>
                <strong>Subdomain Aktif</strong>
                <div class="number">{{ $aktif }}</div>
            </td>

            <td>
                <strong>Subdomain Nonaktif</strong>
                <div class="number">{{ $nonaktif }}</div>
            </td>
        </tr>
    </table>

    <p class="section-title">Rincian Data Subdomain dan Hasil Monitoring</p>

    <table class="data">
        <thead>
            <tr>
                <th width="5%">No.</th>
                <th width="19%">Perangkat Daerah</th>
                <th width="22%">Nama Subdomain</th>
                <th width="13%">Status Subdomain</th>
                <th width="14%">Hasil Pemeriksaan</th>
                <th width="12%">Tanggal Pemeriksaan</th>
                <th width="15%">Catatan</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($subdomains as $index => $item)
                <tr>
                    <td class="center">{{ $index + 1 }}</td>
                    <td>{{ $item['opd'] }}</td>
                    <td>{{ $item['domain'] }}</td>
                    <td class="center">{{ $item['status'] }}</td>
                    <td class="center">{{ $item['hasil_monitoring'] }}</td>
                    <td class="center">{{ $item['tanggal_monitoring'] }}</td>
                    <td>{{ $item['catatan'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="center">
                        Belum terdapat data subdomain.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p class="note">
        Catatan: Laporan dibuat berdasarkan data subdomain dan hasil
        pemeriksaan terakhir yang tercatat dalam sistem pada saat laporan diterbitkan.
    </p>

    <div class="signature">
        Mengetahui,<br>
        Petugas Diskominfotik

        <div class="signature-space"></div>

        (........................................)
    </div>

</body>
</html>
