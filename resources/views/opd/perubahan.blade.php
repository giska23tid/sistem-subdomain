
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Perubahan Nama Subdomain</title>

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
            font-size: 14px;
            background: #f3f6fb;
            color: #172b4d;
        }

        button, input, select {
            font-family: inherit;
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
            max-width: 700px;
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

        /* ALERT */
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

        /* INFORMASI */
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
            line-height: 1.7;
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

        /* SECTION */
        .form-section {
            margin-bottom: 29px;
            padding-bottom: 26px;
            border-bottom: 1px solid #edf1f6;
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
            flex-shrink: 0;
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

        /* INPUT */
        .form-group {
            margin-bottom: 20px;
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

        select.input-control {
            cursor: pointer;
        }

        .field-note {
            color: #8a97a8;
            font-size: 11px;
            line-height: 1.7;
            margin-top: 7px;
        }

        /* DOMAIN */
        .domain-input-row {
            display: flex;
            align-items: stretch;
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

        .domain-preview {
            margin-top: 11px;
            padding: 14px 16px;
            background: #f5f8fc;
            border: 1px solid #e1e8f2;
            border-radius: 10px;
        }

        .preview-label {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #718096;
            font-size: 11px;
            margin-bottom: 7px;
        }

        .preview-label i {
            color: #2878b8;
        }

        .domain-preview strong {
            display: block;
            color: #123b65;
            font-size: 15px;
            overflow-wrap: anywhere;
        }

        /* DOKUMEN */
        .document-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 14px;
        }

        .document-heading .form-label {
            margin-bottom: 0;
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
            padding: 15px;
            margin-bottom: 11px;
            background: #fbfcfe;
            border: 1px solid #e2e9f1;
            border-radius: 11px;
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
        }

        @media (max-width: 560px) {
            .main-content {
                padding: 18px 12px 25px;
            }

            .page-header h1 {
                font-size: 21px;
            }

            .header-icon {
                width: 43px;
                height: 43px;
                font-size: 20px;
            }

            .card-heading {
                padding: 19px 17px;
            }

            .form-body {
                padding: 21px 16px;
            }

            .document-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .document-item {
                align-items: flex-start;
                flex-direction: column;
            }

            .file-button,
            .file-button label {
                width: 100%;
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

        {{-- HEADER --}}
        <header class="page-header">
            <div class="header-text">
                <div class="page-eyebrow">
                    <i class="bi bi-building"></i>
                    AREA PERANGKAT DAERAH
                </div>

                <h1>Ajukan Perubahan Nama Subdomain</h1>

                <p>
                    Ajukan perubahan nama subdomain yang telah terdaftar
                    dengan melengkapi informasi permohonan dan dokumen 
                    persyaratan sesuai Pasal 35.
                </p>
            </div>

            <div class="header-icon">
                <i class="bi bi-arrow-left-right"></i>
            </div>
        </header>

        {{-- NOTIFIKASI SUKSES DI ATAS --}}
        @if (session('success'))
            <div class="success-alert" role="status" aria-live="polite">
                <i class="bi bi-check-circle-fill"></i>

                <div class="success-alert-content">
                    <strong>Permohonan Berhasil Dikirim!</strong>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        {{-- INFORMASI --}}
        <div class="info-banner">
            <i class="bi bi-info-circle-fill info-icon"></i>

            <div>
                <strong>Informasi Perubahan Nama Subdomain</strong>
                <p>
                    Pilih subdomain aktif yang akan diubah, kemudian masukkan
                    nama subdomain baru. Perubahan akan diproses oleh petugas
                    Diskominfotik setelah dokumen persyaratan diperiksa.
                    Subdomain lama akan dinonaktifkan apabila permohonan
                    perubahan disetujui.
                </p>
            </div>
        </div>

        {{-- FORM CARD --}}
        <section class="form-card">

            <div class="card-heading">
                <h2>
                    <i class="bi bi-file-earmark-arrow-up"></i>
                    Formulir Perubahan Nama Subdomain
                </h2>

                <p>
                    Lengkapi seluruh informasi dan dokumen yang diperlukan.
                </p>
            </div>

            <div class="form-body">

                <form id="changeForm"
                      action="{{ route('opd.permohonan.perubahan.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    {{-- 01 SUBDOMAIN LAMA --}}
                    <section class="form-section">

                        <div class="section-heading">
                            <span class="section-number">01</span>

                            <div>
                                <h3>Subdomain yang Akan Diubah</h3>
                                <p>Pilih subdomain aktif milik Perangkat Daerah.</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subdomainLama" class="form-label">
                                Subdomain Lama
                                <span class="required">*</span>
                            </label>

                            <select id="subdomainLama"
                                    name="subdomain_lama"
                                    class="input-control"
                                    required>

                                <option value="">-- Pilih subdomain --</option>

                                @forelse($subdomains as $subdomain)
                                    <option
                                        value="{{ $subdomain->nama_subdomain }}"
                                        {{ old('subdomain_lama') == $subdomain->nama_subdomain ? 'selected' : '' }}
                                    >
                                        {{ $subdomain->nama_subdomain }}.inhukab.go.id
                                    </option>
                                @empty
                                    <option value="" disabled>
                                        Belum ada subdomain aktif
                                    </option>
                                @endforelse

                            </select>

                            <p class="field-note">
                                Pilih subdomain yang masih aktif dan terdaftar
                                pada Perangkat Daerah kamu.
                            </p>
                        </div>

                    </section>

                    {{-- 02 SUBDOMAIN BARU --}}
                    <section class="form-section">

                        <div class="section-heading">
                            <span class="section-number">02</span>

                            <div>
                                <h3>Nama Subdomain Baru</h3>
                                <p>Masukkan nama pengganti untuk subdomain lama.</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subdomainBaru" class="form-label">
                                Nama Subdomain Baru yang Diajukan
                                <span class="required">*</span>
                            </label>

                            <div class="domain-input-row">
                                <input type="text"
                                       id="subdomainBaru"
                                       name="subdomain_baru"
                                       class="input-control"
                                       placeholder="Contoh: disdik"
                                       maxlength="50"
                                       autocomplete="off"
                                       value="{{ old('subdomain_baru') }}"
                                       required>

                                <span class="domain-suffix">
                                    .inhukab.go.id
                                </span>
                            </div>

                            <p class="field-note">
                                Masukkan nama tanpa akhiran domain.
                                Gunakan huruf kecil, angka, atau tanda hubung.
                                Nama tidak boleh diawali atau diakhiri tanda hubung.
                            </p>

                            <div class="domain-preview">
                                <div class="preview-label">
                                    <i class="bi bi-globe2"></i>
                                    Pratinjau nama subdomain baru
                                </div>

                                <strong id="previewDomain">Belum diisi</strong>
                            </div>
                        </div>

                    </section>

                    {{-- 03 INFORMASI SURAT --}}
                    <section class="form-section">

                        <div class="section-heading">
                            <span class="section-number">03</span>

                            <div>
                                <h3>Informasi Surat Permohonan</h3>
                                <p>Masukkan nomor dan tanggal surat resmi OPD.</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nomorSuratOpd" class="form-label">
                                Nomor Surat Permohonan OPD
                                <span class="required">*</span>
                            </label>

                            <input type="text"
                                   id="nomorSuratOpd"
                                   name="nomor_surat_opd"
                                   class="input-control"
                                   placeholder="Contoh: 800/DISDIKBUD/1404"
                                   maxlength="100"
                                   value="{{ old('nomor_surat_opd') }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="tanggalSuratOpd" class="form-label">
                                Tanggal Surat Permohonan OPD
                                <span class="required">*</span>
                            </label>

                            <input type="date"
                                   id="tanggalSuratOpd"
                                   name="tanggal_surat_opd"
                                   class="input-control"
                                   max="{{ date('Y-m-d') }}"
                                   value="{{ old('tanggal_surat_opd') }}"
                                   required>
                        </div>

                    </section>

                    {{-- 04 DOKUMEN --}}
                    <section class="form-section">

                        <div class="section-heading">
                            <span class="section-number">04</span>

                            <div>
                                <h3>Dokumen Persyaratan</h3>
                                <p>Unggah dokumen yang diperlukan untuk perubahan subdomain.</p>
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
                                        Surat Permohonan Perubahan Nama Subdomain
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
                                       required>

                                <label for="asn">
                                    <i class="bi bi-upload"></i>
                                    Pilih Berkas
                                </label>
                            </div>
                        </div>

                        <p class="file-note">
                            <i class="bi bi-shield-check"></i>
                            Format berkas yang diperbolehkan: PDF, JPG, JPEG,
                            atau PNG. Ukuran maksimal 2 MB untuk setiap dokumen.
                        </p>

                    </section>

                    {{-- ERROR VALIDASI LARAVEL --}}
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
                             aria-live="polite"></div>
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
                            Pastikan nama subdomain lama dan nama baru sudah benar
                            serta seluruh dokumen telah dilengkapi sebelum
                            mengirimkan permohonan.
                        </p>

                    </div>

                </form>

            </div>
        </section>

    </main>

    <script>
        const MAX_FILE_SIZE = 2 * 1024 * 1024;
        const ALLOWED_EXTENSIONS = ['pdf', 'jpg', 'jpeg', 'png'];

        const form = document.getElementById('changeForm');

        const oldDomainInput = document.getElementById('subdomainLama');
        const newDomainInput = document.getElementById('subdomainBaru');

        const nomorSuratInput = document.getElementById('nomorSuratOpd');
        const tanggalSuratInput = document.getElementById('tanggalSuratOpd');

        const previewDomain = document.getElementById('previewDomain');
        const uploadCounter = document.getElementById('uploadCounter');

        const submitButton = document.getElementById('submitButton');
        const errorMessage = document.getElementById('errorMessage');
        const cancelButton = document.getElementById('cancelButton');

        const fileInputs = [
            {
                input: document.getElementById('surat'),
                status: document.getElementById('statusSurat'),
                label: 'Surat permohonan perubahan nama subdomain'
            },
            {
                input: document.getElementById('pengelola'),
                status: document.getElementById('statusPengelola'),
                label: 'Surat penunjukan pengelola subdomain'
            },
            {
                input: document.getElementById('asn'),
                status: document.getElementById('statusAsn'),
                label: 'Fotokopi kartu ASN'
            }
        ];

        // Validasi nama subdomain
        function isValidDomainName(value) {
            return /^[a-z0-9](?:[a-z0-9-]{0,48}[a-z0-9])?$/.test(value);
        }

        // Menampilkan pesan kesalahan
        function showError(message) {
            errorMessage.textContent = message;
            errorMessage.style.display = 'block';
        }

        // Menghapus pesan kesalahan
        function clearMessages() {
            errorMessage.textContent = '';
            errorMessage.style.display = 'none';
        }

        // Memperbarui preview subdomain
        function updatePreview() {
            const newName = newDomainInput.value.trim().toLowerCase();

            if (newName && isValidDomainName(newName)) {
                previewDomain.textContent = newName + '.inhukab.go.id';
            } else {
                previewDomain.textContent = 'Belum diisi';
            }
        }

        // Validasi dokumen
        function validateFile(file) {
            if (!file) {
                return 'Belum ada berkas.';
            }

            const parts = file.name.split('.');
            const extension = parts.length > 1
                ? parts.pop().toLowerCase()
                : '';

            if (!ALLOWED_EXTENSIONS.includes(extension)) {
                return 'Format tidak diperbolehkan. Pilih PDF, JPG, JPEG, atau PNG.';
            }

            if (file.size > MAX_FILE_SIZE) {
                return 'Ukuran berkas melebihi 2 MB.';
            }

            if (file.size === 0) {
                return 'Berkas kosong. Silakan pilih berkas lain.';
            }

            return '';
        }

        // Menghitung dokumen valid
        function getValidFileCount() {
            return fileInputs.filter(({ input }) => {
                const file = input.files[0];

                return file && validateFile(file) === '';
            }).length;
        }

        // Memperbarui status formulir
        function updateFormState() {
            const oldName = oldDomainInput.value;
            const newName = newDomainInput.value.trim().toLowerCase();

            const nomorSurat = nomorSuratInput.value.trim();
            const tanggalSurat = tanggalSuratInput.value;

            const validOldDomain = oldName !== '';

            const validNewDomain =
                isValidDomainName(newName) &&
                newName !== oldName;

            const validNomorSurat = nomorSurat !== '';

            const today = new Date();
            const localToday = [
                today.getFullYear(),
                String(today.getMonth() + 1).padStart(2, '0'),
                String(today.getDate()).padStart(2, '0')
            ].join('-');

            const validTanggalSurat =
                tanggalSurat !== '' &&
                tanggalSurat <= localToday;

            const validFileCount = getValidFileCount();

            const validFiles = validFileCount === 3;

            uploadCounter.textContent =
                validFileCount + ' dari 3 dokumen valid';

            submitButton.disabled = !(
                validOldDomain &&
                validNewDomain &&
                validNomorSurat &&
                validTanggalSurat &&
                validFiles
            );
        }

        // Perubahan pilihan subdomain lama
        oldDomainInput.addEventListener('change', function () {
            clearMessages();
            updateFormState();
        });

        // Perubahan nama subdomain baru
        newDomainInput.addEventListener('input', function () {
            clearMessages();

            const cursorPosition = newDomainInput.selectionStart;
            const originalValue = newDomainInput.value;
            const normalizedValue = originalValue.toLowerCase();

            if (originalValue !== normalizedValue) {
                newDomainInput.value = normalizedValue;
                newDomainInput.setSelectionRange(
                    cursorPosition,
                    cursorPosition
                );
            }

            updatePreview();
            updateFormState();
        });

        // Perubahan nomor surat
        nomorSuratInput.addEventListener('input', function () {
            clearMessages();
            updateFormState();
        });

        // Perubahan tanggal surat
        tanggalSuratInput.addEventListener('change', function () {
            clearMessages();
            updateFormState();
        });

        // Upload dan validasi dokumen
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
                    input.value = '';

                    status.textContent = error;
                    status.className = 'file-status error';

                    showError(label + ': ' + error);
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

        // Validasi sebelum formulir dikirim
        form.addEventListener('submit', function (event) {
            clearMessages();

            const oldName = oldDomainInput.value;
            const newName = newDomainInput.value.trim().toLowerCase();

            if (!oldName) {
                event.preventDefault();

                showError('Silakan pilih subdomain yang akan diubah.');
                oldDomainInput.focus();

                return;
            }

            if (!isValidDomainName(newName)) {
                event.preventDefault();

                showError(
                    'Nama subdomain baru tidak valid. Gunakan huruf kecil, angka, atau tanda hubung.'
                );

                newDomainInput.focus();
                return;
            }

            if (newName === oldName) {
                event.preventDefault();

                showError(
                    'Nama subdomain baru harus berbeda dari nama subdomain lama.'
                );

                newDomainInput.focus();
                return;
            }

            if (!nomorSuratInput.value.trim()) {
                event.preventDefault();

                showError('Nomor surat permohonan OPD wajib diisi.');
                nomorSuratInput.focus();

                return;
            }

            if (!tanggalSuratInput.value) {
                event.preventDefault();

                showError('Tanggal surat permohonan OPD wajib diisi.');
                tanggalSuratInput.focus();

                return;
            }

            const today = new Date();
            const localToday = [
                today.getFullYear(),
                String(today.getMonth() + 1).padStart(2, '0'),
                String(today.getDate()).padStart(2, '0')
            ].join('-');

            if (tanggalSuratInput.value > localToday) {
                event.preventDefault();

                showError('Tanggal surat tidak boleh melebihi tanggal hari ini.');
                tanggalSuratInput.focus();

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
                'Batalkan pengisian formulir dan kembali ke Dashboard OPD?'
            );

            if (confirmCancel) {
                window.location.href = @json(route('prototype.opd'));
            }
        });

        // Kondisi awal
        updatePreview();
        updateFormState();
    </script>

</body>
</html>
