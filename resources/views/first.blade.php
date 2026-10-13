<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Sertifikasi App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a href="{{ route('first') }}" class="navbar-brand fw-bold">
                 <img src="{{ asset('images/logo.png.png') }}" alt="Logo Perusahaan" class="company-logo">
            </a>
        </div>
    </nav>

     <style>
        .company-logo {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }
    </style>

    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="text-center bg-white shadow rounded-4 p-5"
             style="max-width: 650px; width: 100%;">

            <h1 class="fw-bold mb-3">
                Selamat Datang!
            </h1>

            <h4 class="text-primary mb-3">
                Sertifikasi App
            </h4>

            <p class="text-muted mb-4">
                Selamat datang di aplikasi pengelolaan data peserta sertifikasi.
                Silakan login jika sudah memiliki akun atau daftar untuk membuat
                akun baru.
            </p>

            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('login') }}" class="btn btn-primary px-4">
                    Login
                </a>

                <a href="{{ route('register') }}" class="btn btn-outline-primary px-4">
                    Register
                </a>
            </div>

        </div>
    </div>

</body>
</html>
