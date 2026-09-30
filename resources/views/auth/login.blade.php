<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Sertifikasi App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-md-5">

                <div class="card shadow-sm border-0">

                    <div class="card-body p-4">

                        <h3 class="text-center mb-2">
                            Sertifikasi App
                        </h3>

                        <p class="text-center text-muted mb-4">
                            Login Administrator
                        </p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login.process') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">
                                    Email
                                </label>

                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Password
                                </label>

                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Login
                            </button>
                        </form>

                        {{-- Tombol kembali ke dashboard peserta --}}
                        <div class="text-center mt-3">

                            <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100">
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
