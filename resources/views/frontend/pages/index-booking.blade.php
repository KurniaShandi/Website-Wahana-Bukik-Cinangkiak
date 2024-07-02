@extends('frontend.layouts.main')
@section('contents')
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url('{{ asset('assets_frontend/images/bg_1.jpg') }}'); padding-top: 208px;">
        <div class="overlay-saja"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home-frontend') }}">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Riwayat Booking<i
                                class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-0 bread">Riwayat Booking</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ftco-animate py-md-5">
                    <div class="invoice">
                        <div class="invoice-print">

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="section-title">Riwayat Booking</div>
                                    <p class="section-lead">Lihat dan download tiket anda.</p>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-md">
                                            <tr>
                                                <th data-width="40">No</th>
                                                <th>Nama Wahana</th>
                                                <th class="text-center">Jadwal</th>
                                                <th class="text-center">Jumlah Tiket</th>
                                                <th class="text-center">Totals</th>
                                                <th class="text-center">Tiket</th>
                                            </tr>

                                            @foreach ($transaksi as $data)
                                                <tr>
                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                    <td>{{ $data->wahana->nama_wahana }}</td>
                                                    <td class="text-center">{{ $data->jadwal->hari_operasional }}
                                                        ({{ \Carbon\Carbon::parse($data->jadwal->waktu_mulai)->format('H:i') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($data->jadwal->waktu_selesai)->format('H:i') }})
                                                    </td>
                                                    <td class="text-center">{{ $data->jumlah_tiket }}</td>
                                                    <td class="text-center">Rp.
                                                        {{ number_format($data->total_bayar, 0, ',', '.') }}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-warning btn-icon icon-left mt-1"
                                                            title="Detail"
                                                            onclick="window.location.href='{{ route('booking-detail', $data->id) }}'">
                                                            <i class="fa fa-credit-card"></i> Detail
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
    </section>
@endsection
