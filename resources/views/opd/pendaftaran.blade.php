<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajukan Pendaftaran Subdomain</title>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
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

        button,
        input,
        textarea {
            font-family: inherit;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        /* KONTEN UTAMA */
        .main-content {
            margin-left: 240px;
            min-height: 100vh;
            padding: 30px 35px 40px;
            box-sizing: border-box;
        }

        /* HEADER HALAMAN */
        .page-header {
            margin-bottom: 13px;
        }

        .page-header h1 {
            font-size: 21px;
            line-height: 1.3;
            margin-bottom: 4px;
            color: #10264a;
        }

        .page-header p {
            max-width: 570px;
            font-size: 11px;
            line-height: 1.6;
            color: #64748b;
        }

        /* KARTU FORMULIR */
        .form-card {
            width: 100%;
            max-width: 850px;
            margin: 25px auto 0;
            background: white;
            border: 1px solid #dfe6f0;
            border-radius: 12px;
            padding: 28px 30px;
            box-shadow: 0 4px 15px rgba(16, 38, 74, 0.04);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            font-size: 11px;
            margin-bottom: 5px;
        }

        .input-control {
            display: block;
            width: 100%;
            border: 1px solid #cbd5e5;
            border-radius: 7px;
            background: white;
            padding: 13px 14px;
            color: #10264a;
            font-size: 12px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .input-control:focus {
            border-color: #2854a2;
            box-shadow: 0 0 0 2px rgba(40, 84, 162, 0.08);
        }

        .input-control::placeholder {
            color: #94a3b8;
        }

        .domain-input-row {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .domain-input-row input {
            min-width: 0;
            flex: 1;
        }

        .domain-suffix {
            flex-shrink: 0;
            white-space: nowrap;
            font-size: 11px;
            color: #304461;
        }

        textarea.input-control {
            min-height: 110px;
            resize: vertical;
            line-height: 1.6;
        }

        /* JUDUL DOKUMEN */
        .document-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 8px;
        }

        .document-heading .form-label {
            margin-bottom: 0;
        }

        .upload-counter {
            font-size: 10px;
            color: #64748b;
            white-space: nowrap;
        }

        /* ITEM DOKUMEN */
        .document-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 10px;
            margin-bottom: 7px;
            border: 1px solid #dfe6f0;
            border-radius: 7px;
        }

        .document-info {
            min-width: 0;
            flex: 1;
        }

        .document-title {
            font-size: 11px;
            line-height: 1.5;
            margin-bottom: 3px;
        }

        .file-status {
            display: block;
            font-size: 10px;
            color: #64748b;
            overflow-wrap: anywhere;
            line-height: 1.5;
        }

        .file-status.selected {
            color: #087d50;
        }

        .file-status.error {
            color: #c52f38;
        }

        /* TOMBOL PILIH BERKAS */
        .file-button {
            position: relative;
            flex-shrink: 0;
        }

        .file-button label {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-width: 85px;
            padding: 8px 10px;
            border: 1px solid #2854a2;
            border-radius: 6px;
            color: #2854a2;
            background: white;
            font-size: 10px;
            cursor: pointer;
        }

        .file-button label:hover {
            background: #edf3ff;
        }

        .file-button input[type="file"] {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
            overflow: hidden;
        }

        .file-button input[type="file"]:focus-visible + label {
            outline: 2px solid #2854a2;
            outline-offset: 2px;
        }

        .file-note {
            color: #64748b;
            font-size: 9px;
            line-height: 1.6;
            margin-top: 8px;
        }

        /* PESAN VALIDASI */
        .error-message,
        .success-message {
            display: none;
            margin-top: 8px;
            padding: 10px;
            border-radius: 6px;
            font-size: 11px;
            line-height: 1.5;
        }

        .error-message {
            background: #fff0f0;
            color: #b4232c;
        }

        .success-message {
            background: #e6f8ef;
            color: #087d50;
        }

        /* TOMBOL FORMULIR */
        .form-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 16px;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 34px;
            padding: 9px 13px;
            border: 1px solid #cbd5e5;
            border-radius: 6px;
            background: white;
            color: #10264a;
            font-size: 10px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn-primary {
            color: white;
            background: #2854a2;
            border-color: #2854a2;
        }

        .btn-primary:hover:not(:disabled) {
            background: #1d427f;
        }

        .btn-primary:disabled {
            color: #64748b;
            background: #e2e8f0;
            border-color: #cbd5e1;
            cursor: not-allowed;
        }

        .btn-secondary:hover {
            background: #f3f5f9;
        }

        .action-note {
            font-size: 10px;
            color: #64748b;
            line-height: 1.5;
        }

        /* TABLET DAN LAPTOP KECIL */
        @media (max-width: 1000px) {
            .main-content {
                padding: 25px 20px 30px;
            }

            .form-card {
                padding: 24px 22px;
            }
        }

        /* LAYAR KECIL */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 210px;
                width: calc(100% - 210px);
                padding: 20px 15px;
            }

            .form-card {
                padding: 20px 16px;
            }

            .document-item {
                align-items: flex-start;
            }

            .form-actions {
                align-items: flex-start;
            }

            .action-note {
                width: 100%;
            }
        }

        /* PONSEL */
        @media (max-width: 480px) {
            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 16px 12px;
            }

            .form-card {
                margin-top: 18px;
                padding: 16px 12px;
            }

            .domain-input-row {
                align-items: flex-start;
                flex-direction: column;
            }

            .domain-input-row input {
                width: 100%;
            }

            .document-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .document-item {
                flex-direction: column;
                align-items: stretch;
            }

            .file-button label {
                width: 100%;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .form-actions .btn {
                width: 100%;
            }

            .action-note {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', ['role' => 'opd'])

    {{-- KONTEN PENDAFTARAN --}}
    <main class="main-content">

        <header class="page-header">
            <h1>Ajukan Pendaftaran Subdomain</h1>

            <p>
                Isi nama subdomain yang diinginkan dan unggah dokumen persyaratan
                sesuai Pasal 33. Pengajuan dilakukan atas sepengetahuan dan
                persetujuan Kepala Perangkat Daerah.
            </p>
        </header>

        <section class="form-card">

            <form id="registrationForm"
                    action="{{ route('opd.permohonan.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                @csrf

                {{-- NAMA SUBDOMAIN --}}
                <div class="form-group">

                    <label for="subdomain" class="form-label">
                        Nama subdomain yang diajukan
                    </label>

                    <div class="domain-input-row">

                        <input
                            type="text"
                            id="subdomain"
                            name="subdomain"
                            class="input-control"
                            placeholder="Contoh: perpustakaan"
                            maxlength="50"
                            autocomplete="off"
                            aria-describedby="subdomainHelp"
                            required
                        >

                        <span class="domain-suffix">.inhukab.go.id</span>

                    </div>

                    <p class="file-note" id="subdomainHelp">
                        Gunakan huruf kecil, angka, atau tanda hubung. Nama tidak boleh
                        diawali atau diakhiri tanda hubung.
                    </p>

                </div>

                {{-- KEGUNAAN LAYANAN --}}
                <div class="form-group">

                    <label for="kegunaan" class="form-label">
                        Kegunaan layanan
                    </label>

                    <textarea
                        id="kegunaan"
                        name="kegunaan"
                        class="input-control"
                        placeholder="Jelaskan singkat website atau layanan yang akan memakai subdomain ini."
                        maxlength="1000"
                        required
                    ></textarea>

                </div>

                {{-- DOKUMEN PERSYARATAN --}}
                <div class="form-group">

                    <div class="document-heading">

                        <p class="form-label">
                            Dokumen persyaratan (Pasal 33)
                        </p>

                        <span class="upload-counter" id="uploadCounter">
                            0 dari 3 dokumen valid
                        </span>

                    </div>

                    {{-- DOKUMEN 1 --}}
                    <div class="document-item">

                        <div class="document-info">
                            <p class="document-title">
                                Surat permohonan nama subdomain Perangkat Daerah
                            </p>

                            <span class="file-status" id="statusSurat">
                                Belum ada berkas
                            </span>
                        </div>

                        <div class="file-button">
                            <input
                                type="file"
                                id="surat"
                                name="surat"
                                accept=".pdf,.jpg,.jpeg,.png"
                                aria-label="Unggah surat permohonan nama subdomain"
                                required
                            >

                            <label for="surat">Pilih berkas</label>
                        </div>

                    </div>

                    {{-- DOKUMEN 2 --}}
                    <div class="document-item">

                        <div class="document-info">
                            <p class="document-title">
                                Surat penunjukan pengelola subdomain
                            </p>

                            <span class="file-status" id="statusPengelola">
                                Belum ada berkas
                            </span>
                        </div>

                        <div class="file-button">
                            <input
                                type="file"
                                id="pengelola"
                                name="pengelola"
                                accept=".pdf,.jpg,.jpeg,.png"
                                aria-label="Unggah surat penunjukan pengelola subdomain"
                                required
                            >

                            <label for="pengelola">Pilih berkas</label>
                        </div>

                    </div>

                    {{-- DOKUMEN 3 --}}
                    <div class="document-item">

                        <div class="document-info">
                            <p class="document-title">
                                Kartu Aparatur Sipil Negara (ASN)
                            </p>

                            <span class="file-status" id="statusAsn">
                                Belum ada berkas
                            </span>
                        </div>

                        <div class="file-button">
                            <input
                                type="file"
                                id="asn"
                                name="asn"
                                accept=".pdf,.jpg,.jpeg,.png"
                                aria-label="Unggah fotokopi kartu ASN"
                                required
                            >

                            <label for="asn">Pilih berkas</label>
                        </div>

                    </div>

                    <p class="file-note">
                        Format berkas yang diperbolehkan: PDF, JPG, atau PNG.
                        Ukuran maksimal 2 MB untuk setiap dokumen.
                    </p>

                    
                {{-- Pesan kesalahan validasi dari Laravel --}}
                @if ($errors->any())
                    <div
                        class="error-message"
                        id="errorMessage"
                        role="alert"
                        aria-live="polite"
                        style="display: block;"
                    >
                        <strong>Permohonan belum dapat dikirim:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div
                        class="error-message"
                        id="errorMessage"
                        role="alert"
                        aria-live="polite"
                        style="display: none;"
                    ></div>
                @endif

                {{-- Pesan berhasil dari Laravel --}}
                @if (session('success'))
                    <div
                        class="success-message"
                        id="successMessage"
                        role="status"
                        aria-live="polite"
                        style="display: block;"
                    >
                        {{ session('success') }}
                    </div>
                @else
                    <div
                        class="success-message"
                        id="successMessage"
                        role="status"
                        aria-live="polite"
                        style="display: none;"
                    ></div>
                @endif


                </div>

                {{-- TOMBOL --}}
                <div class="form-actions">

                    <button
                        type="submit"
                        class="btn btn-primary"
                        id="submitButton"
                        disabled
                    >
                        Kirim permohonan
                    </button>

                    <button
                        type="button"
                        class="btn btn-secondary"
                        id="cancelButton"
                    >
                        Batal
                    </button>

                    <span class="action-note">
                        Lengkapi nama subdomain dan ketiga dokumen Pasal 33.
                    </span>

                </div>

            </form>

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
        const subdomainInput = document.getElementById('subdomain');
        const kegunaanInput = document.getElementById('kegunaan');
        const uploadCounter = document.getElementById('uploadCounter');
        const submitButton = document.getElementById('submitButton');
        const errorMessage = document.getElementById('errorMessage');
        const successMessage = document.getElementById('successMessage');
        const cancelButton = document.getElementById('cancelButton');

        /*
        * Validasi format nama subdomain:
        * - Maksimal 50 karakter.
        * - Hanya huruf kecil, angka, dan tanda hubung.
        * - Tidak boleh diawali atau diakhiri tanda hubung.
        */
        function isValidSubdomain(value) {
            return /^[a-z0-9](?:[a-z0-9-]{0,48}[a-z0-9])?$/.test(value);
        }

        function showError(message) {
            errorMessage.textContent = message;
            errorMessage.style.display = 'block';

            successMessage.textContent = '';
            successMessage.style.display = 'none';
        }

        function clearMessages() {
            errorMessage.textContent = '';
            errorMessage.style.display = 'none';

            successMessage.textContent = '';
            successMessage.style.display = 'none';
        }

        function getFileExtension(filename) {
            const parts = filename.split('.');

            return parts.length > 1
                ? parts.pop().toLowerCase()
                : '';
        }

        function validateFile(file) {
            if (!file) {
                return 'Belum ada berkas.';
            }

            const extension = getFileExtension(file.name);

            if (!allowedExtensions.includes(extension)) {
                return 'Format tidak diperbolehkan. Pilih PDF, JPG, atau PNG.';
            }

            if (file.size > MAX_FILE_SIZE) {
                return 'Ukuran berkas melebihi 2 MB. Silakan pilih berkas lain.';
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

        function updateFormState() {
            const count = getValidFileCount();

            uploadCounter.textContent = count + ' dari 3 dokumen valid';

            const subdomain = subdomainInput.value.trim().toLowerCase();
            const validSubdomain =
                subdomain.length <= 50 && isValidSubdomain(subdomain);

            const validKegunaan =
                kegunaanInput.value.trim().length > 0;

            const allFilesValid = fileInputs.every(({ input }) => {
                const file = input.files[0];

                return file && validateFile(file) === '';
            });

            submitButton.disabled = !(
                validSubdomain &&
                validKegunaan &&
                allFilesValid
            );
        }

        // Validasi setiap dokumen ketika berkas dipilih.
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

                    // Hapus berkas yang tidak valid.
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

        // Periksa nama subdomain ketika pengguna mengetik.
        subdomainInput.addEventListener('input', function () {
            clearMessages();
            updateFormState();
        });

        // Periksa kegunaan layanan ketika pengguna mengetik.
        kegunaanInput.addEventListener('input', function () {
            clearMessages();
            updateFormState();
        });

        // Validasi ketika formulir dikirim.
        form.addEventListener('submit', function (event) {
            clearMessages();

            const subdomain =
                subdomainInput.value.trim().toLowerCase();

            const kegunaan =
                kegunaanInput.value.trim();

            if (
                !isValidSubdomain(subdomain) ||
                subdomain.length > 50
            ) {
                event.preventDefault();

                showError(
                    'Nama subdomain wajib diisi dengan huruf kecil, angka, ' +
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

            /*
            * Jika seluruh validasi berhasil,
            * formulir akan dikirim ke controller Laravel.
            */
            submitButton.disabled = true;
            submitButton.textContent = 'Mengirim permohonan...';
        });

        // Tombol batal mengosongkan formulir dan kembali ke dashboard.
        cancelButton.addEventListener('click', function () {
            const confirmCancel = confirm(
                'Batalkan pengisian formulir dan hapus semua data yang sudah dimasukkan?'
            );

            if (!confirmCancel) {
                return;
            }

            form.reset();

            fileInputs.forEach(({ status }) => {
                status.textContent = 'Belum ada berkas';
                status.className = 'file-status';
            });

            clearMessages();
            updateFormState();

            window.location.href = @json(route('prototype.opd'));
        });

        // Kondisi awal formulir.
        updateFormState();
    </script>


</body>
</html>