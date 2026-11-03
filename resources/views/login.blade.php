<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Masuk | Sistem Informasi Subdomain</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            color: #172b4d;
            background: #f3f5fa;
        }

        .login-container {
            display: flex;
            min-height: 100vh;
        }

        /* PANEL KIRI */
        .login-intro {
            width: 50%;
            background-color: #162c50;
            color: #ffffff;
            padding: 35px 6.7% 28px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .institution {
            font-size: 10px;
            line-height: 1.5;
            font-weight: 700;
            color: #dce8ff;
            margin-bottom: 18px;
        }

        .login-intro h1 {
            font-size: clamp(26px, 3vw, 38px);
            line-height: 1.12;
            letter-spacing: -0.8px;
            font-weight: 700;
            margin-bottom: 18px;
            max-width: 520px;
        }

        .intro-description {
            font-size: 13px;
            line-height: 1.7;
            color: #f0f4ff;
            max-width: 440px;
        }

        .intro-footer {
            font-size: 10px;
            line-height: 1.6;
            color: #dce8ff;
        }

        /* PANEL KANAN */
        .login-form-section {
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 30px;
            background-color: #f3f5fa;
        }

        .login-card {
            width: 100%;
            max-width: 380px;
        }

        .login-card h2 {
            font-size: 24px;
            font-weight: 700;
            color: #172b4d;
            margin-bottom: 8px;
        }

        .login-description {
            font-size: 12px;
            line-height: 1.7;
            color: #718096;
            margin-bottom: 22px;
            max-width: 340px;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            color: #172b4d;
            margin-bottom: 7px;
        }

        .form-group input {
            width: 100%;
            height: 43px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            padding: 0 13px;
            background-color: #ffffff;
            font-size: 12px;
            color: #172b4d;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input::placeholder {
            color: #9aa7bb;
        }

        .form-group input:focus {
            border-color: #2855a0;
            box-shadow: 0 0 0 3px rgba(40, 85, 160, 0.10);
        }

        .role-heading {
            font-size: 10px;
            font-weight: 600;
            color: #334155;
            margin-top: 23px;
            margin-bottom: 15px;
        }

        .role-button {
            width: 100%;
            min-height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.2s;
        }

        .role-button:hover {
            transform: translateY(-1px);
        }

        .role-button-primary {
            background-color: #24509a;
            color: #ffffff;
            border: 1px solid #24509a;
            margin-bottom: 12px;
        }

        .role-button-primary:hover {
            background-color: #193f7f;
        }

        .role-button-secondary {
            background-color: #ffffff;
            color: #24509a;
            border: 1px solid #7896ce;
        }

        .role-button-secondary:hover {
            background-color: #eaf0fb;
        }

        .login-notice {
            padding: 11px 12px;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 12px;
            line-height: 1.5;
            background-color: #e8f0fe;
            color: #214b8e;
        }

        .login-notice.error {
            background-color: #fff0f0;
            color: #b42318;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-intro,
            .login-form-section {
                width: 100%;
            }

            .login-intro {
                min-height: 300px;
                padding: 30px 25px;
            }

            .login-intro h1 {
                font-size: 30px;
            }

            .intro-footer {
                margin-top: 35px;
            }

            .login-form-section {
                min-height: 430px;
                padding: 45px 25px;
            }

            .login-card {
                max-width: 430px;
            }
        }

        @media (max-width: 400px) {
            .login-intro h1 {
                font-size: 26px;
            }

            .login-intro {
                min-height: 280px;
            }

            .login-form-section {
                padding: 35px 20px;
            }
        }
    </style>
</head>

<body>

    <main class="login-container">

        <!-- PANEL KIRI -->
        <section class="login-intro">

            <div>
                <p class="institution">
                    DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIKA<br>
                    KABUPATEN INDRAGIRI HULU
                </p>

                <h1>
                    Sistem Informasi<br>
                    Permohonan dan<br>
                    Monitoring Subdomain
                </h1>

                <p class="intro-description">
                    Ajukan pendaftaran atau perubahan nama subdomain
                    Perangkat Daerah, pantau keputusannya, dan kelola data
                    subdomain dalam satu tempat.
                </p>
            </div>

            <p class="intro-footer">
                Prototype untuk kerja praktik. Semua data yang tampil hanya contoh.
            </p>

        </section>

        <!-- PANEL KANAN -->
        <section class="login-form-section">

            <div class="login-card">

                <h2>Masuk</h2>

                <p class="login-description">
                    Gunakan akun yang diberikan. Halaman yang tampil
                    mengikuti peran akun Anda.
                </p>

                @if (session('error'))
                    <div class="login-notice error">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('message'))
                    <div class="login-notice">
                        {{ session('message') }}
                    </div>
                @endif

                <form action="{{ route('prototype.login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="username">Nama pengguna</label>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Nama pengguna"
                            value="{{ old('username') }}"
                            autocomplete="username"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="password">Kata sandi</label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Kata sandi"
                            autocomplete="current-password"
                            required
                        >
                    </div>

                    <p class="role-heading">
                        PILIH PERAN UNTUK MENCOBA PROTOTYPE
                    </p>

                    <button
                        type="submit"
                        name="role"
                        value="opd"
                        class="role-button role-button-primary"
                    >
                        Masuk sebagai OPD
                    </button>

                    <button
                        type="submit"
                        name="role"
                        value="petugas"
                        class="role-button role-button-secondary"
                    >
                        Masuk sebagai Petugas Diskominfotik
                    </button>

                </form>

            </div>

        </section>

    </main>

</body>
</html>