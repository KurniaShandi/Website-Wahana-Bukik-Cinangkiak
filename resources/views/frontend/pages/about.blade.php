@extends('frontend.layouts.main')
@section('contents')
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url('{{ asset('assets_frontend/images/bg_1.jpg') }}'); padding-top: 208px;">
        <div class="overlay-saja"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home-frontend') }}">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Tentang Kami <i
                                class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-0 bread">Tentang Kami</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about img" style="padding-top: 100px;">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 about-intro">
                    @foreach ($about as $data)
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-stretch">
                                <div class="img d-flex w-100 align-items-center justify-content-center"
                                    style="background-image:url({{ url('images/foto/' . $data->foto) }});">
                                </div>
                            </div>
                            <div class="col-md-6 pl-md-5 py-5">
                                <div class="row justify-content-start pb-3">
                                    <div class="col-md-12 heading-section ftco-animate">
                                        <span class="subheading">About Us</span>
                                        <h2 class="mb-4">{{ $data->judul }}</h2>
                                        <p>{{ $data->deskripsi }}</p>
                                        <p><a href="{{ route('destinasi-frontend') }}" class="btn btn-primary">Book Your Destination</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
