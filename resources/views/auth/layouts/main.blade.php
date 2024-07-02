<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Pemesanan Tiket Wahana Wisata Bukik Cinangkiak</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    {{-- css --}}
    @include('auth.layouts.css')
    @include('api.api')
</head>

<body>

    <main>
        <div class="container">
            @yield('contents')
        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- js --}}
    @include('auth.layouts.js')

</body>

</html>
