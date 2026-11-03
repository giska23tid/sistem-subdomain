
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Petugas Diskominfotik</title>

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

        .login-card {
            width: 100%;
            max-width: 430px;
            background: #ffffff;
            padding: 38px;
            border-radius: 16px;
            box-shadow: 0 10px 35px rgba(21, 43, 77, 0.10);
        }

        .logo {
            width: 64px;
            height: 64px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: #eaf0fc;
            color: #2854a2;
            font-size: 27px;
            font-weight: bold;
        }

        h1 {
            margin: 0 0 10px;
            text-align: center;
            font-size: 24px;
            color: #152b4d;
        }

        .subtitle {
            margin: 0 0 28px;
            text-align: center;
            color: #778397;
            font-size: 13px;
            line-height: 1.6;
        }

        .field {
            margin-bottom: 18px;
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

        .password-wrap {
            display: flex;
            gap: 8px;
        }

        .password-wrap input {
            flex: 1;
            min-width: 0;
        }

        .show-password {
            padding: 0 12px;
            border: 1px solid #dce3ee;
            border-radius: 8px;
            background: #fff;
            color: #2854a2;
            cursor: pointer;
        }

        .login-button {
            width: 100%;
            margin-top: 8px;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #152b4d;
            color: white;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .login-button:hover {
            background: #2854a2;
        }

        .register-link,
        .back-link {
            text-align: center;
            font-size: 12px;
            line-height: 1.8;
        }

        .register-link {
            margin-top: 20px;
            color: #778397;
        }

        .register-link a,
        .back-link a {
            color: #2854a2;
            font-weight: bold;
            text-decoration: none;
        }

        .back-link {
            margin-top: 14px;
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
            .login-card {
                padding: 26px 22px;
            }
        }
    </style>
</head>

<body>
    <main class="login-card">
        <div class="logo">D</div>

        <h1>Login Petugas</h1>

        <p class="subtitle">
            Diskominfotik Kabupaten Indragiri Hulu
            <br>
            Silakan masuk untuk mengelola permohonan subdomain.
        </p>

        @if (session('success'))
            <div style="margin-bottom: 16px; padding: 12px; border-radius: 8px; background: #e8f5e9; color: #256b36; font-size: 12px; line-height: 1.6;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error" role="alert" style="margin-bottom: 16px;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.petugas.submit') }}" method="POST">
            @csrf

            <div class="field">
                <label for="email">Email Petugas</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email petugas"
                    maxlength="255"
                    autocomplete="username"
                    required
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="password">Password</label>

                <div class="password-wrap">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required
                    >

                    <button
                        type="button"
                        class="show-password"
                        onclick="togglePassword()"
                    >
                        Lihat
                    </button>
                </div>

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="login-button">
                Masuk sebagai Petugas
            </button>
        </form>

        <div class="register-link">
            Belum memiliki akun petugas?
            <a href="{{ route('register.petugas') }}">Registrasi di sini</a>
        </div>

        <div class="back-link">
            <a href="{{ route('pilih-login') }}">← Kembali ke pilihan login</a>
        </div>

        <div class="notice">
            <strong>Informasi:</strong>
            Silakan gunakan email dan password yang telah
            terdaftar sebagai akun Petugas Diskominfotik.
        </div>
    </main>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const button = document.querySelector('.show-password');

            if (password.type === 'password') {
                password.type = 'text';
                button.textContent = 'Sembunyi';
            } else {
                password.type = 'password';
                button.textContent = 'Lihat';
            }
        }
    </script>
</body>
</html>
