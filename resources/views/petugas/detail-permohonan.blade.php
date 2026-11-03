
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Permohonan | Diskominfotik</title>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f3f6fb;
            color: #26354a;
        }

        .main-content {
            margin-left: 255px;
            min-height: 100vh;
            padding: 22px;
        }

        .breadcrumb {
            font-size: 12px;
            color: #8793a5;
            margin-bottom: 9px;
        }

        .breadcrumb a {
            color: #2854a2;
            text-decoration: none;
        }

        .page-title {
            font-size: 23px;
            color: #172b4d;
            margin-bottom: 6px;
        }

        .page-description {
            color: #77859a;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 22px;
        }

        .content-card {
            background: white;
            border: 1px solid #e5eaf1;
            border-radius: 12px;
            padding: 22px;
            margin-bottom: 20px;
        }

        .card-heading {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 15px;
            margin-bottom: 18px;
            border-bottom: 1px solid #edf0f5;
        }

        .card-heading i {
            color: #2854a2;
            font-size: 19px;
        }

        .card-heading h2 {
            font-size: 16px;
            color: #172b4d;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px 25px;
        }

        .detail-item label {
            display: block;
            color: #8793a5;
            font-size: 11px;
            margin-bottom: 7px;
        }

        .detail-item p {
            color: #26354a;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .detail-item.full {
            grid-column: 1 / -1;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border-radius: 20px;
            padding: 6px 11px;
            font-size: 11px;
            font-weight: 600;
        }

        .status.pending {
            background: #fff0cc;
            color: #a96b00;
        }

        .status.accepted {
            background: #e1f7ec;
            color: #168451;
        }

        .status.rejected {
            background: #ffe8e8;
            color: #c33e3e;
        }

        .document-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .document-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border: 1px solid #e5eaf1;
            border-radius: 9px;
        }

        .document-info {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .document-icon {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border-radius: 9px;
            background: #edf3ff;
            color: #2854a2;
            display: grid;
            place-items: center;
            font-size: 19px;
        }

        .document-name {
            font-size: 12px;
            color: #26354a;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .document-filename {
            font-size: 10px;
            color: #8793a5;
            overflow-wrap: anywhere;
        }

        .document-button {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 11px;
            background: #edf3ff;
            color: #2854a2;
            text-decoration: none;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .document-button:hover {
            background: #dce8ff;
        }

        .alert {
            padding: 13px 15px;
            border-radius: 8px;
            margin-bottom: 17px;
            font-size: 12px;
            line-height: 1.6;
        }

        .alert-success {
            background: #e1f7ec;
            color: #168451;
            border: 1px solid #c6edd8;
        }

        .alert-danger {
            background: #ffe8e8;
            color: #c33e3e;
            border: 1px solid #ffd0d0;
        }

        .decision-description {
            color: #77859a;
            font-size: 12px;
            line-height: 1.7;
            margin-bottom: 17px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            color: #344761;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-group textarea {
            width: 100%;
            min-height: 105px;
            resize: vertical;
            border: 1px solid #dfe5ee;
            border-radius: 8px;
            padding: 12px;
            font-family: inherit;
            font-size: 12px;
            outline: none;
        }

        .form-group textarea:focus {
            border-color: #2854a2;
        }

        .error-text {
            color: #c33e3e;
            font-size: 11px;
            margin-top: 6px;
        }

        .decision-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            border: none;
            border-radius: 8px;
            padding: 11px 17px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        .button-accept {
            background: #168451;
            color: white;
        }

        .button-accept:hover {
            background: #116c41;
        }

        .button-reject {
            background: #c33e3e;
            color: white;
        }

        .button-reject:hover {
            background: #a82f2f;
        }

        .button-back {
            background: #edf1f7;
            color: #526178;
        }

        .button-back:hover {
            background: #e1e7f0;
        }

        .decision-info {
            background: #f3f6fb;
            border-radius: 8px;
            padding: 15px;
            color: #536177;
            font-size: 12px;
            line-height: 1.7;
        }

        .footer {
            text-align: center;
            color: #9aa5b5;
            font-size: 11px;
            padding: 18px 0;
        }

        @media (max-width: 1000px) {
            .main-content {
                margin-left: 220px;
            }
        }

        @media (max-width: 650px) {
            .main-content {
                margin-left: 0;
                padding: 18px 14px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .detail-item.full {
                grid-column: auto;
            }

            .content-card {
                padding: 16px;
            }

            .document-item {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    @include('layouts.sidebar', ['role' => 'petugas'])

    <main class="main-content">

        <div class="breadcrumb">
            <a href="{{ route('petugas.pendaftaran') }}">Permohonan Pendaftaran</a>
            / Detail Permohonan
        </div>

        <h1 class="page-title">Detail Permohonan</h1>

        <p class="page-description">
            Periksa informasi dan dokumen persyaratan sebelum memberikan keputusan.
        </p>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul style="margin: 7px 0 0 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- INFORMASI PERMOHONAN --}}
        <section class="content-card">

            <div class="card-heading">
                <i class="bi bi-file-earmark-text"></i>
                <h2>Informasi Permohonan</h2>
            </div>

            <div class="detail-grid">

                <div class="detail-item">
                    <label>ID Permohonan</label>
                    <p>PD-{{ str_pad($permohonan->id, 4, '0', STR_PAD_LEFT) }}</p>
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
                    <label>Status Permohonan</label>

                    @if ($permohonan->status === 'diajukan')
                        <span class="status pending">
                            <i class="bi bi-clock"></i> Diajukan
                        </span>
                    @elseif ($permohonan->status === 'diterima')
                        <span class="status accepted">
                            <i class="bi bi-check-circle"></i> Diterima
                        </span>
                    @elseif ($permohonan->status === 'ditolak')
                        <span class="status rejected">
                            <i class="bi bi-x-circle"></i> Ditolak
                        </span>
                    @endif
                </div>

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
                        <p style="color: #c33e3e; font-weight: 400;">
                            {{ $permohonan->catatan ?? '-' }}
                        </p>
                    </div>
                @endif

            </div>
        </section>

        {{-- DOKUMEN PERSYARATAN --}}
        <section class="content-card">

            <div class="card-heading">
                <i class="bi bi-folder2-open"></i>
                <h2>Dokumen Persyaratan Pasal 33</h2>
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
                        $dokumen = $permohonan->dokumens->firstWhere('jenis_dokumen', $jenis);
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

                        @if ($dokumen)
                            <a
                                href="{{ asset('storage/' . $dokumen->path_file) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="document-button"
                            >
                                <i class="bi bi-eye"></i>
                                Lihat Dokumen
                            </a>
                        @else
                            <span class="status rejected">
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
                <i class="bi bi-clipboard-check"></i>
                <h2>Keputusan Petugas</h2>
            </div>

            @if ($permohonan->status === 'diajukan')

                <p class="decision-description">
                    Pastikan seluruh informasi dan dokumen persyaratan telah diperiksa.
                    Petugas dapat menerima atau menolak permohonan berdasarkan hasil pemeriksaan.
                </p>

                <form
                    action="{{ route('petugas.permohonan.terima', $permohonan->id) }}"
                    method="POST"
                    onsubmit="return confirm('Apakah kamu yakin ingin menerima permohonan ini?')"
                    style="margin-bottom: 20px;"
                >
                    @csrf

                    <button type="submit" class="button button-accept">
                        <i class="bi bi-check-circle"></i>
                        Terima Permohonan
                    </button>
                </form>

                <form
                    action="{{ route('petugas.permohonan.tolak', $permohonan->id) }}"
                    method="POST"
                    onsubmit="return confirm('Apakah kamu yakin ingin menolak permohonan ini?')"
                >
                    @csrf

                    <div class="form-group">
                        <label for="catatan">Alasan Penolakan</label>

                        <textarea
                            name="catatan"
                            id="catatan"
                            maxlength="2000"
                            placeholder="Tuliskan alasan penolakan permohonan..."
                            required
                        >{{ old('catatan') }}</textarea>

                        @error('catatan')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="button button-reject">
                        <i class="bi bi-x-circle"></i>
                        Tolak Permohonan
                    </button>

                </form>

            @elseif ($permohonan->status === 'diterima')

                <div class="decision-info">
                    <i class="bi bi-check-circle"></i>
                    Permohonan telah diterima. Data subdomain sudah tercatat
                    dalam sistem dan tidak dapat diproses kembali.
                </div>

            @elseif ($permohonan->status === 'ditolak')

                <div class="decision-info">
                    <i class="bi bi-info-circle"></i>
                    Permohonan telah ditolak. Alasan penolakan sudah tercatat
                    dan tidak dapat diproses kembali.
                </div>

            @endif

        </section>

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
