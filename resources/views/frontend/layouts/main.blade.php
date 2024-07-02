<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Pemesanan Tiket Wahana Wisata Bukik Cinangkiak</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- css --}}
    @include('frontend.layouts.css')
</head>

<body>

    {{-- navbar --}}
    @include('frontend.layouts.navbar')

    @yield('contents')

    {{-- footer --}}
    @include('frontend.layouts.footer')


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    {{-- js --}}
    @include('frontend.layouts.js')

</body>

</html>
