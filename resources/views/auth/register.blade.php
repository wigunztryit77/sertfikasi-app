
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - Sertifikasi App</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5">

            <div class="card shadow border-0">
                <div class="card-body p-4">

                    <!-- JUDUL -->
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Buat Akun</h3>
                        <p class="text-muted">
                            Daftar akun Sertifikasi App
                        </p>
                    </div>

                    <!-- FORM REGISTER -->
                    <form action="{{ route('register.process') }}"
                          method="POST">

                        @csrf

                        <!-- NAMA -->
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name') }}"
                                   placeholder="Masukkan nama lengkap">

                            @error('name')
                                <div class="text-danger small">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email') }}"
                                   placeholder="Masukkan email">

                            @error('email')
                                <div class="text-danger small">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Minimal 8 karakter">

                            @error('password')
                                <div class="text-danger small">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- KONFIRMASI PASSWORD -->
                        <div class="mb-3">
                            <label class="form-label">
                                Konfirmasi Password
                            </label>

                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control"
                                   placeholder="Ulangi password">
                        </div>

                        <!-- TOMBOL DAFTAR -->
                        <button type="submit"
                                class="btn btn-primary w-100">
                            Daftar
                        </button>

                    </form>

                    <!-- LINK LOGIN -->
                    <div class="text-center mt-3">
                        <span class="text-muted">
                            Sudah punya akun?
                        </span>

                        <a href="{{ route('login') }}"
                           class="text-decoration-none">
                            Login
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
