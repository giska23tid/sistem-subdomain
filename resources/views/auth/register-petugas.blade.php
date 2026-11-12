
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Petugas | Sistem Informasi Subdomain</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
            background: #f1f5f9;
            color: #163b60;
        }

        .register-container {
            width: 100%;
            max-width: 1000px;
            min-height: 610px;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(15, 23, 42, 0.10);
        }

        /* PANEL KIRI */
        .register-left {
            background: linear-gradient(145deg, #123b65, #1769a6);
            color: white;
            padding: 50px 42px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            width: 68px;
            height: 68px;
            border-radius: 16px;
            background: rgba(255,255,255,0.16);
            border: 1px solid rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 33px;
            margin-bottom: 28px;
        }

        .register-left h1 {
            font-size: 27px;
            line-height: 1.4;
            margin-bottom: 17px;
        }

        .register-left p {
            color: #dbeafe;
            line-height: 1.9;
            font-size: 14px;
        }

        .left-footer {
            margin-top: 45px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.2);
            color: #cbdff2;
            font-size: 12px;
            line-height: 1.8;
        }

        /* PANEL KANAN */
        .register-right {
            padding: 48px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .heading-label {
            color: #1769a6;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 9px;
        }

        .register-right h2 {
            color: #163b60;
            font-size: 27px;
            margin-bottom: 9px;
        }

        .subtitle {
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        .field {
            margin-bottom: 17px;
        }

        .field label {
            display: block;
            color: #334155;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .field input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            outline: none;
            background: #fff;
            font-size: 13px;
            transition: 0.2s;
        }

        .field input:focus {
            border-color: #1769a6;
            box-shadow: 0 0 0 3px rgba(23,105,166,0.10);
        }

        .field input::placeholder {
            color: #a0acba;
        }

        .error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
        }

        .error-summary {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 11px 13px;
            border-radius: 8px;
            font-size: 12px;
            margin-bottom: 18px;
            line-height: 1.6;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 11px 13px;
            border-radius: 8px;
            font-size: 12px;
            margin-bottom: 17px;
            line-height: 1.6;
        }

        .register-button {
            width: 100%;
            padding: 14px;
            margin-top: 5px;
            background: #1769a6;
            border: none;
            border-radius: 9px;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .register-button:hover {
            background: #123b65;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #64748b;
        }

        .login-link a,
        .back-link {
            color: #1769a6;
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover,
        .back-link:hover {
            text-decoration: underline;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 14px;
            font-size: 12px;
        }

        .notice {
            margin-top: 20px;
            padding: 12px;
            border-radius: 8px;
            background: #f1f5f9;
            color: #64748b;
            font-size: 11px;
            line-height: 1.7;
        }

        @media (max-width: 750px) {
            .register-container {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .register-left {
                padding: 32px 30px;
            }

            .register-left h1 {
                font-size: 23px;
            }

            .logo {
                width: 58px;
                height: 58px;
                font-size: 28px;
                margin-bottom: 20px;
            }

            .left-footer {
                margin-top: 25px;
            }

            .register-right {
                padding: 35px 30px;
            }
        }

        @media (max-width: 400px) {
            body {
                padding: 14px;
            }

            .register-left {
                padding: 27px 23px;
            }

            .register-right {
                padding: 30px 22px;
            }
        }
    </style>
</head>

<body>

<main class="register-container">

    <!-- PANEL KIRI -->
    <section class="register-left">

        <div class="logo">🏢</div>

        <h1>
            Sistem Informasi Pengelolaan Permohonan
            dan Monitoring Subdomain
        </h1>

        <p>
            Selamat datang di portal pengelolaan sistem.
            Buat akun petugas untuk mengelola permohonan,
            data subdomain, dan monitoring Perangkat Daerah.
        </p>

        <div class="left-footer">
            Dinas Komunikasi, Informatika dan Statistik<br>
            Kabupaten Indragiri Hulu
        </div>

    </section>

    <!-- PANEL KANAN -->
    <section class="register-right">

        <div class="heading-label">Portal Pengelola</div>

        <h2>Registrasi Petugas</h2>

        <p class="subtitle">
            Lengkapi data diri untuk membuat akun petugas
            Diskominfotik.
        </p>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-summary">
                <strong>Pendaftaran belum berhasil.</strong><br>
                Periksa kembali data yang kamu masukkan.
            </div>
        @endif

        <form action="{{ route('register.petugas.submit') }}" method="POST">
            @csrf

            <div class="field">
                <label for="nama">Nama Lengkap</label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                    autocomplete="name"
                    required
                >
                @error('nama')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="nip">NIP</label>
                <input
                    type="text"
                    id="nip"
                    name="nip"
                    value="{{ old('nip') }}"
                    placeholder="Masukkan NIP"
                    autocomplete="off"
                    required
                >
                @error('nip')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email petugas"
                    autocomplete="email"
                    required
                >
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Minimal 8 karakter"
                    autocomplete="new-password"
                    required
                >
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Ulangi password"
                    autocomplete="new-password"
                    required
                >
            </div>

            <button type="submit" class="register-button">
                Daftar Akun Petugas
            </button>

        </form>

        <div class="login-link">
            Sudah memiliki akun?
            <a href="{{ route('login.petugas') }}">Login di sini</a>
        </div>

        <a href="{{ route('pilih-login') }}" class="back-link">
            ← Kembali ke halaman utama
        </a>

        <div class="notice">
            Gunakan email aktif untuk akun petugas.
            Email tersebut akan digunakan untuk login ke sistem.
        </div>

    </section>

</main>

</body>
</html>
