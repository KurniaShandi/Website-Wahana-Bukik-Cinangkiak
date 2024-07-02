@extends('backend.layouts.main')
@section('contents')
    <div class="pagetitle">
        <h1>Tambah Data Payment</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('index-payment') }}">Data Payment</a></li>
                <li class="breadcrumb-item active">Tambah Data Payment</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Payment</h5>
                        <form action="{{ route('update-payment', $payment->id) }}" data-toggle="validator" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Rekening</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama_rekening" class="form-control" value="{{ $payment->nama_rekening }}">
                                    @error('nama_rekening')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nomor Rekening</label>
                                <div class="col-sm-10">
                                    <input type="number" name="nomor_rekening" class="form-control" value="{{ $payment->nomor_rekening }}">
                                    @error('nomor_rekening')
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
