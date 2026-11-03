
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
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            background: #f3f5f9;
            color: #10264a;
        }

        button, input, select {
            font-family: inherit;
        }

        .main-content {
            margin-left: 240px;
            width: calc(100% - 240px);
            min-height: 100vh;
            padding: 30px 35px 40px;
        }

        .page-header {
            margin-bottom: 13px;
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

        .form-card {
            width: 100%;
            max-width: 850px;
            margin: 25px auto 0;
            background: #fff;
            border: 1px solid #dfe6f0;
            border-radius: 12px;
            padding: 28px 30px;
            box-shadow: 0 4px 15px rgba(16, 38, 74, 0.04);
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            font-size: 11px;
            margin-bottom: 8px;
        }

        .input-control {
            width: 100%;
            min-width: 0;
            border: 1px solid #cbd5e5;
            border-radius: 7px;
            background: #fff;
            padding: 12px 14px;
            color: #10264a;
            font-size: 12px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .input-control:focus {
            border-color: #2854a2;
            box-shadow: 0 0 0 2px rgba(40, 84, 162, .08);
        }

        .input-control::placeholder {
            color: #94a3b8;
        }

        select.input-control {
            cursor: pointer;
        }

        .field-help {
            display: block;
            color: #64748b;
            font-size: 10px;
            line-height: 1.6;
            margin-top: 6px;
        }

        .domain-input-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .domain-suffix {
            flex-shrink: 0;
            white-space: nowrap;
            font-size: 11px;
            color: #475569;
        }

        .domain-preview {
            margin-top: 10px;
            padding: 13px 14px;
            background: #f3f6fb;
            border: 1px solid #e1e8f2;
            border-radius: 7px;
            font-size: 11px;
            color: #64748b;
            overflow-wrap: anywhere;
        }

        .domain-preview strong {
            display: block;
            margin-top: 5px;
            font-size: 13px;
            color: #10264a;
        }

        .document-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 10px;
        }

        .document-heading .form-label {
            margin-bottom: 0;
        }

        .upload-counter {
            font-size: 10px;
            color: #64748b;
            white-space: nowrap;
        }

        .document-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 13px;
            margin-bottom: 9px;
            border: 1px solid #dfe6f0;
            border-radius: 7px;
        }

        .document-info {
            min-width: 0;
        }

        .document-title {
            font-size: 11px;
            line-height: 1.6;
            margin-bottom: 4px;
            color: #10264a;
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

        .file-button {
            position: relative;
            flex-shrink: 0;
        }

        .file-button label {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-width: 90px;
            padding: 9px 11px;
            border: 1px solid #2854a2;
            border-radius: 6px;
            color: #2854a2;
            background: #fff;
            font-size: 10px;
            cursor: pointer;
            transition: background .2s;
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
            font-size: 10px;
            line-height: 1.7;
            margin-top: 10px;
        }

        .error-message,
        .success-message {
            display: none;
            margin-top: 12px;
            padding: 11px 12px;
            border-radius: 6px;
            font-size: 11px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .error-message {
            background: #fff0f0;
            color: #b4232c;
            border: 1px solid #f5cccc;
        }

        .success-message {
            background: #e6f8ef;
            color: #087d50;
            border: 1px solid #b9e9d0;
        }

        .form-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 24px;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 38px;
            padding: 10px 16px;
            border: 1px solid #cbd5e5;
            border-radius: 6px;
            background: #fff;
            color: #10264a;
            font-size: 11px;
            cursor: pointer;
            transition: background .2s;
        }

        .btn-primary {
            color: #fff;
            background: #2854a2;
            border-color: #2854a2;
        }

        .btn-primary:hover:not(:disabled) {
            background: #1d427f;
        }

        .btn-primary:disabled {
            color: #64748b;
            background: #e2e8f0;
            border-color: #e2e8f0;
            cursor: not-allowed;
        }

        .btn-secondary:hover {
            background: #f3f5f9;
        }

        .action-note {
            flex: 1 1 100%;
            font-size: 10px;
            color: #64748b;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 210px;
                width: calc(100% - 210px);
                padding: 22px 16px 30px;
            }

            .form-card {
                padding: 22px 18px;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 18px 12px 25px;
            }

            .page-header h1 {
                font-size: 19px;
            }

            .form-card {
                padding: 18px 14px;
                margin-top: 18px;
            }

            .domain-input-group {
                align-items: stretch;
                flex-direction: column;
            }

            .domain-suffix {
                white-space: normal;
                font-size: 11px;
            }

            .document-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .document-item {
                align-items: flex-start;
            }

            .file-button label {
                min-width: 78px;
                padding: 9px 8px;
            }

            .form-actions {
                align-items: stretch;
            }

            .form-actions .btn {
                flex: 1 1 auto;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', ['role' => 'opd'])

    <main class="main-content">

        <header class="page-header">
            <h1>Ajukan Perubahan Nama Subdomain</h1>

            <p>
                Pilih subdomain yang akan diubah, masukkan nama subdomain baru,
                dan unggah dokumen persyaratan sesuai Pasal 35. Pengajuan dilakukan
                atas sepengetahuan dan persetujuan Kepala Perangkat Daerah.
            </p>
        </header>

        <section class="form-card">

            @if (session('success'))
                <div class="success-message" style="display:block;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="error-message" style="display:block;">
                    <ul style="padding-left:18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                id="changeForm"
                action="{{ route('opd.permohonan.perubahan.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="form-group">

                    <label for="subdomainLama" class="form-label">
                        Subdomain yang akan diubah
                    </label>

                    <select
                        id="subdomainLama"
                        name="subdomain_lama"
                        class="input-control"
                        required
                    >
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

                    <span class="field-help">
                        Pilih subdomain aktif yang terdaftar pada OPD kamu.
                    </span>

                </div>

                <div class="form-group">

                    <label for="subdomainBaru" class="form-label">
                        Nama subdomain baru yang diajukan
                    </label>

                    <div class="domain-input-group">

                        <input
                            type="text"
                            id="subdomainBaru"
                            name="subdomain_baru"
                            class="input-control"
                            placeholder="Contoh: disdik"
                            maxlength="50"
                            autocomplete="off"
                            value="{{ old('subdomain_baru') }}"
                            required
                        >

                        <span class="domain-suffix">
                            .inhukab.go.id
                        </span>

                    </div>

                    <span class="field-help">
                        Masukkan nama baru tanpa akhiran .contoh.go.id.
                        Gunakan huruf kecil, angka, atau tanda hubung.
                        Nama tidak boleh diawali atau diakhiri tanda hubung.
                    </span>

                    <div class="domain-preview">
                        Subdomain baru yang diajukan:
                        <strong id="previewDomain">Belum diisi</strong>
                    </div>

                </div>

                <div class="form-group">

                    <div class="document-heading">

                        <label class="form-label">
                            Dokumen persyaratan (Pasal 35)
                        </label>

                        <span class="upload-counter" id="uploadCounter">
                            0 dari 3 dokumen terunggah
                        </span>

                    </div>

                    <div class="document-item">

                        <div class="document-info">
                            <p class="document-title">
                                Surat permohonan perubahan nama subdomain
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
                                accept=".pdf,.jpg,.jpeg,.png,application/pdf,image/jpeg,image/png"
                                required
                            >

                            <label for="surat">Pilih berkas</label>
                        </div>

                    </div>

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
                                accept=".pdf,.jpg,.jpeg,.png,application/pdf,image/jpeg,image/png"
                                required
                            >

                            <label for="pengelola">Pilih berkas</label>
                        </div>

                    </div>

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
                                accept=".pdf,.jpg,.jpeg,.png,application/pdf,image/jpeg,image/png"
                                required
                            >

                            <label for="asn">Pilih berkas</label>
                        </div>

                    </div>

                    <p class="file-note">
                        Format berkas yang diperbolehkan: PDF, JPG, JPEG, atau PNG.
                        Ukuran maksimal 2 MB untuk setiap dokumen.
                    </p>

                    <div
                        class="error-message"
                        id="errorMessage"
                        role="alert"
                        aria-live="polite"
                    ></div>

                    <div
                        class="success-message"
                        id="successMessage"
                        role="status"
                        aria-live="polite"
                    ></div>

                </div>

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
                        Pastikan subdomain yang dipilih benar dan ketiga dokumen
                        persyaratan sudah sesuai sebelum mengirim permohonan.
                    </span>

                </div>

            </form>

        </section>

    </main>

    <script>
        const MAX_FILE_SIZE = 2 * 1024 * 1024;
        const ALLOWED_EXTENSIONS = ['pdf', 'jpg', 'jpeg', 'png'];

        const form = document.getElementById('changeForm');
        const oldDomainInput = document.getElementById('subdomainLama');
        const newDomainInput = document.getElementById('subdomainBaru');

        const previewDomain = document.getElementById('previewDomain');
        const uploadCounter = document.getElementById('uploadCounter');
        const submitButton = document.getElementById('submitButton');

        const errorMessage = document.getElementById('errorMessage');
        const successMessage = document.getElementById('successMessage');

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

        function isValidDomainName(value) {
            return /^[a-z0-9](?:[a-z0-9-]{0,48}[a-z0-9])?$/.test(value);
        }

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
                return 'Ukuran berkas melebihi 2 MB. Silakan pilih berkas lain.';
            }

            if (file.size === 0) {
                return 'Berkas kosong. Silakan pilih berkas lain.';
            }

            return '';
        }

        function updatePreview() {
            const newName = newDomainInput.value.trim().toLowerCase();

            if (newName && isValidDomainName(newName)) {
                previewDomain.textContent = newName + '.contoh.go.id';
            } else {
                previewDomain.textContent = 'Belum diisi';
            }
        }

        function updateFormState() {
            const oldName = oldDomainInput.value;
            const newName = newDomainInput.value.trim().toLowerCase();

            const validOldDomain = oldName !== '';

            const validNewDomain =
                isValidDomainName(newName) &&
                newName !== oldName;

            const validFileCount = fileInputs.filter(({ input }) => {
                return input.files[0] &&
                    validateFile(input.files[0]) === '';
            }).length;

            const validFiles = validFileCount === fileInputs.length;

            uploadCounter.textContent =
                validFileCount + ' dari 3 dokumen terunggah';

            submitButton.disabled = !(
                validOldDomain &&
                validNewDomain &&
                validFiles
            );
        }

        oldDomainInput.addEventListener('change', function () {
            clearMessages();
            updateFormState();
        });

        newDomainInput.addEventListener('input', function () {
            clearMessages();
            updatePreview();
            updateFormState();
        });

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
                        (file.size / 1024).toFixed(1) + ' KB)';

                    status.className = 'file-status selected';
                }

                updateFormState();
            });
        });

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
            submitButton.textContent = 'Mengirim permohonan...';
        });

        cancelButton.addEventListener('click', function () {
            const confirmCancel = confirm(
                'Batalkan pengisian formulir dan kembali ke Dashboard OPD?'
            );

            if (confirmCancel) {
                window.location.href = @json(route('prototype.opd'));
            }
        });

        updatePreview();
        updateFormState();
    </script>

</body>
</html>
