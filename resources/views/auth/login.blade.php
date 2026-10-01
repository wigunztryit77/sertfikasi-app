<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Sertifikasi App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .company-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 12px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container">

        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-md-5">

                <div class="card shadow-sm border-0">

                    <div class="card-body p-4">

                        {{-- Logo --}}
                        <div class="text-center mb-3">

                            <img
                                src="{{ asset('images/logo.png.png') }}"
                                alt="Logo Perusahaan"
                                class="company-logo"
                            >

                            <h3 class="fw-bold mb-1">
                                Sertifikasi App
                            </h3>

                            <p class="text-muted mb-0">
                                Login Administrator
                            </p>

                        </div>


                        {{-- Error --}}
                        @if ($errors->any())

                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>

                        @endif


                        {{-- Login Form --}}
                        <form method="POST" action="{{ route('login.process') }}">

                            @csrf


                            {{-- Email --}}
                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email') }}"
                                    placeholder="Masukkan email"
                                    required
                                >

                            </div>


                            {{-- Password --}}
                            <div class="mb-3">

                                <label class="form-label">
                                    Password
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    required
                                >

                            </div>


                            {{-- Login --}}
                            <button
                                type="submit"
                                class="btn btn-primary w-100"
                            >
                                Login
                            </button>

                        </form>


                        {{-- Kembali ke Dashboard Peserta --}}
                        <div class="text-center mt-3">

                            <a
                                href="{{ route('home') }}"
                                class="btn btn-outline-secondary w-100"
                            >
                                ← Kembali ke Dashboard Peserta
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>