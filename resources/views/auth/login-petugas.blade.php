
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Petugas | Sistem Informasi Subdomain</title>

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
        }

        .login-container {
            width: 100%;
            max-width: 1000px;
            min-height: 570px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(15, 23, 42, 0.10);
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
            color: #64748b;
        }

        .register-link a {
            color: #1769a6;
            font-weight: 600;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .login-left {
            background: linear-gradient(145deg, #123b65, #1769a6);
            color: white;
            padding: 55px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            width: 65px;
            height: 65px;
            border-radius: 15px;
            background: rgba(255,255,255,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 30px;
        }

        .login-left h1 {
            font-size: 29px;
            line-height: 1.4;
            margin-bottom: 18px;
        }

        .login-left p {
            color: #dbeafe;
            line-height: 1.8;
            font-size: 14px;
        }

        .left-footer {
            margin-top: 55px;
            font-size: 12px;
            color: #cbdff2;
        }

        .login-right {
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-right h2 {
            color: #163b60;
            font-size: 27px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 32px;
            line-height: 1.6;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .field {
            margin-bottom: 21px;
        }

        .field label {
            display: block;
            color: #334155;
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 9px;
        }

        .field input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .field input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.10);
        }

        .login-button {
            width: 100%;
            padding: 14px;
            background: #1769a6;
            border: none;
            border-radius: 9px;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
            margin-top: 5px;
        }

        .login-button:hover {
            background: #123b65;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #1769a6;
            font-weight: 600;
            text-decoration: none;
            font-size: 13px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 750px) {
            .login-container {
                grid-template-columns: 1fr;
            }

            .login-left {
                padding: 35px 30px;
            }

            .login-left h1 {
                font-size: 23px;
            }

            .left-footer {
                margin-top: 25px;
            }

            .login-right {
                padding: 40px 30px;
            }
        }
    </style>
</head>

<body>

<div class="login-container">

    <!-- BAGIAN KIRI -->
    <div class="login-left">

        <div class="logo">🏛️</div>

        <h1>Sistem Informasi Pengelolaan Permohonan dan Monitoring Subdomain</h1>

        <p>
            Portal khusus petugas Dinas Komunikasi, Informatika
            dan Statistik untuk mengelola permohonan, memeriksa
            persyaratan, serta melakukan monitoring subdomain
            Perangkat Daerah.
        </p>

        <div class="left-footer">
            Panel Administrasi Petugas Diskominfotik
        </div>

    </div>

    <!-- BAGIAN KANAN -->
    <div class="login-right">

        <h2>Login Petugas</h2>

        <p class="subtitle">
            Silakan masuk menggunakan email dan password
            akun petugas yang telah terdaftar.
        </p>

        <!-- NOTIFIKASI -->
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <!-- PESAN KESALAHAN -->
        @if ($errors->any())
            <div class="error-box">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.petugas.submit') }}" method="POST">
            @csrf

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
            </div>

            <div class="field">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <button type="submit" class="login-button">
                Masuk ke Dashboard
            </button>

        </form>

        <div class="register-link">
            Belum memiliki akun petugas?
            <a href="{{ route('register.petugas') }}">Daftar Petugas</a>
        </div>

        <a href="{{ route('pilih-login') }}" class="back-link">
            ← Kembali ke halaman utama
        </a>

    </div>

</div>

</body>
</html>
