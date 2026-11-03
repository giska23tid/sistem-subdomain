
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login OPD - Diskominfotik</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: #f3f6fb;
            color: #152b4d;
            font-family: Arial, sans-serif;
        }

        .register-link {
            margin-top: 20px;
            color: #778397;
            font-size: 12px;
            text-align: center;
        }

        .register-link a {
            color: #2854a2;
            font-weight: bold;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .login-container {
            width: 100%;
            max-width: 900px;
            min-height: 490px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 12px 40px rgba(21, 43, 77, 0.10);
        }

        /* Panel kiri */
        .welcome-panel {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 42px;
            background: #152b4d;
            color: #ffffff;
        }

        .logo {
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 26px;
            border-radius: 13px;
            background: #ffffff;
            color: #152b4d;
            font-size: 27px;
            font-weight: bold;
        }

        .welcome-panel h1 {
            margin-bottom: 14px;
            font-size: 26px;
            line-height: 1.4;
        }

        .welcome-panel p {
            color: #d4deed;
            font-size: 14px;
            line-height: 1.8;
        }

        .welcome-label {
            margin-top: 28px;
            padding: 10px 14px;
            width: fit-content;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 8px;
            color: #ffffff;
            font-size: 12px;
        }

        /* Panel kanan */
        .form-panel {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 42px;
        }

        .form-panel h2 {
            margin-bottom: 10px;
            font-size: 25px;
        }

        .description {
            margin-bottom: 27px;
            color: #778397;
            font-size: 13px;
            line-height: 1.8;
        }

        .form-group {
            margin-bottom: 19px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: bold;
        }

        .input-wrapper {
            position: relative;
        }

        .form-group input {
            width: 100%;
            height: 46px;
            padding: 0 13px;
            border: 1px solid #dce4ef;
            border-radius: 8px;
            outline: none;
            background: #ffffff;
            color: #152b4d;
            font-family: Arial, sans-serif;
            font-size: 13px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input:focus {
            border-color: #2854a2;
            box-shadow: 0 0 0 3px rgba(40, 84, 162, 0.09);
        }

        .form-group input::placeholder {
            color: #a2adbd;
        }

        .password-input {
            padding-right: 90px !important;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #2854a2;
            font-size: 11px;
            font-weight: bold;
            cursor: pointer;
        }

        .login-button {
            width: 100%;
            height: 46px;
            margin-top: 5px;
            border: none;
            border-radius: 8px;
            background: #2854a2;
            color: #ffffff;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }

        .login-button:hover {
            background: #1e4388;
        }

        .error-message {
            margin-top: 7px;
            color: #c0392b;
            font-size: 12px;
        }

        .notice {
            margin-top: 18px;
            padding: 12px;
            border-radius: 8px;
            background: #f1f5fb;
            color: #65748b;
            font-size: 11px;
            line-height: 1.7;
        }

        .back-link {
            display: block;
            margin-top: 21px;
            color: #2854a2;
            font-size: 12px;
            text-align: center;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 25px;
            color: #8a94a5;
            font-size: 10px;
            line-height: 1.7;
            text-align: center;
        }

        @media (max-width: 650px) {
            body {
                padding: 16px;
            }

            .login-container {
                max-width: 430px;
                grid-template-columns: 1fr;
            }

            .welcome-panel {
                padding: 28px;
            }

            .logo {
                margin-bottom: 16px;
            }

            .welcome-panel h1 {
                font-size: 22px;
            }

            .welcome-label {
                margin-top: 18px;
            }

            .form-panel {
                padding: 30px 24px;
            }
        }
    </style>
</head>

<body>
    <main class="login-container">

        <!-- Panel informasi -->
        <section class="welcome-panel">
            <div class="logo">D</div>

            <h1>
                Diskominfotik<br>
                Kabupaten Indragiri Hulu
            </h1>

            <p>
                Sistem Informasi Pengelolaan Permohonan
                dan Monitoring Subdomain Perangkat Daerah.
            </p>

            <div class="welcome-label">
                Portal Pengguna OPD
            </div>
        </section>

        <!-- Form login OPD -->
        <section class="form-panel">
            <h2>Login OPD</h2>

            <p class="description">
                Silakan masuk menggunakan akun Perangkat Daerah
                untuk mengakses layanan pengelolaan subdomain.
            </p>

            @if (session('success'))
                <div style="margin-bottom: 16px; padding: 12px; border-radius: 8px; background: #e8f5e9; color: #256b36; font-size: 12px; line-height: 1.6;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="error-message" role="alert" style="margin-bottom: 12px;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.opd.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        maxlength="255"
                        autocomplete="username"
                        required
                        autofocus
                    >

                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <div class="input-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="password-input"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            id="togglePassword"
                            aria-label="Tampilkan password"
                        >
                            Lihat
                        </button>
                    </div>

                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="login-button">
                    Masuk
                </button>
            </form>

            <div class="register-link">
                Belum punya akun?
                <a href="{{ route('register.opd') }}">Daftar di sini</a>
            </div>

            <div class="notice">
                <strong>Informasi:</strong>
                Silakan gunakan email dan password yang telah
                terdaftar pada sistem.
            </div>

            <a href="{{ route('pilih-login') }}" class="back-link">
                &larr; Kembali ke pilihan login
            </a>

            <div class="footer">
                Diskominfotik Kabupaten Indragiri Hulu<br>
                Sistem Pengelolaan Subdomain Perangkat Daerah
            </div>
        </section>

    </main>

    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';
            togglePassword.textContent = isPassword ? 'Sembunyikan' : 'Lihat';

            togglePassword.setAttribute(
                'aria-label',
                isPassword ? 'Sembunyikan password' : 'Tampilkan password'
            );
        });
    </script>
</body>
</html>
