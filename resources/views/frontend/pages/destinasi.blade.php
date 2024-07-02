@extends('frontend.layouts.main')
@section('contents')
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url('{{ asset('assets_frontend/images/bg_1.jpg') }}'); padding-top: 208px;">
        <div class="overlay-saja"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home-frontend') }}">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Destinasi <i
                                class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-0 bread">Destinasi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section" style="padding-bottom: 0px;">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Destination</span>
                    <h2 class="mb-4">Tour Destination</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($wahana as $data)
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
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-auto">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
