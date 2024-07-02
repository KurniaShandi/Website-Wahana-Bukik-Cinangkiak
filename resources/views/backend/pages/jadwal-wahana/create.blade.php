@extends('backend.layouts.main')
@section('contents')
    <div class="pagetitle">
        <h1>Tambah Jadwal Wahana</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('index-jadwal-wahana') }}">Data Jadwal Wahana</a></li>
                <li class="breadcrumb-item active">Tambah Jadwal Wahana</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Jadwal Wahana</h5>
                        <form action="{{ route('store-jadwal-wahana') }}" data-toggle="validator" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Wahana</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="wahana_id" aria-label="Default select example">
                                        <option selected disabled>Silahkan Pilih Wahana</option>
                                        @foreach ($wahana as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_wahana }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('nama_wahana')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Hari Operasional</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="hari_operasional[]" multiple aria-label="multiple select example">
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selesa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                    @error('hari_operasional')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jam Mulai Operasional</label>
                                <div class="col-sm-10">
                                    <input type="time" name="waktu_mulai" class="form-control">
                                    @error('waktu_mulai')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jam Selesai Operasional</label>
                                <div class="col-sm-10">
                                    <input type="time" name="waktu_selesai" class="form-control">
                                    @error('waktu_selesai')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Stock Tiket</label>
                                <div class="col-sm-10">
                                    <input type="number" name="stock" class="form-control" value="1">
                                    @error('stock')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
