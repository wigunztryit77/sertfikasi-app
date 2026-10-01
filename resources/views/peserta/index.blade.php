<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    {{-- Navbar --}}
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
                    width: 70px;
                    height: 70px;
                    object-fit: contain;
                }
            </style>

        </div>

    </nav>

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2>Data Peserta Sertifikasi</h2>
                <p class="text-muted mb-0">
                    Kelola data peserta sertifikasi
                </p>
            </div>

            <a href="{{ route('peserta.create') }}" class="btn btn-primary">
                + Tambah Peserta
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Search --}}
        <div class="card mb-4">
            <div class="card-body">

                <form method="GET" action="{{ route('peserta.index') }}" class="row g-2">

                    <div class="col-md-10">
                        <input type="text" name="search" class="form-control"
                            placeholder="Cari nama, NIK, atau email..." value="{{ request('search') }}">
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-secondary w-100">
                            Cari
                        </button>
                    </div>

                </form>

            </div>
        </div>

        {{-- Table --}}
        <div class="card">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Email</th>
                                <th>Skema</th>
                                <th>Status</th>
                                <th width="220">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($peserta as $item)
                                <tr>

                                    <td>
                                        {{ $peserta->firstItem() + $loop->index }}
                                    </td>

                                    <td>
                                        {{ $item->nama }}
                                    </td>

                                    <td>
                                        {{ $item->nik }}
                                    </td>

                                    <td>
                                        {{ $item->email }}
                                    </td>

                                    <td>
                                        {{ $item->skemaSertifikasi->nama_skema ?? '-' }}
                                    </td>

                                    <td>

                                        @if ($item->status == 'Selesai')
                                            <span class="badge bg-success">
                                                Selesai
                                            </span>
                                        @elseif($item->status == 'Dijadwalkan')
                                            <span class="badge bg-warning text-dark">
                                                Dijadwalkan
                                            </span>
                                        @else
                                            <span class="badge bg-primary">
                                                Terdaftar
                                            </span>
                                        @endif

                                    </td>

                                    <td>

                                        <a href="{{ route('peserta.show', $item) }}"
                                            class="btn btn-sm btn-info text-white">
                                            Detail
                                        </a>

                                        <a href="{{ route('peserta.edit', $item) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('peserta.destroy', $item) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger">
                                                Hapus
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="7" class="text-center py-4">

                                        Belum ada data peserta.

                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                {{ $peserta->links() }}

            </div>

        </div>

        <div class="mt-3">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                ← Kembali ke Dashboard
            </a>
        </div>

    </div>

</body>

</html>
