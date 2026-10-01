<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Sertifikasi App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary">

        <div class="container">

            {{-- Logo + Nama Aplikasi --}}
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center gap-2">

                <img src="{{ asset('images/logo.png.png') }}" alt="Logo Perusahaan" class="company-logo">

                <span class="fw-bold">

                </span>

            </a>

            <style>
                .company-logo {
                    width: 75px;
                    height: 75px;
                    object-fit: contain;
                }
            </style>


        </div>

    </nav>

    <div class="container py-5">

        <h2>Dashboard</h2>

        <p class="text-muted">
            Selamat datang, {{ auth()->user()->name }}.
        </p>

        <div class="row mt-4 g-4">

            {{-- Total Peserta --}}
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">

                    <div class="card-body">
                        <h6 class="text-muted">
                            Total Peserta
                        </h6>

                        <h2>
                            {{ \App\Models\Peserta::count() }}
                        </h2>

                        <p class="text-muted mb-0">
                            Jumlah peserta sertifikasi
                        </p>
                    </div>

                </div>
            </div>


            {{-- Total Skema --}}
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">

                    <div class="card-body">
                        <h6 class="text-muted">
                            Total Skema
                        </h6>

                        <h2>
                            {{ \App\Models\SkemaSertifikasi::count() }}
                        </h2>

                        <p class="text-muted mb-0">
                            Jumlah skema sertifikasi
                        </p>
                    </div>

                </div>
            </div>


            {{-- Menu --}}
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">

                    <div class="card-body">

                        <h5 class="mb-3">
                            Menu Pengelolaan
                        </h5>

                        <div class="d-grid gap-2">

                            <a href="{{ route('peserta.index') }}" class="btn btn-primary">
                                Kelola Peserta
                            </a>

                            <a href="{{ route('skema.index') }}" class="btn btn-outline-primary">
                                Kelola Skema Sertifikasi
                            </a>

                        </div>

                    </div>

                </div>
            </div>

        </div>

</body>

</html>
