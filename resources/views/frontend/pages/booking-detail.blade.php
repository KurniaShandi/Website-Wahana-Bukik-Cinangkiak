@extends('frontend.layouts.main')
@section('contents')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets_frontend/images/bg_1.jpg') }}'); padding-top: 208px;">
        <div class="overlay-saja"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Detail Riwayat Booking<i
                                class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-0 bread">Detail Riwayat Booking</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt " id="printSection">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 ftco-animate py-md-5 mt-md-5">
                    <div class="invoice">
                        <div class="invoice-print">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="invoice-title">
                                        <h2 class="mb-3 mt-4">{{ $transaksi->wahana->nama_wahana }}</h2>
                                        <div class="invoice-number">Order</div>
                                        <button class="btn btn-warning btn-icon float-right" onclick="printInvoice()"><i class="fa fa-print"></i>
                                            Print</button>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <strong>Booking To</strong><br>
                                            <p style="margin-bottom: 0px;"><strong>Nama :</strong> {{ $transaksi->user->nama_lengkap }}</p>
                                            <p style="margin-bottom: 0px;"><strong>Alamat :</strong> {{ $transaksi->user->alamat }}</p>
                                            <p style="margin-bottom: 0px;"><strong>No Telepon :</strong> 082287615321</p>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="barcode">
                                                {!! DNS1D::getBarcodeHTML($transaksi->kode_pemesanan, 'C128', 1.5, 30) !!}
                                                <p class="card-text mt-2">
                                                    <small class="text-muted">
                                                        {{ $transaksi->kode_pemesanan }}
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="section-title">Order Summary</div>
                                    <p class="section-lead">All items here cannot be deleted.</p>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-md">
                                            <tr>
                                                <th data-width="40">#</th>
                                                <th>Nama Wahana</th>
                                                <th class="text-center">Jadwal</th>
                                                <th class="text-center">Jumlah Tiket</th>
                                                <th class="text-right">Totals</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $transaksi->wahana->nama_wahana }}</td>
                                                <td class="text-center">{{ $transaksi->jadwal->hari_operasional }}
                                                    ({{ \Carbon\Carbon::parse($transaksi->jadwal->waktu_mulai)->format('H:i') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($transaksi->jadwal->waktu_selesai)->format('H:i') }})</td>
                                                <td class="text-center">{{ $transaksi->jumlah_tiket }}</td>
                                                <td class="text-right">{{ $transaksi->total_bayar }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- .section -->
    <script>
        function printInvoice() {
            var printContents = document.getElementById('printSection').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
