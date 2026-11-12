
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Pendaftaran Subdomain</title>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

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

        button, input, textarea {
            font-family: inherit;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .main-content {
            margin-left: 270px;
            min-height: 100vh;
            padding: 34px 38px 45px;
        }

        /* HEADER */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 25px;
        }

        .header-text {
            max-width: 680px;
        }

        .page-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #2872ad;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 9px;
        }

        .page-header h1 {
            color: #123b65;
            font-size: 27px;
            font-weight: 750;
            margin-bottom: 8px;
        }

        .page-header p {
            color: #718096;
            font-size: 13px;
            line-height: 1.7;
        }

        .header-icon {
            width: 54px;
            height: 54px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
            color: #1769a6;
            background: #e5f1fc;
            border-radius: 15px;
            font-size: 25px;
        }

        /* PESAN SUKSES DI ATAS */
        .success-alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px 18px;
            margin-bottom: 22px;
            color: #08744d;
            background: #e9f8f0;
            border: 1px solid #c9ebd8;
            border-radius: 11px;
            animation: fadeIn .35s ease;
        }

        .success-alert i {
            font-size: 21px;
            margin-top: 1px;
        }

        .success-alert-content {
            flex: 1;
        }

        .success-alert strong {
            display: block;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .success-alert p {
            font-size: 12px;
            line-height: 1.6;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-7px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* INFORMASI PERSYARATAN */
        .info-banner {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            padding: 17px 19px;
            margin-bottom: 22px;
            background: #eaf4fd;
            border: 1px solid #cfe5f8;
            border-radius: 12px;
        }

        .info-icon {
            color: #1769a6;
            font-size: 20px;
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
        }

        /* FORM CARD */
        .form-card {
            max-width: 950px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #e2eaf2;
            border-radius: 16px;
            box-shadow: 0 5px 22px rgba(23, 55, 90, .045);
            overflow: hidden;
        }

        .card-heading {
            padding: 23px 28px;
            border-bottom: 1px solid #edf1f6;
        }

        .card-heading h2 {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #123b65;
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .card-heading h2 i {
            color: #2878b8;
        }

        .card-heading p {
            color: #8290a3;
            font-size: 12px;
            line-height: 1.6;
        }

        .form-body {
            padding: 27px 28px 30px;
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 20px;
        }

        .section-number {
            width: 29px;
            height: 29px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1769a6;
            background: #e9f3fc;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 700;
        }

        .section-heading h3 {
            color: #1c3859;
            font-size: 14px;
            font-weight: 700;
        }

        .section-heading p {
            color: #8a97a8;
            font-size: 11px;
            margin-top: 3px;
        }

        .form-section {
            margin-bottom: 29px;
            padding-bottom: 26px;
            border-bottom: 1px solid #edf1f6;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 19px;
        }

        .form-group {
            min-width: 0;
            margin-bottom: 19px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-label {
            display: block;
            color: #344b68;
            font-size: 12px;
            font-weight: 650;
            margin-bottom: 8px;
        }

        .required {
            color: #dc515b;
            margin-left: 2px;
        }

        .input-control {
            display: block;
            width: 100%;
            min-height: 44px;
            padding: 11px 13px;
            color: #243c59;
            background: #fff;
            border: 1px solid #d8e1ec;
            border-radius: 9px;
            font-size: 13px;
            outline: none;
            transition: .2s ease;
        }

        .input-control:focus {
            border-color: #3987c4;
            box-shadow: 0 0 0 3px rgba(57, 135, 196, .11);
        }

        .input-control::placeholder {
            color: #a5afbd;
        }

        .domain-input-row {
            display: flex;
            align-items: center;
            gap: 0;
        }

        .domain-input-row input {
            min-width: 0;
            flex: 1;
            border-radius: 9px 0 0 9px;
        }

        .domain-suffix {
            min-height: 44px;
            display: flex;
            align-items: center;
            padding: 0 13px;
            color: #42617f;
            background: #f0f5fa;
            border: 1px solid #d8e1ec;
            border-left: 0;
            border-radius: 0 9px 9px 0;
            font-size: 12px;
            white-space: nowrap;
        }

        textarea.input-control {
            min-height: 115px;
            resize: vertical;
            line-height: 1.7;
        }

        .field-note {
            color: #8a97a8;
            font-size: 11px;
            line-height: 1.6;
            margin-top: 7px;
        }

        /* UPLOAD DOKUMEN */
        .document-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .upload-counter {
            padding: 6px 10px;
            color: #1769a6;
            background: #eaf4fd;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 650;
            white-space: nowrap;
        }

        .document-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 16px;
            margin-bottom: 11px;
            background: #fbfcfe;
            border: 1px solid #e2e9f1;
            border-radius: 11px;
            transition: .2s ease;
        }

        .document-item:focus-within {
            border-color: #8ab8dc;
            background: #f8fbff;
        }

        .document-left {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            min-width: 0;
            flex: 1;
        }

        .document-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #2878b8;
            background: #e8f2fc;
            border-radius: 10px;
            font-size: 19px;
        }

        .document-info {
            min-width: 0;
        }

        .document-title {
            color: #304762;
            font-size: 12px;
            font-weight: 650;
            line-height: 1.5;
            margin-bottom: 5px;
        }

        .file-status {
            display: block;
            color: #929eae;
            font-size: 11px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .file-status.selected {
            color: #13845d;
        }

        .file-status.error {
            color: #c43c46;
        }

        .file-button {
            position: relative;
            flex-shrink: 0;
        }

        .file-button input[type="file"] {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
            overflow: hidden;
        }

        .file-button label {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-width: 112px;
            padding: 9px 13px;
            color: #1769a6;
            background: #fff;
            border: 1px solid #b8d3e9;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 650;
            cursor: pointer;
            transition: .2s ease;
        }

        .file-button label:hover {
            background: #eaf4fd;
            border-color: #1769a6;
        }

        .file-button input:focus-visible + label {
            outline: 2px solid #1769a6;
            outline-offset: 3px;
        }

        .file-note {
            display: flex;
            align-items: flex-start;
            gap: 7px;
            color: #8492a5;
            font-size: 11px;
            line-height: 1.7;
            margin-top: 13px;
        }

        .file-note i {
            color: #4786b5;
            margin-top: 2px;
        }

        /* PESAN VALIDASI */
        .error-message {
            display: none;
            padding: 13px 15px;
            margin-top: 17px;
            color: #a72e38;
            background: #fff0f1;
            border: 1px solid #f5d1d4;
            border-radius: 9px;
            font-size: 12px;
            line-height: 1.7;
        }

        .error-message ul {
            padding-left: 19px;
            margin-top: 5px;
        }

        /* TOMBOL */
        .form-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            min-height: 43px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 19px;
            border: 1px solid transparent;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 650;
            cursor: pointer;
            transition: .2s ease;
        }

        .btn-primary {
            color: #fff;
            background: #1769a6;
            border-color: #1769a6;
            box-shadow: 0 3px 8px rgba(23, 105, 166, .15);
        }

        .btn-primary:hover:not(:disabled) {
            background: #125486;
            transform: translateY(-1px);
        }

        .btn-primary:disabled {
            color: #8290a0;
            background: #e5eaf0;
            border-color: #e5eaf0;
            box-shadow: none;
            cursor: not-allowed;
        }

        .btn-secondary {
            color: #52657c;
            background: #fff;
            border-color: #d7e0e9;
        }

        .btn-secondary:hover {
            background: #f3f6fa;
        }

        .action-note {
            width: 100%;
            color: #8a97a8;
            font-size: 11px;
            line-height: 1.6;
            margin-top: 3px;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .main-content {
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

            .form-card {
                border-radius: 13px;
            }
        }

        @media (max-width: 560px) {
            .main-content {
                padding: 18px 12px 25px;
            }

            .page-header {
                gap: 10px;
            }

            .page-header h1 {
                font-size: 21px;
            }

            .header-icon {
                width: 43px;
                height: 43px;
                font-size: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .card-heading {
                padding: 19px 17px;
            }

            .form-body {
                padding: 21px 16px;
            }

            .document-item {
                align-items: flex-start;
                flex-direction: column;
            }

            .file-button,
            .file-button label {
                width: 100%;
            }

            .document-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .domain-input-row {
                align-items: stretch;
            }

            .domain-suffix {
                padding: 0 8px;
                font-size: 10px;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .form-actions .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', ['role' => 'opd'])

    <main class="main-content">

        {{-- HEADER HALAMAN --}}
        <header class="page-header">
            <div class="header-text">
                <div class="page-eyebrow">
                    <i class="bi bi-building"></i>
                    AREA PERANGKAT DAERAH
                </div>

                <h1>Ajukan Pendaftaran Subdomain</h1>

                <p>
                    Lengkapi informasi permohonan dan unggah dokumen persyaratan
                    sesuai Pasal 33. Pengajuan dilakukan atas sepengetahuan dan
                    persetujuan Kepala Perangkat Daerah.
                </p>
            </div>

            <div class="header-icon">
                <i class="bi bi-globe2"></i>
            </div>
        </header>

        {{-- PESAN BERHASIL: MUNCUL DI ATAS --}}
        @if (session('success'))
            <div class="success-alert" role="status" aria-live="polite">
                <i class="bi bi-check-circle-fill"></i>

                <div class="success-alert-content">
                    <strong>Permohonan Berhasil Dikirim!</strong>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        {{-- INFORMASI PERSYARATAN --}}
        <div class="info-banner">
            <i class="bi bi-info-circle-fill info-icon"></i>

            <div>
                <strong>Informasi Persyaratan Pendaftaran</strong>
                <p>
                    Pastikan nama subdomain yang diajukan sesuai dengan kebutuhan
                    layanan Perangkat Daerah. Siapkan tiga dokumen persyaratan
                    Pasal 33 sebelum mengirimkan permohonan.
                </p>
            </div>
        </div>

        {{-- FORM PENDAFTARAN --}}
        <section class="form-card">

            <div class="card-heading">
                <h2>
                    <i class="bi bi-file-earmark-plus"></i>
                    Formulir Pendaftaran Subdomain
                </h2>

                <p>Lengkapi seluruh kolom yang bertanda wajib diisi.</p>
            </div>

            <div class="form-body">

                <form id="registrationForm"
                      action="{{ route('opd.permohonan.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    {{-- 01 INFORMASI SURAT --}}
                    <section class="form-section">

                        <div class="section-heading">
                            <span class="section-number">01</span>

                            <div>
                                <h3>Informasi Surat Permohonan</h3>
                                <p>Masukkan nomor dan tanggal surat resmi dari OPD.</p>
                            </div>
                        </div>

                        <div class="form-grid">

                            <div class="form-group">
                                <label for="nomor_surat_opd" class="form-label">
                                    Nomor Surat Permohonan OPD
                                    <span class="required">*</span>
                                </label>

                                <input type="text"
                                       id="nomor_surat_opd"
                                       name="nomor_surat_opd"
                                       class="input-control"
                                       placeholder="Contoh: 000.1.5/123/DISKOMINFO/2026"
                                       value="{{ old('nomor_surat_opd') }}"
                                       maxlength="100"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_surat_opd" class="form-label">
                                    Tanggal Surat Permohonan OPD
                                    <span class="required">*</span>
                                </label>

                                <input type="date"
                                       id="tanggal_surat_opd"
                                       name="tanggal_surat_opd"
                                       class="input-control"
                                       value="{{ old('tanggal_surat_opd') }}"
                                       required>
                            </div>

                        </div>
                    </section>

                    {{-- 02 INFORMASI SUBDOMAIN --}}
                    <section class="form-section">

                        <div class="section-heading">
                            <span class="section-number">02</span>

                            <div>
                                <h3>Informasi Subdomain</h3>
                                <p>Tentukan nama dan kegunaan subdomain yang diajukan.</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subdomain" class="form-label">
                                Nama Subdomain yang Diajukan
                                <span class="required">*</span>
                            </label>

                            <div class="domain-input-row">
                                <input type="text"
                                       id="subdomain"
                                       name="subdomain"
                                       class="input-control"
                                       placeholder="Contoh: perpustakaan"
                                       maxlength="50"
                                       autocomplete="off"
                                       value="{{ old('subdomain') }}"
                                       aria-describedby="subdomainHelp"
                                       required>

                                <span class="domain-suffix">.inhukab.go.id</span>
                            </div>

                            <p class="field-note" id="subdomainHelp">
                                Gunakan huruf kecil, angka, atau tanda hubung.
                                Nama tidak boleh diawali atau diakhiri tanda hubung.
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="kegunaan" class="form-label">
                                Kegunaan Layanan
                                <span class="required">*</span>
                            </label>

                            <textarea id="kegunaan"
                                      name="kegunaan"
                                      class="input-control"
                                      placeholder="Jelaskan secara singkat website atau layanan yang akan menggunakan subdomain ini."
                                      maxlength="1000"
                                      required>{{ old('kegunaan') }}</textarea>

                            <p class="field-note">
                                Contoh: Website layanan informasi dan peminjaman
                                buku milik Dinas Perpustakaan.
                            </p>
                        </div>

                    </section>

                    {{-- 03 DOKUMEN PERSYARATAN --}}
                    <section class="form-section">

                        <div class="section-heading">
                            <span class="section-number">03</span>

                            <div>
                                <h3>Dokumen Persyaratan</h3>
                                <p>Unggah seluruh dokumen yang diperlukan sesuai Pasal 33.</p>
                            </div>
                        </div>

                        <div class="document-heading">
                            <label class="form-label">
                                Unggah 3 Dokumen Persyaratan
                                <span class="required">*</span>
                            </label>

                            <span class="upload-counter" id="uploadCounter">
                                0 dari 3 dokumen valid
                            </span>
                        </div>

                        {{-- DOKUMEN 1 --}}
                        <div class="document-item">
                            <div class="document-left">
                                <div class="document-icon">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>

                                <div class="document-info">
                                    <p class="document-title">
                                        Surat Permohonan Nama Subdomain Perangkat Daerah
                                    </p>

                                    <span class="file-status" id="statusSurat">
                                        Belum ada berkas
                                    </span>
                                </div>
                            </div>

                            <div class="file-button">
                                <input type="file"
                                       id="surat"
                                       name="surat"
                                       accept=".pdf,.jpg,.jpeg,.png"
                                       aria-label="Unggah surat permohonan nama subdomain"
                                       required>

                                <label for="surat">
                                    <i class="bi bi-upload"></i>
                                    Pilih Berkas
                                </label>
                            </div>
                        </div>

                        {{-- DOKUMEN 2 --}}
                        <div class="document-item">
                            <div class="document-left">
                                <div class="document-icon">
                                    <i class="bi bi-file-earmark-person"></i>
                                </div>

                                <div class="document-info">
                                    <p class="document-title">
                                        Surat Penunjukan Pengelola Subdomain
                                    </p>

                                    <span class="file-status" id="statusPengelola">
                                        Belum ada berkas
                                    </span>
                                </div>
                            </div>

                            <div class="file-button">
                                <input type="file"
                                       id="pengelola"
                                       name="pengelola"
                                       accept=".pdf,.jpg,.jpeg,.png"
                                       aria-label="Unggah surat penunjukan pengelola subdomain"
                                       required>

                                <label for="pengelola">
                                    <i class="bi bi-upload"></i>
                                    Pilih Berkas
                                </label>
                            </div>
                        </div>

                        {{-- DOKUMEN 3 --}}
                        <div class="document-item">
                            <div class="document-left">
                                <div class="document-icon">
                                    <i class="bi bi-person-vcard"></i>
                                </div>

                                <div class="document-info">
                                    <p class="document-title">
                                        Fotokopi Kartu Aparatur Sipil Negara (ASN)
                                    </p>

                                    <span class="file-status" id="statusAsn">
                                        Belum ada berkas
                                    </span>
                                </div>
                            </div>

                            <div class="file-button">
                                <input type="file"
                                       id="asn"
                                       name="asn"
                                       accept=".pdf,.jpg,.jpeg,.png"
                                       aria-label="Unggah fotokopi kartu ASN"
                                       required>

                                <label for="asn">
                                    <i class="bi bi-upload"></i>
                                    Pilih Berkas
                                </label>
                            </div>
                        </div>

                        <p class="file-note">
                            <i class="bi bi-shield-check"></i>
                            Format berkas yang diperbolehkan: PDF, JPG, atau PNG.
                            Ukuran maksimal 2 MB untuk setiap dokumen.
                        </p>

                    </section>

                    {{-- PESAN KESALAHAN VALIDASI LARAVEL --}}
                    @if ($errors->any())
                        <div class="error-message"
                             id="errorMessage"
                             role="alert"
                             aria-live="polite"
                             style="display:block;">

                            <strong>Permohonan belum dapat dikirim:</strong>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <div class="error-message"
                             id="errorMessage"
                             role="alert"
                             aria-live="polite"
                             style="display:none;"></div>
                    @endif

                    {{-- TOMBOL --}}
                    <div class="form-actions">

                        <button type="submit"
                                class="btn btn-primary"
                                id="submitButton"
                                disabled>
                            <i class="bi bi-send"></i>
                            Kirim Permohonan
                        </button>

                        <button type="button"
                                class="btn btn-secondary"
                                id="cancelButton">
                            <i class="bi bi-arrow-left"></i>
                            Batal
                        </button>

                        <p class="action-note">
                            Pastikan seluruh informasi dan dokumen telah sesuai
                            sebelum mengirimkan permohonan.
                        </p>

                    </div>

                </form>
            </div>
        </section>

    </main>

    <script>
        const MAX_FILE_SIZE = 2 * 1024 * 1024;
        const allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];

        const fileInputs = [
            {
                input: document.getElementById('surat'),
                status: document.getElementById('statusSurat'),
                label: 'Surat permohonan nama subdomain'
            },
            {
                input: document.getElementById('pengelola'),
                status: document.getElementById('statusPengelola'),
                label: 'Surat penunjukan pengelola'
            },
            {
                input: document.getElementById('asn'),
                status: document.getElementById('statusAsn'),
                label: 'Fotokopi kartu ASN'
            }
        ];

        const form = document.getElementById('registrationForm');
        const nomorSuratInput = document.getElementById('nomor_surat_opd');
        const tanggalSuratInput = document.getElementById('tanggal_surat_opd');
        const subdomainInput = document.getElementById('subdomain');
        const kegunaanInput = document.getElementById('kegunaan');
        const uploadCounter = document.getElementById('uploadCounter');
        const submitButton = document.getElementById('submitButton');
        const errorMessage = document.getElementById('errorMessage');
        const cancelButton = document.getElementById('cancelButton');

        // Validasi format nama subdomain
        function isValidSubdomain(value) {
            return /^[a-z0-9](?:[a-z0-9-]{0,48}[a-z0-9])?$/.test(value);
        }

        function showError(message) {
            errorMessage.textContent = message;
            errorMessage.style.display = 'block';
        }

        function clearMessages() {
            errorMessage.textContent = '';
            errorMessage.style.display = 'none';
        }

        function getFileExtension(filename) {
            const parts = filename.split('.');
            return parts.length > 1 ? parts.pop().toLowerCase() : '';
        }

        // Validasi dokumen
        function validateFile(file) {
            if (!file) {
                return 'Belum ada berkas.';
            }

            const extension = getFileExtension(file.name);

            if (!allowedExtensions.includes(extension)) {
                return 'Format tidak diperbolehkan. Pilih PDF, JPG, atau PNG.';
            }

            if (file.size > MAX_FILE_SIZE) {
                return 'Ukuran berkas melebihi 2 MB.';
            }

            if (file.size === 0) {
                return 'Berkas kosong. Silakan pilih berkas lain.';
            }

            return '';
        }

        function getValidFileCount() {
            return fileInputs.filter(({ input }) => {
                const file = input.files[0];
                return file && validateFile(file) === '';
            }).length;
        }

        // Mengatur kondisi tombol kirim
        function updateFormState() {
            const count = getValidFileCount();

            uploadCounter.textContent =
                count + ' dari 3 dokumen valid';

            const nomorValid =
                nomorSuratInput.value.trim().length > 0;

            const tanggalValid =
                tanggalSuratInput.value !== '';

            const subdomain =
                subdomainInput.value.trim().toLowerCase();

            const validSubdomain =
                subdomain.length <= 50 &&
                isValidSubdomain(subdomain);

            const validKegunaan =
                kegunaanInput.value.trim().length > 0;

            const allFilesValid = fileInputs.every(({ input }) => {
                const file = input.files[0];
                return file && validateFile(file) === '';
            });

            submitButton.disabled = !(
                nomorValid &&
                tanggalValid &&
                validSubdomain &&
                validKegunaan &&
                allFilesValid
            );
        }

        // Validasi setiap dokumen ketika dipilih
        fileInputs.forEach(({ input, status, label }) => {
            input.addEventListener('change', function () {
                clearMessages();

                const file = input.files[0];

                if (!file) {
                    status.textContent = 'Belum ada berkas';
                    status.className = 'file-status';
                    updateFormState();
                    return;
                }

                const error = validateFile(file);

                if (error) {
                    status.textContent = error;
                    status.className = 'file-status error';

                    showError(label + ': ' + error);

                    input.value = '';
                } else {
                    status.textContent =
                        file.name + ' (' +
                        (file.size / 1024).toFixed(1) +
                        ' KB)';

                    status.className = 'file-status selected';
                }

                updateFormState();
            });
        });

        // Pantau perubahan seluruh kolom
        [
            nomorSuratInput,
            tanggalSuratInput,
            subdomainInput,
            kegunaanInput
        ].forEach(input => {
            input.addEventListener('input', function () {
                clearMessages();
                updateFormState();
            });

            input.addEventListener('change', function () {
                clearMessages();
                updateFormState();
            });
        });

        // Validasi sebelum dikirim
        form.addEventListener('submit', function (event) {
            clearMessages();

            const subdomain =
                subdomainInput.value.trim().toLowerCase();

            const kegunaan =
                kegunaanInput.value.trim();

            subdomainInput.value = subdomain;

            if (!nomorSuratInput.value.trim()) {
                event.preventDefault();
                showError('Nomor surat permohonan wajib diisi.');
                nomorSuratInput.focus();
                return;
            }

            if (!tanggalSuratInput.value) {
                event.preventDefault();
                showError('Tanggal surat permohonan wajib diisi.');
                tanggalSuratInput.focus();
                return;
            }

            if (!isValidSubdomain(subdomain) || subdomain.length > 50) {
                event.preventDefault();

                showError(
                    'Nama subdomain harus menggunakan huruf kecil, angka, ' +
                    'atau tanda hubung. Maksimal 50 karakter dan tidak boleh ' +
                    'diawali atau diakhiri tanda hubung.'
                );

                subdomainInput.focus();
                return;
            }

            if (!kegunaan) {
                event.preventDefault();
                showError('Kegunaan layanan wajib diisi.');
                kegunaanInput.focus();
                return;
            }

            for (const item of fileInputs) {
                const file = item.input.files[0];

                if (!file) {
                    event.preventDefault();
                    showError('Silakan unggah ' + item.label + '.');
                    item.input.focus();
                    return;
                }

                const fileError = validateFile(file);

                if (fileError) {
                    event.preventDefault();
                    showError(item.label + ': ' + fileError);
                    item.input.focus();
                    return;
                }
            }

            submitButton.disabled = true;

            submitButton.innerHTML =
                '<i class="bi bi-hourglass-split"></i> Mengirim permohonan...';
        });

        // Tombol batal
        cancelButton.addEventListener('click', function () {
            const confirmCancel = confirm(
                'Batalkan pengisian formulir dan kembali ke dashboard?'
            );

            if (confirmCancel) {
                window.location.href = @json(route('prototype.opd'));
            }
        });

        // Kondisi awal
        updateFormState();
    </script>

</body>
</html>
