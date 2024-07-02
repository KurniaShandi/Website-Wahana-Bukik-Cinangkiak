@extends('backend.layouts.main')
@section('contents')
    <div class="pagetitle">
        <h1>Tambah Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('index-transaksi') }}">Data Transaksi</a></li>
                <li class="breadcrumb-item active">Tambah Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Transaksi</h5>
                        <form action="{{ route('store-transaksi') }}" data-toggle="validator" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Wahana</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="wahana_id" id="wahana_id"
                                        aria-label="Default select example">
                                        <option selected disabled>Silahkan Pilih Wahana</option>
                                        @foreach ($wahana as $data)
                                            <option value="{{ $data->id }}" data-harga="{{ $data->harga }}">
                                                {{ $data->nama_wahana }}</option>
                                        @endforeach
                                    </select>
                                    @error('wahana_id')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Pengguna</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="user_id" aria-label="Default select example">
                                        <option selected disabled>Silahkan Pilih User</option>
                                        @foreach ($user as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_lengkap }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jadwal</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="jadwal_id" aria-label="Default select example">
                                        <option selected disabled>Silahkan Pilih Jadwal</option>
                                        @foreach ($jadwal as $data)
                                            @if ($data->stock > 0)
                                                <option value="{{ $data->id }}">{{ $data->hari_operasional }}
                                                    ({{ $data->waktu_mulai }} - {{ $data->waktu_selesai }}) - Stock: {{ $data->stock }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('jadwal_id')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jumlah Tiket</label>
                                <div class="col-sm-10">
                                    <input type="number" name="jumlah_tiket" id="jumlah_tiket" class="form-control"
                                        value="1">
                                    @error('jumlah_tiket')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Total Bayar</label>
                                <div class="col-sm-10">
                                    <input type="number" name="total_bayar" id="total_bayar" class="form-control" readonly
                                        value="0">
                                    @error('total_bayar')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Pilih Metode Pembayaran</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="payment_id" aria-label="Default select example">
                                        <option selected disabled>Silahkan Pilih Metode Pembayaran</option>
                                        @foreach ($payment as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_rekening }} -
                                                {{ $data->nomor_rekening }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('payment_id')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Bukti Pembayaran</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="bukti_pembayaran" type="file" id="formFile">
                                    @error('bukti_pembayaran')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

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
        </div>
    </section>
@endsection
