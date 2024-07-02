@extends('frontend.layouts.main')
@section('contents')
    <div class="hero-wrap js-fullheight">
        <div id="hero-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2000">
            <div class="carousel-inner">
                <div class="carousel-item active"
                    style="background-image: url('{{ asset('assets_frontend/images/banner.png') }}'); transform-origin: center center; animation: zoomIn 5s, zoomOut 5s alternate infinite;">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                            data-scrollax-parent="true">
                            <div class="col-md-12 ftco-animate text-center">
                                <span class="subheading">Welcome to Pacific</span>
                                <h1 class="mb-4">Discover Your Favorite Place with Us</h1>
                                <p class="caps">Travel to the any corner of the world, without going around in circles
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item"
                    style="background-image: url('{{ asset('assets_frontend/images/banner3.png') }}'); transform-origin: center center; animation: zoomIn 5s, zoomOut 5s alternate infinite;">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                            data-scrollax-parent="true">
                            <div class="col-md-12 ftco-animate text-center">
                                <span class="subheading">Welcome to Pacific</span>
                                <h1 class="mb-4">Discover Your Favorite Place with Us</h1>
                                <p class="caps">Travel to the any corner of the world, without going around in circles
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item"
                    style="background-image: url('{{ asset('assets_frontend/images/banner2.png') }}'); transform-origin: center center; animation: zoomIn 5s, zoomOut 5s alternate infinite;">
                    <div class="overlay"></div>
                    <div the="container">
                        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                            data-scrollax-parent="true">
                            <div class="col-md-12 ftco-animate text-center">
                                <span class="subheading">Welcome to Pacific</span>
                                <h1 class="mb-4">Discover Your Favorite Place with Us</h1>
                                <p class="caps">Travel to the any corner of the world, without going around in circles
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span the="sr-only"></span>
            </a>
        </div>
    </div>

    <section class="ftco-section ftco-about img" style="padding-top: 140px;">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 about-intro">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="img d-flex w-100 align-items-center justify-content-center"
                                style="background-image:url({{ asset('assets_frontend/images/banner3.png') }});">
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-5 py-5">
                            <div class="row justify-content-start pb-3">
                                @foreach ($about as $data)
                                    <div class="col-md-12 heading-section ftco-animate">
                                        <span class="subheading">About Us</span>
                                        <h2 class="mb-4">{{ $data->judul }}</h2>
                                        <p> {{ Str::limit($data->deskripsi, 200) }}</p>
                                        <p><a href="{{ route('about-frontend') }}" class="btn btn-primary mt-4">Read
                                                More</a></p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Destination</span>
                    <h2 class="mb-4">Tour Destination</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($wahana->take(6) as $data)
                    <div class="col-md-4 ftco-animate">
                        <div class="project-wrap">
                            <a href="#" class="img"
                                style="background-image: url({{ url('images/foto/' . $data->foto) }});">
                                <span class="price">Terfavorit</span>
                            </a>
                            <div class="text p-4">
                                <h3><a href="#">{{ $data->nama_wahana }}</a></h3>
                                <p class="location"> {{ Str::limit($data->deskripsi, 40) }}</p>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('show-destinasi', $data->id) }}" class="btn btn-primary">Open</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about img"
        style="background-image: url({{ asset('assets_frontend/images/bg_4.jpg') }});">
        <div class="overlay"></div>
        <div class="container py-md-5">
            <div class="row py-md-5">
                <div class="col-md d-flex align-items-center justify-content-center">
                    <a href="https://www.youtube.com/watch?v=WcsYxIFMg3I"
                        class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4"
                        target="_blank">
                        <span class="fa fa-play"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section bg-bottom">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <span class="subheading" style=" color: #f15d30;">Testimonial</span>
                    <h2 class="mb-4" style="color: rgba(0, 0, 0, 0.8);">Tourist Feedback</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">

                        @foreach ($ulasan as $data)
                            <div class="item">
                                <div class="testimony-wrap py-4">
                                    <div class="text">
                                        <p class="star">
                                            <span>{{ $data->wahana->nama_wahana }}</span>
                                        </p>
                                        <p class="mb-4">{{ Str::limit($data->komentar, 100) }}</p>
                                        <div class="d-flex align-items-center">
                                            <div class="user-img"
                                                style="background-image: url({{ url('images/foto/' . $data->user->foto) }})">
                                            </div>
                                            <div class="pl-3">
                                                <p class="name">{{ $data->user->nama_lengkap }}</p>
                                                <span class="position">{{ $data->user->role }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
