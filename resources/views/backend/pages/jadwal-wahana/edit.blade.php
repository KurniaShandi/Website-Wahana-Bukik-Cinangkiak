@extends('backend.layouts.main')
@section('contents')
    <div class="pagetitle">
        <h1>Edit Jadwal Wahana</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('index-jadwal-wahana') }}">Data Jadwal Wahana</a></li>
                <li class="breadcrumb-item active">Edit Jadwal Wahana</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Jadwal Wahana</h5>
                        <form action="{{ route('update-jadwal-wahana', $jadwal->id) }}" data-toggle="validator"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Wahana</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="wahana_id" aria-label="Default select example">
                                        <option selected disabled>Silahkan Pilih Wahana</option>
                                        @foreach ($wahana as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $jadwal->wahana_id == $data->id ? 'selected' : '' }}>
                                                {{ $data->nama_wahana }}
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
                                    <select class="form-select" name="hari_operasional[]" multiple
                                        aria-label="multiple select example">
                                        @php
                                            $hariOperasional = explode(',', $jadwal->hari_operasional);
                                        @endphp
                                        <option value="Senin" {{ in_array('Senin', $hariOperasional) ? 'selected' : '' }}>Senin</option>
                                        <option value="Selasa" {{ in_array('Selasa', $hariOperasional) ? 'selected' : '' }}>Selasa</option>
                                        <option value="Rabu" {{ in_array('Rabu', $hariOperasional) ? 'selected' : '' }}>Rabu</option>
                                        <option value="Kamis" {{ in_array('Kamis', $hariOperasional) ? 'selected' : '' }}>Kamis</option>
                                        <option value="Jumat" {{ in_array('Jumat', $hariOperasional) ? 'selected' : '' }}>Jumat</option>
                                        <option value="Sabtu" {{ in_array('Sabtu', $hariOperasional) ? 'selected' : '' }}>Sabtu</option>
                                        <option value="Minggu" {{ in_array('Minggu', $hariOperasional) ? 'selected' : '' }}>Minggu</option>
                                    </select>
                                    @error('hari_operasional')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jam Mulai Operasional</label>
                                <div class="col-sm-10">
                                    <input type="time" name="waktu_mulai" class="form-control" value="{{ $jadwal->waktu_mulai }}">
                                    @error('waktu_mulai')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Jam Selesai Operasional</label>
                                <div class="col-sm-10">
                                    <input type="time" name="waktu_selesai" class="form-control" value="{{ $jadwal->waktu_selesai }}">
                                    @error('waktu_selesai')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Stock Tiket</label>
                                <div class="col-sm-10">
                                    <input type="number" name="stock" class="form-control" value="{{ $jadwal->stock }}">
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
