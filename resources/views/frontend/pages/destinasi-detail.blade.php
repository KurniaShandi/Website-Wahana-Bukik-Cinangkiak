@extends('frontend.layouts.main')
@section('contents')
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url('{{ asset('assets_frontend/images/bg_1.jpg') }}'); padding-top: 208px;">
        <div class="overlay-saja"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Detail Destinasi<i
                                class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-0 bread">Detail Destinasi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 ftco-animate py-md-5 mt-md-5">
                    <h2 class="mb-3 mt-4">{{ $wahana->nama_wahana }}</h2>
                    <p>{{ $wahana->deskripsi }}</p>
                    <p>
                        <img src="{{ url('images/foto/' . $wahana->foto) }}" alt="" class="img-fluid"
                            style="border-radius: 8px;">
                    </p>
                    <div class="detail-wahana">
                        <h3>Detail Wahana</h3>
                        <p>Harga: Rp. {{ number_format($wahana->harga, 0, ',', '.') }}</p>
                        <p>Lokasi: Bukit Chinangkiek</p>
                        <p>Jadwal: Setiap hari pukul 09.00 - 17.00 WIB</p>
                    </div>

                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">Life</a>
                            <a href="#" class="tag-cloud-link">Sport</a>
                            <a href="#" class="tag-cloud-link">Tech</a>
                            <a href="#" class="tag-cloud-link">Travel</a>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->

                <div class="col-lg-5 sidebar ftco-animate py-md-5">
                    <div class="sidebar-box ftco-animate mt-5">
                        <div class="categories">
                            <h3>Form Booking Wahana</h3>
                            <form action="{{ route('pemesanana-destinasi') }}" data-toggle="validator" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="#">Nama Wahana</label>
                                    <select class="form-control" name="wahana_id" id="wahana_id"
                                        style="font-size: 14px;
                                        aria-label="Default
                                        select example">
                                        <option value="{{ $wahana->id }}" data-harga="{{ $wahana->harga }}">
                                            {{ $wahana->nama_wahana }}
                                        </option>
                                    </select>
                                    @error('wahana_id')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jadwal_id">Jadwal Wahana</label>
                                    <select name="jadwal_id" id="jadwal_id" class="form-control" style="font-size: 14px;">
                                        <option selected disabled style="color: gray;">Silahkan Pilih Jadwal</option>
                                        @foreach ($jadwal as $data)
                                            @if ($data->stock > 0)
                                                <option value="{{ $data->id }}" style="color: black; font-size: 14px;">
                                                    {{ $data->hari_operasional }}
                                                    ({{ $data->waktu_mulai }} - {{ $data->waktu_selesai }})
                                                    - Sisa Stock: {{ $data->stock }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('jadwal_id')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="#">Jumlah Tiket</label>
                                    <input type="number" class="form-control" name="jumlah_tiket" id="jumlah_tiket"
                                        value="0" min="1">
                                    @error('jumlah_tiket')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="#">Total Bayar</label>
                                    <input type="number" name="total_bayar" id="total_bayar" class="form-control" readonly
                                        value="0">
                                    @error('total_bayar')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="#">Metode Pembayaran</label>
                                    <select name="payment_id" id="payment_id" class="form-control" style="font-size: 14px;">
                                        <option selected disabled style="color: gray;">Silahkan Pilih Metode Pembayaran
                                        </option>
                                        @foreach ($payment as $data)
                                            <option value="{{ $data->id }}" style="font-size: 14px;">
                                                {{ $data->nama_rekening }} -
                                                {{ $data->nomor_rekening }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('payment_id')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="#">Bukti Pembayaran</label>
                                    <input class="form-control" name="bukti_pembayaran" type="file" id="formFile"
                                        style="font-size: 14px;">
                                    @error('bukti_pembayaran')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                @auth
                                    <button type="submit" class="btn btn-primary">Booking Sekarang</button>
                                @else
                                    <a href="{{ route('index-login') }}" class="btn btn-primary">Login untuk Booking</a>
                                @endauth
                            </form>

                            <script>
                                document.addEventListener('DOMContentLoaded', (event) => {
                                    const wahanaSelect = document.getElementById('wahana_id');
                                    const jumlahTiketInput = document.getElementById('jumlah_tiket');
                                    const totalBayarInput = document.getElementById('total_bayar');

                                    function updateTotalBayar() {
                                        const selectedWahana = wahanaSelect.options[wahanaSelect.selectedIndex];
                                        const hargaWahana = selectedWahana.getAttribute('data-harga');
                                        const jumlahTiket = jumlahTiketInput.value;

                                        if (hargaWahana && jumlahTiket) {
                                            totalBayarInput.value = hargaWahana * jumlahTiket;
                                        } else {
                                            totalBayarInput.value = 0;
                                        }
                                    }

                                    wahanaSelect.addEventListener('change', updateTotalBayar);
                                    jumlahTiketInput.addEventListener('input', updateTotalBayar);
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 mt-2">
                    <h3 class="mb-5" style="font-size: 20px; font-weight: bold;">
                        {{ $ulasan->where('wahana_id', $wahana->id)->count() }} Comments</h3>
                    <ul class="comment-list">
                        @foreach ($ulasan->take(6) as $data)
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ url('images/foto/' . $data->user->foto) }}" alt="Foto profil pengguna">
                                </div>
                                <div class="comment-body">
                                    <h3>{{ $data->user->nama_lengkap }}</h3>
                                    <div class="meta">{{ $data->created_at->format('d M Y, H:i A') }}</div>
                                    <p>{{ $data->komentar }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5" style="font-size: 20px; font-weight: bold;">Leave a comment</h3>
                        <form action="{{ route('store-comment') }}" data-toggle="validator" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name Wahana *</label>
                                <select class="form-control" name="wahana_id" id="wahana_id"
                                    style="font-size: 14px;
                                        aria-label="Default
                                    select example">
                                    <option value="{{ $wahana->id }}" data-harga="{{ $wahana->harga }}">
                                        {{ $wahana->nama_wahana }}
                                    </option>
                                </select>
                                @error('wahana_id')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="message">Komentar</label>
                                <textarea name="komentar" id="komentar" cols="30" rows="10" class="form-control"></textarea>
                                @error('komentar')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            @auth
                                <button type="submit" class="btn py-3 px-4 mb-3 btn-primary">Post Comment</button>
                            @else
                                <a href="{{ route('index-login') }}" class="btn py-3 px-4 btn-primary">Login untuk
                                    Komentar</a>
                            @endauth
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section> <!-- .section -->

    <section class="ftco-intro ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <div class="img" style="background-image: url({{ asset('assets_frontend/images/bg_2.jpg') }});">
                        <div class="overlay"></div>
                        <h2>We Are Pacific A Travel Agency</h2>
                        <p>We can manage your dream building A small river named Duden flows by their place</p>
                        <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Ask For A Quote</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
