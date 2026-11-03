
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Sistem Informasi Subdomain OPD')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fb;
            font-family: Arial, sans-serif;
            color: #263238;
        }

        .main-content {
            min-height: 100vh;
        }

        .card {
            border: none;
            border-radius: 12px;
        }

        .card-header {
            border-radius: 12px 12px 0 0 !important;
        }
    </style>

    @stack('styles')
</head>

<body>

    <main class="main-content">
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>
</html>
