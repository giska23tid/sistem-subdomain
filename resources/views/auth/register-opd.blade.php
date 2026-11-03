
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi OPD</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            color: #24344d;
        }

        .register-card {
            width: 100%;
            max-width: 480px;
            padding: 36px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 35px rgba(21, 43, 77, 0.10);
        }

        .logo {
            width: 60px;
            height: 60px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            background: #eaf0fc;
            color: #2854a2;
            font-size: 25px;
            font-weight: bold;
        }

        h1 {
            margin: 0 0 10px;
            text-align: center;
            color: #152b4d;
            font-size: 24px;
        }

        .subtitle {
            margin: 0 0 26px;
            text-align: center;
            color: #778397;
            font-size: 13px;
            line-height: 1.6;
        }

        .field {
            margin-bottom: 17px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #dce3ee;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: #2854a2;
            box-shadow: 0 0 0 3px rgba(40, 84, 162, 0.10);
        }

        .register-button {
            width: 100%;
            margin-top: 8px;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #152b4d;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .register-button:hover {
            background: #2854a2;
        }

        .login-link {
            margin-top: 20px;
            text-align: center;
            color: #778397;
            font-size: 12px;
            line-height: 1.8;
        }

        .login-link a {
            color: #2854a2;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .notice {
            margin-top: 22px;
            padding: 12px;
            border-radius: 8px;
            background: #f3f6fb;
            color: #778397;
            font-size: 11px;
            line-height: 1.6;
        }

        .error {
            margin-top: 6px;
            color: #c62828;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            .register-card {
                padding: 26px 22px;
            }
        }
    </style>
</head>

<body>
    <main class="register-card">
        <div class="logo">D</div>

        <h1>Registrasi OPD</h1>

        <p class="subtitle">
            Diskominfotik Kabupaten Indragiri Hulu
            <br>
            Buat akun untuk mengajukan dan memantau permohonan subdomain instansi.
        </p>

        @if ($errors->any())
            <div class="error" style="margin-bottom: 16px;">
                Periksa kembali data yang kamu masukkan.
            </div>
        @endif

        <form action="{{ route('register.opd.submit') }}" method="POST">
            @csrf

            <div class="field">
                <label for="nama_instansi">Nama Instansi / OPD</label>
                <input
                    type="text"
                    id="nama_instansi"
                    name="nama_instansi"
                    value="{{ old('nama_instansi') }}"
                    placeholder="Contoh: Dinas Komunikasi dan Informatika"
                    autocomplete="organization"
                    required
                >
                @error('nama_instansi')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="nama_penanggung_jawab">Nama Penanggung Jawab</label>
                <input
                    type="text"
                    id="nama_penanggung_jawab"
                    name="nama_penanggung_jawab"
                    value="{{ old('nama_penanggung_jawab') }}"
                    placeholder="Masukkan nama lengkap"
                    autocomplete="name"
                    required
                >
                @error('nama_penanggung_jawab')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="nip">NIP Penanggung Jawab</label>
                <input
                    type="text"
                    id="nip"
                    name="nip"
                    value="{{ old('nip') }}"
                    placeholder="Masukkan NIP"
                    inputmode="numeric"
                    required
                >
                @error('nip')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Buat username"
                    autocomplete="username"
                    required
                >
                @error('username')
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
                Daftar Akun OPD
            </button>
        </form>

        <div class="login-link">
            Sudah memiliki akun?
            <a href="{{ route('login.opd') }}">Login di sini</a>
        </div>

        <div class="notice">
            Halaman ini masih berupa prototype. Data registrasi belum
            disimpan ke database dan belum dapat digunakan untuk login sungguhan.
        </div>
    </main>
</body>
</html>
