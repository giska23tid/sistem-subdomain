
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Login - Diskominfotik</title>

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

        .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 100%;
            max-width: 900px;
            min-height: 460px;
            overflow: hidden;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 12px 40px rgba(21, 43, 77, .10);
        }

        .welcome {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 42px;
            background: #152b4d;
            color: #fff;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 54px;
            height: 54px;
            margin-bottom: 26px;
            border-radius: 13px;
            background: #fff;
            color: #152b4d;
            font-size: 27px;
            font-weight: bold;
        }

        .welcome h1 {
            margin-bottom: 14px;
            font-size: 26px;
            line-height: 1.4;
        }

        .welcome p {
            color: #d4deed;
            font-size: 14px;
            line-height: 1.8;
        }

        .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 38px;
        }

        .content h2 {
            margin-bottom: 10px;
            font-size: 25px;
        }

        .description {
            margin-bottom: 28px;
            color: #778397;
            font-size: 13px;
            line-height: 1.8;
        }

        .role-button {
            display: flex;
            align-items: center;
            gap: 14px;
            width: 100%;
            min-height: 72px;
            margin-bottom: 15px;
            padding: 14px;
            border: 1px solid #dce4ef;
            border-radius: 11px;
            background: #fff;
            color: #152b4d;
            text-decoration: none;
            transition: .2s ease;
        }

        .role-button:hover {
            border-color: #2854a2;
            background: #f5f8ff;
            transform: translateY(-2px);
        }

        .role-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: #eaf0fc;
            color: #2854a2;
            font-size: 22px;
        }

        .role-text {
            flex: 1;
        }

        .role-text strong {
            display: block;
            margin-bottom: 5px;
            font-size: 13px;
        }

        .role-text small {
            color: #778397;
            font-size: 11px;
        }

        .arrow {
            color: #2854a2;
            font-size: 22px;
        }

        .footer {
            margin-top: 15px;
            color: #8a94a5;
            font-size: 11px;
            line-height: 1.7;
            text-align: center;
        }

        @media (max-width: 650px) {
            .container {
                grid-template-columns: 1fr;
                max-width: 430px;
            }

            .welcome {
                padding: 28px;
            }

            .logo {
                margin-bottom: 16px;
            }

            .welcome h1 {
                font-size: 22px;
            }

            .content {
                padding: 30px 24px;
            }
        }
    </style>
</head>

<body>
    <main class="container">

        <section class="welcome">
            <div class="logo">D</div>

            <h1>
                Diskominfotik<br>
                Kabupaten Indragiri Hulu
            </h1>

            <p>
                Sistem Informasi Pengelolaan Permohonan
                dan Monitoring Subdomain Perangkat Daerah.
            </p>
        </section>

        <section class="content">
            <h2>Selamat Datang!</h2>

            <p class="description">
                Silakan pilih jenis pengguna untuk melanjutkan
                ke halaman login.
            </p>

            <a href="{{ route('login.opd') }}" class="role-button">
                <span class="role-icon">⌂</span>

                <span class="role-text">
                    <strong>Login OPD</strong>
                    <small>Untuk pengguna Perangkat Daerah</small>
                </span>

                <span class="arrow">›</span>
            </a>

            <a href="{{ route('login.petugas') }}" class="role-button">
                <span class="role-icon">♙</span>

                <span class="role-text">
                    <strong>Login Petugas Diskominfotik</strong>
                    <small>Untuk petugas pengelola sistem</small>
                </span>

                <span class="arrow">›</span>
            </a>

            <div class="footer">
                Diskominfotik Kabupaten Indragiri Hulu<br>
                Sistem Pengelolaan Subdomain Perangkat Daerah
            </div>
        </section>

    </main>
</body>
</html>
