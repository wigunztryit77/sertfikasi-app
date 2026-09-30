<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Skema Sertifikasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fb !important;
        }

        .page-title {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .page-description {
            color: #6c757d;
            margin-bottom: 0;
        }

        .table-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
        }

        .table thead th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #495057;
            padding: 14px 16px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 15px 16px;
            vertical-align: middle;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .kode-badge {
            font-size: 13px;
            padding: 6px 9px;
        }

        .status-badge {
            font-size: 13px;
            padding: 6px 10px;
        }

        .action-buttons {
            display: flex;
            gap: 6px;
            white-space: nowrap;
        }

        .action-buttons .btn {
            min-width: 65px;
        }

        .header-actions {
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-dark bg-primary">

        <div class="container">

            <a href="{{ route('dashboard') }}" class="navbar-brand fw-semibold">
                Sertifikasi App
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="btn btn-light btn-sm px-3">
                    Logout
                </button>
            </form>

        </div>

    </nav>


    {{-- Main Content --}}
    <div class="container py-4">


        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="page-title">
                    Skema Sertifikasi
                </h2>

                <p class="page-description">
                    Kelola data skema sertifikasi.
                </p>
            </div>


            <div class="header-actions">

                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                    ← Back To Dashboard
                </a>

                <a href="{{ route('skema.create') }}" class="btn btn-primary">
                    + Tambah Skema
                </a>

            </div>

        </div>


        {{-- Success Message --}}
        @if (session('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ session('success') }}

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        {{-- Error Message --}}
        @if (session('error'))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                {{ session('error') }}

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        {{-- Table Card --}}
        <div class="card table-card shadow-sm">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead>

                            <tr>

                                <th style="width: 70px;">
                                    #
                                </th>

                                <th style="width: 160px;">
                                    Kode
                                </th>

                                <th>
                                    Nama Skema
                                </th>

                                <th style="width: 130px;">
                                    Status
                                </th>

                                <th style="width: 180px;">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($skemas as $skema)

                                <tr>

                                    {{-- Nomor --}}
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    {{-- Kode --}}
                                    <td>

                                        <span class="badge bg-secondary kode-badge">
                                            {{ $skema->kode_skema }}
                                        </span>

                                    </td>


                                    {{-- Nama --}}
                                    <td>

                                        <strong>
                                            {{ $skema->nama_skema }}
                                        </strong>

                                        @if ($skema->deskripsi)

                                            <div class="text-muted small mt-1">
                                                {{ $skema->deskripsi }}
                                            </div>

                                        @endif

                                    </td>


                                    {{-- Status --}}
                                    <td>

                                        @if ($skema->status)

                                            <span class="badge bg-success status-badge">
                                                Aktif
                                            </span>

                                        @else

                                            <span class="badge bg-secondary status-badge">
                                                Tidak Aktif
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Aksi --}}
                                    <td>

                                        <div class="action-buttons">

                                            <a
                                                href="{{ route('skema.edit', $skema) }}"
                                                class="btn btn-warning btn-sm"
                                            >
                                                Edit
                                            </a>


                                            <form
                                                action="{{ route('skema.destroy', $skema) }}"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus skema ini?')"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger btn-sm"
                                                >
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="text-center text-muted py-5"
                                    >
                                        Belum ada data skema.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- Pagination --}}
                <div class="p-3">

                    {{ $skemas->links() }}

                </div>

            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>