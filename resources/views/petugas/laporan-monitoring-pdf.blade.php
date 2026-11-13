
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Monitoring Subdomain</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 1.5cm 2cm 1.5cm 2cm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 11pt;
            color: #000;
            line-height: 1.3;
            margin: 0;
        }

        /* =========================
           KOP SURAT
        ========================= */

        .kop-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }

        .kop-table td {
            padding: 0;
            vertical-align: middle;
        }

        .logo-cell {
            width: 22%;
            text-align: center;
        }

        .logo {
            width: 105px;
            height: 125px;
            object-fit: contain;
        }

        .kop {
            width: 78%;
            text-align: center;
            line-height: 1.2;
        }

        .pemerintah {
            font-size: 16pt;
            font-weight: bold;
            margin: 0 0 5px;
        }

        .dinas {
            font-size: 17pt;
            font-weight: bold;
            margin: 0 0 5px;
        }

        .alamat {
            font-size: 11pt;
            line-height: 1.2;
            margin: 0;
        }

        .garis-kop {
            border-top: 5px solid #000;
            border-bottom: 1px solid #000;
            height: 7px;
            margin-top: 10px;
            margin-bottom: 18px;
        }

        /* =========================
           JUDUL LAPORAN
        ========================= */

        .judul {
            text-align: center;
            margin: 0 0 5px;
        }

        .judul h2 {
            font-size: 14pt;
            font-weight: bold;
            text-decoration: underline;
            margin: 0 0 5px;
        }

        .judul p {
            margin: 0;
            font-size: 11pt;
        }

        .tanggal {
            text-align: right;
            margin: 18px 0 12px;
        }

        /* =========================
           RINGKASAN
        ========================= */

        .ringkasan {
            width: 100%;
            border-collapse: collapse;
            margin: 12px 0 18px;
        }

        .ringkasan td {
            width: 33.33%;
            border: 1px solid #000;
            padding: 8px 5px;
            text-align: center;
            vertical-align: middle;
        }

        .ringkasan .label {
            font-size: 10pt;
            margin-bottom: 4px;
        }

        .ringkasan .angka {
            font-size: 15pt;
            font-weight: bold;
        }

        /* =========================
           TABEL DATA
        ========================= */

        .subdomain {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 10pt;
        }

        .subdomain th,
        .subdomain td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: middle;
        }

        .subdomain th {
            text-align: center;
            font-weight: bold;
            background-color: #eaeaea;
        }

        .subdomain td {
            text-align: left;
        }

        .subdomain td.center {
            text-align: center;
        }

        .subdomain tr {
            page-break-inside: avoid;
        }

        /* =========================
           STATUS
        ========================= */

        .status-aktif {
            font-weight: bold;
        }

        .status-nonaktif {
            font-weight: bold;
        }

        /* =========================
           TANDA TANGAN
        ========================= */

        .ttd {
            width: 45%;
            margin-left: 55%;
            margin-top: 30px;
            text-align: center;
            line-height: 1.3;
        }

        .ttd .jabatan {
            margin: 0;
        }

        .ttd .nama {
            margin-top: 55px;
            margin-bottom: 0;
            font-weight: bold;
            text-decoration: underline;
        }

        .ttd .nip {
            margin-top: 0;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            margin-top: 15px;
            font-size: 9pt;
            text-align: center;
            font-style: italic;
        }

        table {
            page-break-inside: auto;
        }

        thead {
            display: table-header-group;
        }

        tfoot {
            display: table-footer-group;
        }

        tr {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>

    {{-- =========================
         KOP SURAT
    ========================== --}}

    <table class="kop-table">
        <tr>
            <td class="logo-cell">
                <img
                    src="{{ public_path('images/logo-inhu.png') }}"
                    class="logo"
                    alt="Logo Kabupaten Indragiri Hulu">
            </td>

            <td class="kop">
                <p class="pemerintah">
                    PEMERINTAH KABUPATEN INDRAGIRI HULU
                </p>

                <p class="dinas">
                    DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK
                </p>

                <p class="alamat">
                    Jalan Indragiri Pematang Reba, Rengat Barat 29351
                    <br>
                    Laman: diskominfotik.inhukab.go.id
                    <br>
                    Pos-el: diskominfotik@inhukab.go.id
                </p>
            </td>
        </tr>
    </table>

    <div class="garis-kop"></div>

    {{-- =========================
         JUDUL LAPORAN
    ========================== --}}

    <div class="judul">
        <h2>LAPORAN MONITORING SUBDOMAIN</h2>
        <p>DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK</p>
        <p>KABUPATEN INDRAGIRI HULU</p>
    </div>

    <div class="tanggal">
        Rengat, {{ $tanggal }}
    </div>

    {{-- =========================
         RINGKASAN DATA
    ========================== --}}

    <table class="ringkasan">
        <tr>
            <td>
                <div class="label">Total Subdomain</div>
                <div class="angka">{{ $total }}</div>
            </td>

            <td>
                <div class="label">Subdomain Aktif</div>
                <div class="angka">{{ $aktif }}</div>
            </td>

            <td>
                <div class="label">Subdomain Nonaktif</div>
                <div class="angka">{{ $nonaktif }}</div>
            </td>
        </tr>
    </table>

    {{-- =========================
         TABEL MONITORING
    ========================== --}}

    <table class="subdomain">
        <thead>
            <tr>
                <th width="5%">No.</th>
                <th width="22%">Perangkat Daerah</th>
                <th width="25%">Nama Subdomain</th>
                <th width="13%">Status</th>
                <th width="15%">Hasil Monitoring</th>
                <th width="20%">Tanggal Monitoring</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($subdomains as $index => $item)
                <tr>
                    <td class="center">{{ $index + 1 }}</td>

                    <td>
                        {{ $item['opd'] ?? '-' }}
                    </td>

                    <td>
                        {{ $item['domain'] ?? '-' }}
                    </td>

                    <td class="center">
                        {{ $item['status'] ?? '-' }}
                    </td>

                    <td class="center">
                        {{ $item['hasil_monitoring'] ?? '-' }}
                    </td>

                    <td class="center">
                        {{ $item['tanggal_monitoring'] ?? '-' }}
                    </td>
                </tr>

                @if (!empty($item['catatan']))
                    <tr>
                        <td colspan="6">
                            <strong>Catatan:</strong>
                            {{ $item['catatan'] }}
                        </td>
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="6" class="center">
                        Belum terdapat data monitoring subdomain.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- =========================
         TANDA TANGAN
    ========================== --}}

    <div class="ttd">
        <p class="jabatan">
            KEPALA DINAS KOMUNIKASI, INFORMATIKA
            <br>
            DAN STATISTIK
        </p>

        <p class="nama">
            H. Ergusfian, S.Sos
        </p>

        <p class="nip">
            NIP. 19710830 200112 1 002
        </p>
    </div>
</body>
</html>
