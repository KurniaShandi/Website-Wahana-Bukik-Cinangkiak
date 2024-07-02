@extends('backend.layouts.main')
@section('contents')
    <div class="pagetitle">
        <h1>Tambah Ulasan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('index-ulasan') }}">Data Ulasan</a></li>
                <li class="breadcrumb-item active">Tambah Ulasan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Ulasan</h5>
                        <form action="{{ route('update-ulasan', $ulasan->id) }}" data-toggle="validator" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Wahana</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="wahana_id" aria-label="Default select example">
                                        <option selected disabled>Silahkan Pilih Wahana</option>
                                        @foreach ($wahana as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $ulasan->wahana_id == $data->id ? 'selected' : '' }}>
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
                                <label class="col-sm-2 col-form-label">Nama Pengguna</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="user_id" aria-label="Default select example">
                                        <option selected disabled>Silahkan Pilih User</option>
                                        @foreach ($user as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $ulasan->user_id == $data->id ? 'selected' : '' }}>
                                                {{ $data->nama_lengkap }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('nama_lengkap')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Komentar</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="komentar" style="height: 100px">{{ $ulasan->komentar }}</textarea>
                                    @error('komentar')
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
