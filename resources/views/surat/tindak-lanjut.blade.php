
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Tindak Lanjut</title>

    <style>
        @page {
            size: A4;
            margin: 2cm 2.5cm 2cm 2.5cm;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            color: #000;
            line-height: 1.45;
        }

        .kop {
            text-align: center;
            line-height: 1.25;
        }

        .kop .pemerintah {
            font-size: 14pt;
            font-weight: bold;
        }

        .kop .dinas {
            font-size: 16pt;
            font-weight: bold;
        }

        .kop .alamat {
            font-size: 9pt;
        }

        .garis {
            border-top: 3px solid #000;
            border-bottom: 1px solid #000;
            height: 3px;
            margin-top: 9px;
            margin-bottom: 20px;
        }

        .tanggal {
            text-align: right;
            margin-bottom: 20px;
        }

        table.identitas {
            border-collapse: collapse;
            margin-bottom: 18px;
        }

        table.identitas td {
            padding: 2px 5px 2px 0;
            vertical-align: top;
        }

        .tujuan {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .isi {
            text-align: justify;
            text-indent: 35px;
            margin-bottom: 12px;
        }

        table.subdomain {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }

        table.subdomain th,
        table.subdomain td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        table.subdomain th {
            text-align: center;
        }

        .penutup {
            text-align: justify;
            text-indent: 35px;
            margin-top: 15px;
        }

        .ttd {
            width: 45%;
            margin-left: auto;
            margin-top: 35px;
            text-align: left;
        }

        .nama-pejabat {
            margin-top: 65px;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    {{-- KOP SURAT --}}
    <div class="kop">
        <div class="pemerintah">
            PEMERINTAH KABUPATEN INDRAGIRI HULU
        </div>

        <div class="dinas">
            DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK
        </div>

        <div class="alamat">
            Jalan Indragiri Pematang Reba, Rengat Barat 29351
            <br>
            Laman: diskominfotik.inhukab.go.id
            <br>
            Pos-el: diskominfotik@inhukab.go.id
        </div>
    </div>

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

    {{-- ISI SURAT --}}
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
                    <th width="35%">Nama Sub-Domain</th>
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

        <p style="margin-left: 35px; text-align: justify;">
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
        <div>
            KEPALA DINAS KOMUNIKASI, INFORMATIKA
            <br>
            DAN STATISTIK
        </div>

        <div class="nama-pejabat">
            H. Ergusfian, S.Sos
        </div>

        <div>
            NIP. 19710830 200112 1 002
        </div>
    </div>

</body>
</html>
