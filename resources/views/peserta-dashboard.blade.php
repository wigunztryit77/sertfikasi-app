<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Dashboard Peserta - Sertifikasi App
    </title>

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


            {{-- Login Admin --}}
            <a href="{{ route('login') }}" class="btn btn-light btn-sm">
                Login Admin
            </a>

        </div>

    </nav>



    {{-- Content --}}
    <div class="container py-5">


        {{-- Header --}}
        <div class="text-center mb-4">

            <h1 class="fw-bold">
                Dashboard Peserta
            </h1>

            <p class="text-muted">
                Informasi data peserta sertifikasi
            </p>

        </div>



        {{-- Search --}}
        <div class="card shadow-sm mb-4">

            <div class="card-body">

                <form action="{{ route('home') }}" method="GET">

                    <div class="row g-2">

                        <div class="col-md-10">

                            <input type="text" name="search" class="form-control"
                                placeholder="Cari berdasarkan nama atau NIK..." value="{{ request('search') }}">

                        </div>


                        <div class="col-md-2">

                            <button type="submit" class="btn btn-primary w-100">

                                Search

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>



        {{-- Hasil Search --}}
        @if (request('search'))
            <div class="mb-3">

                <span class="text-muted">

                    Hasil pencarian untuk:

                    <strong>
                        "{{ request('search') }}"
                    </strong>

                </span>


                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary ms-2">

                    Reset

                </a>

            </div>
        @endif



        {{-- Data Peserta --}}
        @if ($peserta->count() > 0)


            <div class="row g-4">

                @foreach ($peserta as $item)
                    <div class="col-lg-6">


                        <div class="card shadow-sm h-100">


                            {{-- Header Card --}}
                            <div class="card-header bg-primary text-white">

                                <div class="d-flex justify-content-between align-items-center">

                                    <h5 class="mb-0">

                                        {{ $item->nama }}

                                    </h5>


                                    @if ($item->status === 'Terdaftar')
                                        <span class="badge bg-light text-primary">

                                            Terdaftar

                                        </span>
                                    @elseif($item->status === 'Dijadwalkan')
                                        <span class="badge bg-warning text-dark">

                                            Dijadwalkan

                                        </span>
                                    @elseif($item->status === 'Selesai')
                                        <span class="badge bg-success">

                                            Selesai

                                        </span>
                                    @endif

                                </div>

                            </div>



                            {{-- Body Card --}}
                            <div class="card-body">


                                <div class="row mb-2">

                                    <div class="col-5 text-muted">
                                        NIK
                                    </div>

                                    <div class="col-7 fw-semibold">

                                        {{ $item->nik }}

                                    </div>

                                </div>



                                <div class="row mb-2">

                                    <div class="col-5 text-muted">
                                        Email
                                    </div>

                                    <div class="col-7">

                                        {{ $item->email }}

                                    </div>

                                </div>



                                <div class="row mb-2">

                                    <div class="col-5 text-muted">
                                        No. HP
                                    </div>

                                    <div class="col-7">

                                        {{ $item->no_hp }}

                                    </div>

                                </div>



                                <hr>



                                <div class="mb-2">

                                    <small class="text-muted">
                                        Skema Sertifikasi
                                    </small>

                                    <div class="fw-bold">

                                        {{ $item->skemaSertifikasi->nama_skema }}

                                    </div>

                                </div>



                                <div class="mb-2">

                                    <small class="text-muted">
                                        Kode Skema
                                    </small>

                                    <div class="fw-semibold">

                                        {{ $item->skemaSertifikasi->kode_skema }}

                                    </div>

                                </div>



                                <div>

                                    <small class="text-muted">
                                        Tanggal Pendaftaran
                                    </small>

                                    <div class="fw-semibold">

                                        {{ $item->tanggal_daftar?->format('d F Y') }}

                                    </div>

                                </div>


                            </div>

                        </div>


                    </div>
                @endforeach

            </div>



            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-4">

                {{ $peserta->links() }}

            </div>
        @else
            {{-- Tidak ada data --}}
            <div class="alert alert-warning text-center">

                @if (request('search'))
                    Data peserta dengan kata kunci
                    <strong>"{{ request('search') }}"</strong>
                    tidak ditemukan.
                @else
                    Belum terdapat data peserta sertifikasi.
                @endif

            </div>


        @endif


    </div>


</body>

</html>
