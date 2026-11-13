
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Permohonan | Diskominfotik</title>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f3f6fb;
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
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 22px;
        }

        .header-text {
            min-width: 0;
        }

        .page-eyebrow {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #1769a6;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .page-header h1 {
            color: #123b65;
            font-size: 27px;
            font-weight: 750;
            margin-bottom: 6px;
        }

        .page-header p {
            color: #718096;
            font-size: 13px;
            line-height: 1.7;
        }

        .header-icon {
            width: 54px;
            height: 54px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            background: #e5f1fc;
            color: #1769a6;
            border-radius: 15px;
            font-size: 25px;
        }

        /* BREADCRUMB */
        .breadcrumb {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
            color: #8997a9;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .breadcrumb a {
            color: #1769a6;
            text-decoration: none;
            font-weight: 600;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* ALERT */
        .alert {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 13px 15px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 12px;
            line-height: 1.7;
        }

        .alert > i {
            font-size: 16px;
            margin-top: 1px;
        }

        .alert-success {
            background: #e9f8ef;
            color: #168451;
            border: 1px solid #ccebd8;
        }

        .alert-danger {
            background: #fff0f0;
            color: #bd3b3b;
            border: 1px solid #f4d1d1;
        }

        .alert ul {
            margin: 6px 0 0 17px;
        }

        /* CONTENT CARD */
        .content-card {
            background: #fff;
            border: 1px solid #e2eaf2;
            border-radius: 12px;
            padding: 23px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(18, 59, 101, .035);
        }

        .card-heading {
            display: flex;
            align-items: center;
            gap: 11px;
            padding-bottom: 16px;
            margin-bottom: 21px;
            border-bottom: 1px solid #edf1f6;
        }

        .card-heading-icon {
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 9px;
            background: #eaf4fd;
            color: #1769a6;
            font-size: 17px;
        }

        .card-heading h2 {
            color: #123b65;
            font-size: 15px;
            font-weight: 700;
        }

        .card-heading p {
            color: #8997a9;
            font-size: 11px;
            margin-top: 3px;
        }

        /* DETAIL */
        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px 28px;
        }

        .detail-item {
            min-width: 0;
        }

        .detail-item label {
            display: block;
            color: #8997a9;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .detail-item p {
            color: #263b54;
            font-size: 13px;
            font-weight: 650;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .detail-item.full {
            grid-column: 1 / -1;
        }

        .detail-divider {
            grid-column: 1 / -1;
            height: 1px;
            background: #edf1f6;
            margin: 1px 0;
        }

        /* STATUS */
        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            width: fit-content;
            border-radius: 20px;
            padding: 6px 11px;
            font-size: 11px;
            font-weight: 700;
        }

        .status.pending {
            background: #fff5df;
            color: #a96b00;
        }

        .status.accepted {
            background: #e7f7ed;
            color: #168451;
        }

        .status.rejected {
            background: #fff0f0;
            color: #bd3b3b;
        }

        .decision-info {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            padding: 14px 15px;
            background: #f1f6fb;
            border: 1px solid #e0eaf3;
            border-radius: 9px;
            color: #536b84;
            font-size: 12px;
            line-height: 1.7;
        }

        .decision-info i {
            color: #1769a6;
            font-size: 15px;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .rejection-info {
            background: #fff5f5;
            border: 1px solid #f3dada;
            color: #a94444;
        }

        .rejection-info i {
            color: #bd3b3b;
        }

        /* DOCUMENT */
        .document-list {
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .document-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 14px 15px;
            border: 1px solid #e5ebf2;
            border-radius: 10px;
            transition: .2s;
        }

        .document-item:hover {
            border-color: #c8dced;
            background: #fbfdff;
        }

        .document-info {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .document-icon {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: #eaf4fd;
            color: #1769a6;
            font-size: 20px;
        }

        .document-name {
            color: #263b54;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.5;
            margin-bottom: 4px;
        }

        .document-filename {
            color: #8997a9;
            font-size: 11px;
            overflow-wrap: anywhere;
            line-height: 1.5;
        }

        .document-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 9px 12px;
            background: #eaf4fd;
            color: #1769a6;
            text-decoration: none;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
            transition: .2s;
        }

        .document-button:hover {
            background: #d8eafa;
        }

        /* DECISION */
        .decision-description {
            color: #718096;
            font-size: 12px;
            line-height: 1.8;
            margin-bottom: 19px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            color: #344b65;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .required-mark {
            color: #d64545;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            border: 1px solid #dce5ee;
            border-radius: 9px;
            padding: 12px 13px;
            background: #fff;
            color: #263b54;
            font-family: inherit;
            font-size: 12px;
            outline: none;
            transition: .2s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #4a91c5;
            box-shadow: 0 0 0 3px rgba(23, 105, 166, .1);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #a4afbd;
        }

        .form-group textarea {
            min-height: 110px;
            resize: vertical;
            line-height: 1.7;
        }

        .form-hint {
            color: #8997a9;
            font-size: 11px;
            margin-top: 7px;
            line-height: 1.6;
        }

        .error-text {
            color: #bd3b3b;
            font-size: 11px;
            margin-top: 6px;
        }

        .decision-form {
            padding: 17px;
            border: 1px solid #e5ebf2;
            border-radius: 10px;
            margin-bottom: 17px;
        }

        .decision-form:last-child {
            margin-bottom: 0;
        }

        .form-section-title {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #123b65;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .form-section-title i {
            font-size: 16px;
        }

        .form-section-title.accept {
            color: #168451;
        }

        .form-section-title.reject {
            color: #bd3b3b;
        }

        /* BUTTON */
        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            border: none;
            border-radius: 8px;
            padding: 10px 15px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: .2s;
        }

        .button-accept {
            background: #168451;
            color: #fff;
        }

        .button-accept:hover {
            background: #116c41;
        }

        .button-reject {
            background: #c33e3e;
            color: #fff;
        }

        .button-reject:hover {
            background: #a82f2f;
        }

        .button-back {
            background: #e9eef5;
            color: #52647a;
        }

        .button-back:hover {
            background: #dce5ef;
        }

        .button-download {
            background: #1769a6;
            color: #fff;
        }

        .button-download:hover {
            background: #125583;
        }

        .footer {
            text-align: center;
            color: #9aa7b7;
            font-size: 11px;
            padding: 25px 0 5px;
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
                font-size: 24px;
            }

            .content-card {
                padding: 19px;
            }
        }

        @media (max-width: 560px) {
            .main-content {
                padding: 18px 12px 25px;
            }

            .page-header {
                align-items: flex-start;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .header-icon {
                width: 43px;
                height: 43px;
                border-radius: 12px;
                font-size: 20px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .detail-item.full,
            .detail-divider {
                grid-column: auto;
            }

            .content-card {
                padding: 16px;
            }

            .document-item {
                align-items: flex-start;
                flex-direction: column;
            }

            .document-button {
                width: 100%;
            }

            .decision-form {
                padding: 13px;
            }

            .button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', ['role' => 'petugas'])

    <main class="main-content">

        {{-- BREADCRUMB --}}
        <div class="breadcrumb">
            <a href="{{ route('petugas.pendaftaran') }}">
                Permohonan Pendaftaran
            </a>
            <i class="bi bi-chevron-right"></i>
            <span>Detail Permohonan</span>
        </div>

        {{-- HEADER --}}
        <header class="page-header">
            <div class="header-text">
                <div class="page-eyebrow">
                    <i class="bi bi-building"></i>
                    AREA PENGELOLAAN DISKOMINFOTIK
                </div>

                <h1>Detail Permohonan</h1>

                <p>
                    Periksa informasi dan dokumen persyaratan sebelum memberikan keputusan.
                </p>
            </div>

            <div class="header-icon">
                <i class="bi bi-file-earmark-text"></i>
            </div>
        </header>

        {{-- NOTIFIKASI --}}
        @if (session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle-fill"></i>
                <div>
                    <strong>Terjadi kesalahan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- INFORMASI PERMOHONAN --}}
        <section class="content-card">

            <div class="card-heading">
                <div class="card-heading-icon">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <div>
                    <h2>Informasi Permohonan</h2>
                    <p>Rincian pengajuan pendaftaran subdomain Perangkat Daerah</p>
                </div>
            </div>

            <div class="detail-grid">

                <div class="detail-item">
                    <label>ID Permohonan</label>
                    <p>
                        PD-{{ str_pad($permohonan->id, 4, '0', STR_PAD_LEFT) }}
                    </p>
                </div>

                <div class="detail-item">
                    <label>Tanggal Pengajuan</label>
                    <p>
                        {{ $permohonan->created_at
                            ? $permohonan->created_at->translatedFormat('d F Y')
                            : '-' }}
                    </p>
                </div>

                <div class="detail-item">
                    <label>Nama Perangkat Daerah</label>
                    <p>{{ $permohonan->opd->nama_opd ?? '-' }}</p>
                </div>

                <div class="detail-item">
                    <label>Nama Pengaju</label>
                    <p>{{ $permohonan->pengaju->name ?? '-' }}</p>
                </div>

                <div class="detail-item">
                    <label>Email Pengaju</label>
                    <p>{{ $permohonan->pengaju->email ?? '-' }}</p>
                </div>

                <div class="detail-item">
                    <label>Jenis Permohonan</label>
                    <p>Pendaftaran Subdomain Baru</p>
                </div>

                <div class="detail-item">
                    <label>Nama Subdomain</label>
                    <p>{{ $permohonan->nama_subdomain }}</p>
                </div>

                <div class="detail-item">
                    <label>Nomor Surat OPD</label>
                    <p>{{ $permohonan->nomor_surat_opd ?? '-' }}</p>
                </div>

                <div class="detail-item">
                    <label>Tanggal Surat OPD</label>
                    <p>
                        {{ $permohonan->tanggal_surat_opd
                            ? $permohonan->tanggal_surat_opd->translatedFormat('d F Y')
                            : '-' }}
                    </p>
                </div>

                <div class="detail-item">
                    <label>Status Permohonan</label>

                    @if ($permohonan->status === 'diajukan')
                        <span class="status pending">
                            <i class="bi bi-clock"></i>
                            Diajukan
                        </span>
                    @elseif ($permohonan->status === 'diterima')
                        <span class="status accepted">
                            <i class="bi bi-check-circle"></i>
                            Diterima
                        </span>
                    @elseif ($permohonan->status === 'ditolak')
                        <div class="decision-info rejection-info">
                            <i class="bi bi-info-circle"></i>
                            <span>
                                Permohonan telah ditolak. Alasan penolakan sudah tercatat
                                dan tidak dapat diproses kembali.
                            </span>
                        </div>
                    @endif
                </div>

                {{-- IP ADDRESS DITAMPILKAN JIKA PERMOHONAN DITERIMA --}}
                @if ($permohonan->status === 'diterima')
                    <div class="detail-item">
                        <label>IP Address / Server Subdomain</label>
                        <p>
                            {{ $permohonan->subdomain->ip_address ?? '-' }}
                        </p>
                    </div>
                @endif

                <div class="detail-divider"></div>

                <div class="detail-item full">
                    <label>Kegunaan Layanan</label>
                    <p style="font-weight: 400;">
                        {{ $permohonan->kegunaan ?? '-' }}
                    </p>
                </div>

                @if ($permohonan->tanggal_diperiksa)
                    <div class="detail-item">
                        <label>Tanggal Pemeriksaan</label>
                        <p>
                            {{ $permohonan->tanggal_diperiksa->translatedFormat('d F Y H:i') }}
                        </p>
                    </div>
                @endif

                @if ($permohonan->pemutus)
                    <div class="detail-item">
                        <label>Petugas Pemeriksa</label>
                        <p>{{ $permohonan->pemutus->name }}</p>
                    </div>
                @endif

                @if ($permohonan->status === 'ditolak')
                    <div class="detail-item full">
                        <label>Alasan Penolakan</label>
                        <div class="decision-info rejection-info">
                            <i class="bi bi-exclamation-circle"></i>
                            <span>{{ $permohonan->catatan ?? '-' }}</span>
                        </div>
                    </div>
                @endif

            </div>
        </section>

        {{-- DOKUMEN PERSYARATAN --}}
        <section class="content-card">

            <div class="card-heading">
                <div class="card-heading-icon">
                    <i class="bi bi-folder2-open"></i>
                </div>
                <div>
                    <h2>Dokumen Persyaratan Pasal 33</h2>
                    <p>Dokumen yang harus disertakan dalam pengajuan subdomain baru</p>
                </div>
            </div>

            <div class="document-list">

                @php
                    $jenisDokumen = [
                        'surat_permohonan' => 'Surat Permohonan Nama Subdomain',
                        'surat_penunjukan_pengelola' => 'Surat Penunjukan Pengelola',
                        'kartu_asn' => 'Fotokopi Kartu ASN',
                    ];
                @endphp

                @foreach ($jenisDokumen as $jenis => $namaDokumen)

                    @php
                        $dokumen = $permohonan->dokumens->firstWhere(
                            'jenis_dokumen',
                            $jenis
                        );
                    @endphp

                    <div class="document-item">

                        <div class="document-info">
                            <div class="document-icon">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </div>

                            <div>
                                <div class="document-name">
                                    {{ $namaDokumen }}
                                </div>

                                <div class="document-filename">
                                    {{ $dokumen->nama_file ?? 'Dokumen belum tersedia' }}
                                </div>
                            </div>
                        </div>

                        @if ($dokumen && $dokumen->path_file)
                            <a
                                href="{{ asset('storage/' . ltrim($dokumen->path_file, '/')) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="document-button"
                            >
                                <i class="bi bi-eye"></i>
                                Lihat Dokumen
                            </a>
                        @else
                            <span class="status rejected">
                                <i class="bi bi-x-circle"></i>
                                Tidak tersedia
                            </span>
                        @endif

                    </div>

                @endforeach

            </div>
        </section>

        {{-- KEPUTUSAN PETUGAS --}}
        <section class="content-card">

            <div class="card-heading">
                <div class="card-heading-icon">
                    <i class="bi bi-clipboard-check"></i>
                </div>
                <div>
                    <h2>Keputusan Petugas</h2>
                    <p>Hasil pemeriksaan dan tindak lanjut permohonan</p>
                </div>
            </div>

            @if ($permohonan->status === 'diajukan')

                <p class="decision-description">
                    Pastikan seluruh informasi dan dokumen persyaratan telah diperiksa.
                    Petugas dapat menerima atau menolak permohonan berdasarkan hasil pemeriksaan.
                </p>

                {{-- FORM PENERIMAAN --}}
                <div class="decision-form">

                    <div class="form-section-title accept">
                        <i class="bi bi-check-circle"></i>
                        Penerimaan Permohonan
                    </div>

                    <form
                        action="{{ route('petugas.permohonan.terima', $permohonan->id) }}"
                        method="POST"
                        onsubmit="return confirm('Apakah kamu yakin ingin menerima permohonan ini?')"
                    >
                        @csrf

                        <div class="form-group">
                            <label for="ip_address">
                                IP Address / Server Subdomain Baru
                                <span class="required-mark">*</span>
                            </label>

                            <input
                                type="text"
                                name="ip_address"
                                id="ip_address"
                                value="{{ old('ip_address') }}"
                                placeholder="Contoh: 68.168.218.43"
                                maxlength="45"
                                required
                            >

                            @error('ip_address')
                                <div class="error-text">
                                    {{ $message }}
                                </div>
                            @enderror

                            <p class="form-hint">
                                Masukkan alamat IP atau server yang telah ditetapkan
                                untuk subdomain tersebut.
                            </p>
                        </div>

                        <button type="submit" class="button button-accept">
                            <i class="bi bi-check-circle"></i>
                            Terima Permohonan
                        </button>
                    </form>

                </div>

                {{-- FORM PENOLAKAN --}}
                <div class="decision-form">

                    <div class="form-section-title reject">
                        <i class="bi bi-x-circle"></i>
                        Penolakan Permohonan
                    </div>

                    <form
                        action="{{ route('petugas.permohonan.tolak', $permohonan->id) }}"
                        method="POST"
                        onsubmit="return confirm('Apakah kamu yakin ingin menolak permohonan ini?')"
                    >
                        @csrf

                        <div class="form-group">
                            <label for="catatan">
                                Alasan Penolakan
                                <span class="required-mark">*</span>
                            </label>

                            <textarea
                                name="catatan"
                                id="catatan"
                                maxlength="2000"
                                placeholder="Tuliskan alasan penolakan permohonan..."
                                required
                            >{{ old('catatan') }}</textarea>

                            @error('catatan')
                                <div class="error-text">
                                    {{ $message }}
                                </div>
                            @enderror

                            <p class="form-hint">
                                Berikan alasan yang jelas agar Perangkat Daerah mengetahui
                                bagian persyaratan yang perlu diperhatikan.
                            </p>
                        </div>

                        <button type="submit" class="button button-reject">
                            <i class="bi bi-x-circle"></i>
                            Tolak Permohonan
                        </button>
                    </form>

                </div>

            @elseif ($permohonan->status === 'diterima')

                <div class="decision-info">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>
                        Permohonan telah diterima. Data subdomain dan IP Address/Server
                        sudah tercatat dalam sistem dan tidak dapat diproses kembali.
                    </span>
                </div>

            @elseif ($permohonan->status === 'ditolak')

                <div class="decision-info rejection-info">
                    <i class="bi bi-info-circle"></i>
                    <span>
                        Permohonan telah ditolak. Alasan penolakan sudah tercatat
                        dan tidak dapat diproses kembali.
                    </span>
                </div>

            @endif

            {{-- UNDUH SURAT TINDAK LANJUT --}}
            @if ($permohonan->status === 'diterima')

                <div style="margin-top: 20px;">

                    @if ($permohonan->suratTindakLanjut)

                        <a
                            href="{{ route('petugas.surat.download', $permohonan->suratTindakLanjut->id) }}"
                            class="button button-download"
                        >
                            <i class="bi bi-file-earmark-pdf"></i>
                            Unduh Surat Tindak Lanjut
                        </a>

                    @else

                        <div class="decision-info">
                            <i class="bi bi-info-circle"></i>
                            <span>
                                Permohonan telah diterima, tetapi surat tindak lanjut
                                belum tersedia. Silakan periksa data subdomain dan proses
                                penerbitan surat pada sistem.
                            </span>
                        </div>

                    @endif

                </div>

            @elseif ($permohonan->status === 'ditolak')

                <div class="decision-info" style="margin-top: 20px;">
                    <i class="bi bi-info-circle"></i>
                    <span>
                        Permohonan yang ditolak tidak memerlukan surat tindak lanjut.
                        Informasi keputusan dan alasan penolakan dapat dilihat oleh OPD
                        melalui dashboard.
                    </span>
                </div>

            @endif

        </section>

        {{-- TOMBOL KEMBALI --}}
        <a
            href="{{ route('petugas.pendaftaran') }}"
            class="button button-back"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali ke Daftar Permohonan
        </a>

        <footer class="footer">
            © {{ date('Y') }} Diskominfotik Kabupaten Indragiri Hulu
        </footer>

    </main>

</body>
</html>
