
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Tindak Lanjut</title>

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
            font-size: 12pt;
            color: #000;
            line-height: 1.25;
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
            width: 17%;
            text-align: left;
        }

        .logo {
            width: 85px;
            height: 95px;
            object-fit: contain;
        }

        .kop {
            width: 83%;
            text-align: center;
            padding-left: 5px !important;
        }

        .pemerintah {
            font-size: 14pt;
            font-weight: bold;
            margin: 0 0 3px;
        }

        .dinas {
            font-size: 16pt;
            font-weight: bold;
            margin: 0 0 3px;
        }

        .alamat {
            font-size: 9pt;
            line-height: 1.2;
            margin: 0;
        }

        .garis {
            border-top: 3px solid #000;
            border-bottom: 1px solid #000;
            height: 5px;
            margin-top: 5px;
            margin-bottom: 13px;
        }

        /* =========================
           TANGGAL DAN IDENTITAS
        ========================= */

        .tanggal {
            text-align: right;
            margin-bottom: 12px;
        }

        table.identitas {
            border-collapse: collapse;
            margin-bottom: 12px;
            width: 100%;
        }

        table.identitas td {
            padding: 1px 4px 1px 0;
            vertical-align: top;
        }

        .tujuan {
            margin-top: 12px;
            margin-bottom: 13px;
            line-height: 1.25;
        }

        /* =========================
           ISI SURAT
        ========================= */

        .isi {
            text-align: justify;
            text-indent: 35px;
            margin: 0 0 9px;
            line-height: 1.3;
        }

        .alasan {
            margin: 0 0 9px 35px;
            text-align: justify;
            line-height: 1.3;
        }

        table.subdomain {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0 12px;
            font-size: 11pt;
        }

        table.subdomain th,
        table.subdomain td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        table.subdomain th {
            text-align: center;
        }

        .penutup {
            text-align: justify;
            text-indent: 35px;
            margin: 10px 0 0;
            line-height: 1.3;
        }

        /* =========================
           TANDA TANGAN
        ========================= */

        .ttd {
            width: 45%;
            margin-left: 55%;
            margin-top: 20px;
            text-align: center;
            line-height: 1.3;
        }

        .jabatan {
            margin: 0;
        }

        .nama-pejabat {
            margin-top: 48px;
            margin-bottom: 0;
            font-weight: bold;
            text-decoration: underline;
        }

        .nip {
            margin-top: 0;
        }

        /* =========================
           PENGATURAN HALAMAN
        ========================= */

        p {
            orphans: 2;
            widows: 2;
        }

        table, tr {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>

    {{-- KOP SURAT --}}
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

    <div class="garis"></div>

    {{-- TANGGAL SURAT --}}
    <div class="tanggal">
        Rengat, {{ $tanggalSurat->translatedFormat('d F Y') }}
    </div>

    {{-- IDENTITAS SURAT --}}
    <table class="identitas">
        <tr>
            <td width="85">Nomor</td>
            <td width="10">:</td>
            <td>{{ $nomorSurat }}</td>
        </tr>

        <tr>
            <td>Sifat</td>
            <td>:</td>
            <td>Penting</td>
        </tr>

        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td>-</td>
        </tr>

        <tr>
            <td>Hal</td>
            <td>:</td>
            <td>
                Tindak Lanjut Permohonan
                {{ $permohonan->jenis_permohonan === 'perubahan'
                    ? 'Perubahan Nama'
                    : 'Pendaftaran' }}
                Sub-Domain {{ $permohonan->opd->nama_opd ?? '-' }}
            </td>
        </tr>
    </table>

    {{-- TUJUAN SURAT --}}
    <div class="tujuan">
        Yth. Kepala {{ $permohonan->opd->nama_opd ?? '-' }}
        <br>
        di -
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat
    </div>

    {{-- ISI SURAT PERSETUJUAN --}}
    @if ($jenisSurat === 'persetujuan')

        <p class="isi">
            Menindaklanjuti surat permohonan
            {{ $permohonan->opd->nama_opd ?? '-' }}
            Nomor {{ $permohonan->nomor_surat_opd ?? '-' }}
            tanggal
            {{ $permohonan->tanggal_surat_opd
                ? $permohonan->tanggal_surat_opd->translatedFormat('d F Y')
                : '-' }}
            perihal permohonan
            {{ $permohonan->jenis_permohonan === 'perubahan'
                ? 'perubahan nama'
                : 'pendaftaran' }}
            sub-domain, bersama ini disampaikan bahwa permohonan
            tersebut telah disetujui berdasarkan hasil pemeriksaan
            terhadap data dan dokumen persyaratan.
        </p>

        <p class="isi">
            Adapun data sub-domain yang menjadi tindak lanjut
            permohonan tersebut adalah sebagai berikut:
        </p>

        <table class="subdomain">
            <thead>
                <tr>
                    <th width="45%">Nama Sub-Domain</th>
                    <th>IP Address / Server</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        {{ $permohonan->nama_subdomain }}.inhukab.go.id
                    </td>
                    <td>
                        {{ $permohonan->subdomain->ip_address ?? '-' }}
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="penutup">
            Selanjutnya, data sub-domain tersebut telah dicatat
            dalam sistem pengelolaan sub-domain Dinas Komunikasi,
            Informatika dan Statistik Kabupaten Indragiri Hulu.
            Untuk penggunaan sub-domain, pelaksanaan konfigurasi
            dan aksesibilitas dapat ditindaklanjuti sesuai dengan
            pengaturan teknis yang berlaku.
        </p>

    @else

        {{-- ISI SURAT PENOLAKAN --}}
        <p class="isi">
            Menindaklanjuti surat permohonan
            {{ $permohonan->opd->nama_opd ?? '-' }}
            Nomor {{ $permohonan->nomor_surat_opd ?? '-' }}
            tanggal
            {{ $permohonan->tanggal_surat_opd
                ? $permohonan->tanggal_surat_opd->translatedFormat('d F Y')
                : '-' }}
            perihal permohonan
            {{ $permohonan->jenis_permohonan === 'perubahan'
                ? 'perubahan nama'
                : 'pendaftaran' }}
            sub-domain, bersama ini disampaikan bahwa berdasarkan
            hasil pemeriksaan, permohonan tersebut belum dapat
            disetujui.
        </p>

        <p class="isi">
            Adapun alasan permohonan belum dapat disetujui adalah
            sebagai berikut:
        </p>

        <p class="alasan">
            {{ $permohonan->catatan ?? '-' }}
        </p>

        <p class="penutup">
            Demikian disampaikan untuk menjadi perhatian dan
            ditindaklanjuti sebagaimana mestinya. Atas perhatian
            dan kerja sama Saudara, diucapkan terima kasih.
        </p>

    @endif

    {{-- TANDA TANGAN --}}
    <div class="ttd">
        <p class="jabatan">
            KEPALA DINAS KOMUNIKASI, INFORMATIKA
            <br>
            DAN STATISTIK
        </p>

        <p class="nama-pejabat">
            H. Ergusfian, S.Sos
        </p>

        <p class="nip">
            NIP. 19710830 200112 1 002
        </p>
    </div>

</body>
</html>
