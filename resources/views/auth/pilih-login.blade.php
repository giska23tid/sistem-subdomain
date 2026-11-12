
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Login | Sistem Informasi Subdomain</title>

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

        .container {
            width: 100%;
            max-width: 1000px;
            min-height: 570px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(15, 23, 42, 0.10);
        }

        /* BAGIAN KIRI */
        .welcome {
            background: linear-gradient(145deg, #123b65, #1769a6);
            color: white;
            padding: 55px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            width: 70px;
            height: 70px;
            border-radius: 17px;
            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 29px;
            line-height: 1.4;
            margin-bottom: 18px;
        }

        .welcome p {
            color: #dbeafe;
            line-height: 1.9;
            font-size: 14px;
        }

        .left-footer {
            margin-top: 55px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 12px;
            color: #cbdff2;
            line-height: 1.7;
        }

        /* BAGIAN KANAN */
        .content {
            padding: 55px 45px;
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
            margin-bottom: 12px;
        }

        .content h2 {
            color: #163b60;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .description {
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        /* KARTU PILIHAN LOGIN */
        .role-card {
            display: flex;
            align-items: center;
            gap: 15px;
            width: 100%;
            min-height: 92px;
            padding: 18px;
            margin-bottom: 17px;
            background: #ffffff;
            border: 1px solid #dbe5f0;
            border-radius: 13px;
            color: #163b60;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        .role-card:hover {
            border-color: #1769a6;
            background: #f5f9ff;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(23, 105, 166, 0.10);
        }

        .role-icon {
            width: 52px;
            height: 52px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #e8f1fb;
            color: #1769a6;
        }

        .role-icon svg {
            width: 27px;
            height: 27px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .role-info {
            flex: 1;
        }

        .role-info h3 {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .role-info p {
            font-size: 12px;
            color: #64748b;
            line-height: 1.5;
        }

        .arrow {
            color: #1769a6;
            font-size: 25px;
            font-weight: 400;
            transition: transform 0.2s ease;
        }

        .role-card:hover .arrow {
            transform: translateX(5px);
        }

        .footer {
            margin-top: 17px;
            text-align: center;
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.8;
        }

        @media (max-width: 750px) {
            body {
                padding: 18px;
            }

            .container {
                grid-template-columns: 1fr;
                max-width: 480px;
            }

            .welcome {
                padding: 35px 30px;
            }

            .logo {
                width: 60px;
                height: 60px;
                font-size: 29px;
                margin-bottom: 22px;
            }

            .welcome h1 {
                font-size: 23px;
            }

            .left-footer {
                margin-top: 25px;
            }

            .content {
                padding: 38px 28px;
            }

            .content h2 {
                font-size: 25px;
            }
        }

        @media (max-width: 380px) {
            .welcome {
                padding: 30px 23px;
            }

            .content {
                padding: 32px 20px;
            }

            .role-card {
                gap: 11px;
                padding: 14px;
            }

            .role-icon {
                width: 46px;
                height: 46px;
            }
        }
    </style>
</head>

<body>

<main class="container">

    <!-- BAGIAN KIRI -->
    <section class="welcome">

        <div class="logo">🏢</div>

        <h1>
            Sistem Informasi Pengelolaan Permohonan
            dan Monitoring Subdomain
        </h1>

        <p>
            Selamat datang di portal Sistem Informasi
            Pengelolaan Permohonan dan Monitoring
            Subdomain Perangkat Daerah Kabupaten
            Indragiri Hulu.
        </p>

        <div class="left-footer">
            Dinas Komunikasi, Informatika dan Statistik<br>
            Kabupaten Indragiri Hulu
        </div>

    </section>

    <!-- BAGIAN KANAN -->
    <section class="content">

        <div class="heading-label">
            Portal Pengguna
        </div>

        <h2>Selamat Datang!</h2>

        <p class="description">
            Silakan pilih jenis akun Anda untuk melanjutkan
            ke halaman login sistem.
        </p>

        <!-- LOGIN OPD -->
        <a href="{{ route('login.opd') }}" class="role-card">

            <div class="role-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M3 21h18"></path>
                    <path d="M5 21V7l7-4 7 4v14"></path>
                    <path d="M9 9h1"></path>
                    <path d="M14 9h1"></path>
                    <path d="M9 13h1"></path>
                    <path d="M14 13h1"></path>
                    <path d="M10 21v-4h4v4"></path>
                </svg>
            </div>

            <div class="role-info">
                <h3>Login OPD</h3>
                <p>
                    Masuk sebagai perwakilan Perangkat Daerah
                    untuk mengelola permohonan subdomain.
                </p>
            </div>

            <span class="arrow">›</span>

        </a>

        <!-- LOGIN PETUGAS -->
        <a href="{{ route('login.petugas') }}" class="role-card">

            <div class="role-icon">
                <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4"></circle>
                    <path d="M5 21v-2a7 7 0 0 1 14 0v2"></path>
                    <path d="M16 3.5a4 4 0 0 1 0 9"></path>
                    <path d="M19 15a5 5 0 0 1 2 4v2"></path>
                </svg>
            </div>

            <div class="role-info">
                <h3>Login Petugas Diskominfotik</h3>
                <p>
                    Masuk sebagai petugas untuk mengelola
                    permohonan dan monitoring subdomain.
                </p>
            </div>

            <span class="arrow">›</span>

        </a>

        <div class="footer">
            Diskominfotik Kabupaten Indragiri Hulu<br>
            Sistem Informasi Pengelolaan Subdomain Perangkat Daerah
        </div>

    </section>

</main>

</body>
</html>
