@extends('backend.layouts.main')
@section('contents')
    <div class="pagetitle">
        <h1>Tambah Data About</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('index-about') }}">Data About</a></li>
                <li class="breadcrumb-item active">Tambah Data About</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data About</h5>
                        <form action="{{ route('update-about', $about->id) }}" data-toggle="validator"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul" class="form-control" value="{{ $about->judul }}" required>
                                    @error('judul')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="deskripsi" style="height: 100px" required>{{ $about->deskripsi }}</textarea>
                                    @error('deskripsi')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat" style="height: 100px" required>{{ $about->alamat }}</textarea>
                                    @error('alamat')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">No. Telp</label>
                                <div class="col-sm-10">
                                    <input type="number" name="nomor_hp" class="form-control" value="{{ $about->nomor_hp }}" required>
                                    @error('nomor_hp')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" value="{{ $about->email }}" required>
                                    @error('email')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Link Youtube</label>
                                <div class="col-sm-10">
                                    <input type="url" name="link_youtube" class="form-control" value="{{ $about->link_youtube }}" required>
                                    @error('link_youtube')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Link Facebook</label>
                                <div class="col-sm-10">
                                    <input type="url" name="link_facebook" class="form-control" value="{{ $about->link_facebook }}" required>
                                    @error('link_facebook')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Link Instagram</label>
                                <div class="col-sm-10">
                                    <input type="url" name="link_instagram" class="form-control" value="{{ $about->link_instagram }}" required>
                                    @error('link_instagram')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Link Email</label>
                                <div class="col-sm-10">
                                    <input type="url" name="link_email" class="form-control" value="{{ $about->link_email }}" required>
                                    @error('link_email')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Link Twitter</label>
                                <div class="col-sm-10">
                                    <input type="url" name="link_twitter" class="form-control" value="{{ $about->link_twitter }}" required>
                                    @error('link_twitter')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="foto" type="file" id="formFile">
                                    @error('foto')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <!-- End General Form Elements -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
