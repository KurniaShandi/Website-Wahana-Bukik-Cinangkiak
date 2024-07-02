@extends('backend.layouts.main')
@section('contents')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <div class="col-lg-12">
                <div class="row">

                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card user-card">

                            <div class="card-body">
                                <h5 class="card-title">Pengunjung <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ \App\Models\User::where('role', 'pengunjung')->count() }} Orang</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card pendapatan-card">

                            <div class="card-body">
                                <h5 class="card-title">Pendapatan <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Rp. {{ number_format(\App\Models\Transaksi::where('status', 'sukses')->sum('total_bayar'), 2, ',', '.') }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-3">

                        <div class="card info-card transaksi-card">

                            <div class="card-body">
                                <h5 class="card-title">Transaksi <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart4"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ \App\Models\Transaksi::count() }} Transaksi</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-xxl-4 col-md-3">

                        <div class="card info-card ulasan-card">

                            <div class="card-body">
                                <h5 class="card-title">Ulasan <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ \App\Models\Ulasan::count() }} Ulasan</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Transaksi Terbaru</h5>


                                <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pemesanan</th>
                                                <th>Wahana</th>
                                                <th>Pengunjung</th>
                                                <th>Jadwal</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksi as $data)
                                                <tr>
                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                    <td>
                                                        <div class="barcode">
                                                            {!! DNS1D::getBarcodeHTML($data->kode_pemesanan, 'C128', 1.5, 30) !!}
                                                        </div>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                {{ $data->kode_pemesanan }}
                                                            </small>
                                                        </p>
                                                    </td>
                                                    <td>{{ $data->wahana->nama_wahana }}</td>
                                                    <td>{{ $data->user->nama_lengkap }}</td>
                                                    <td>{{ $data->jadwal->hari_operasional }}
                                                        ({{ \Carbon\Carbon::parse($data->jadwal->waktu_mulai)->format('H:i') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($data->jadwal->waktu_selesai)->format('H:i') }})
                                                    </td>
                                                    <td>
                                                        @if ($data->status == 'sukses')
                                                            <span class="btn btn-success btn-sm"
                                                                style="pointer-events: none;">Sukses</span>
                                                        @else
                                                            <span class="btn btn-danger btn-sm"
                                                                style="pointer-events: none;">Pending</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
