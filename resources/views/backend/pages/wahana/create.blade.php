@extends('backend.layouts.main')
@section('contents')
    <div class="pagetitle">
        <h1>Tambah Data Wahana</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('index-wahana') }}">Data Wahana</a></li>
                <li class="breadcrumb-item active">Tambah Data Wahana</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Wahana</h5>
                        <form action="{{ route('store-wahana') }}" data-toggle="validator" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Wahana</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama_wahana" class="form-control">
                                    @error('nama_wahana')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="number" name="harga" class="form-control" value="0">
                                    @error('harga')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label">Deskripsi</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" name="deskripsi" style="height: 100px"></textarea>
                                @error('deskripsi')
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

                        </form><!-- End General Form Elements -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
